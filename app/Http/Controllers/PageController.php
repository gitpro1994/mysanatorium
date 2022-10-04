<?php

namespace App\Http\Controllers;

use App\Models\Cities;
use App\Models\Countries;
use App\Models\DiscountOptions;
use App\Models\RoomKinds;
use App\Models\RoomPrices;
use App\Models\RoomStatus;
use App\Models\Sanatoriums;
use App\Models\Sd;
use App\Models\Srk;
use App\Models\TreatmentDirections;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isNull;
use \Illuminate\Support\Facades\Session;

class PageController extends Controller
{
    public function welcome()
    {
        $data['treatment_directions'] = TreatmentDirections::where('status', 1)->orderBy("id", "DESC")->get();
        return view('frontend.welcome', $data);
    }

    public function about()
    {
        return view('frontend.header.about.about');
    }

    public function team()
    {
        return view('frontend.header.about.team');
    }

    public function faq()
    {
        return view('frontend.header.about.faq');
    }

    public function contact()
    {
        return view('frontend.header.about.contact');
    }

    public function treaty()
    {
        return view('frontend.header.about.treaty');
    }

    public function choose_right_resort()
    {
        return view('frontend.header.choose_right_resort');
    }

    public function balneology_consultation()
    {
        return view('frontend.haeder.balneology_consultation');
    }

    public function visa_support()
    {
        return view('frontend.header.visa_support');
    }

    public function transfer()
    {
        return view('frontend.header.transfer');
    }

    public function treatment_specialization($id)
    {

        return view('frontend.treatment_specialization');
    }

    public function city_sanatoriums($country_slug, $city_slug)
    {
        $data['city'] = Cities::where('slug', $city_slug)->first();
        return view('frontend.sanatorium', $data);
    }

    public function sanatorium_details($id)
    {
        $data['sanatorium'] = Sanatoriums::find($id);
        return view('frontend.sanatorium-details', $data);
    }

    public function selected_sanatoriums(Request $request)
    {
        Session::put('informations', $request->all());
        if ($request->cty_slct[0] == null && $request->snt_slct[0] == null) {
            $data['sanatoriums'] = Sanatoriums::where('country_id', $request->couList)->where('status', 1)->get();
            return view('frontend.selected-sanatoriums', $data);
        } elseif ($request->cty_slct[0] != null && $request->snt_slct[0] == null) {
            $data['sanatoriums'] = Sanatoriums::where('city_id', $request->cty_slct[0])->where('status', 1)->get();
            return view('frontend.selected-sanatoriums', $data);
        } elseif ($request->snt_slct[0] != null) {
            $data['sanatorium'] = Sanatoriums::find($request->snt_slct[0]);
            return view('frontend.sanatorium-details', $data);
        }
    }

    public function gss(Request $request)
    {

        $sanatoriums = Sanatoriums::where('city_id', $request->selected_city)->where('status', 1)->get();
        $html = '';

        foreach ($sanatoriums as $sanatorium) {

            $html .= '
            
            <div class="searchPanelPopOver_0" id="box_shadow__0">
            <div class="row first-view sanatorium-item">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 ">
                        <div class="col-md-8 col-lg-9 col-sm-9 col-xs-12 padding-left-clear">
                            <div class="sanatorium-item_head ">
                                <h2 class="h2MarginNone">
                                    <a target="_blank" class="sanatorum_link blue text24 sanatorium_link_c" href="" data-original-title="" title="">' . $sanatorium['name'] . '
                                        <span class="sanatorium-rating">';
            for ($i = 0; $i < $sanatorium->rate; $i++) {
                $html .= '<span class="text-danger">★</span>';
            }
            $html .= '</a>
                                </h2>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-3 col-sm-3 col-xs-12">
                            <div class="right-block-inform padding-right-clear top_page2_otviz_part width_25 col-xs-0">
                                <div class="row margin-clear border_bottom">
                                    <div class="show_review_border text-center" style="float: left;">
                                        <a class="reviews-a " href="/sanatorii/azerbaijan/naftalan/qashalti-sanatorium/reviews" target="_blank" data-original-title="" title="" style="border-bottom: 1px dotted rgb(35, 71, 83);">
                                            <div class="text14 line-height-1 bold-text down_text_1" style="color: #27A3BF;">
                                                <p class="int-mobileOt margin-clear">
                                                    ' . general_rating($sanatorium->id) . '
                                                </p>
                                                <span class="text11" style="color:#095764;">
                                                    <span>Общий</span> рейтинг </span>
                                            </div>
                                        </a>
                                    </div>';
            if (count($sanatorium->getComments) > 0) {
                $html .= '<div class="show_review_border text-center">
                                    <a class="reviews-a down_bottom" href="/sanatorii/azerbaijan/naftalan/qashalti-sanatorium/reviews" target="_blank" data-original-title="" title="">
                                        <div class="text14  line-height-1 bold-text right_block" style="color: green; float: right;">
                                            <p class="int-mobileOt margin-clear">
                                                ' . treatment_rating($sanatorium->id) . '
                                            </p>
                                            <span class="text11 " style="color:#095764;">
                                                <span>Рейтинг</span> лечения </span>
                                        </div>
                                    </a>
                                </div>
                                <div class="show_review_border text-right red_right">
                                    <a class="reviews-a " href="/sanatorii/azerbaijan/naftalan/qashalti-sanatorium/reviews" target="_blank" data-original-title="" title="" style="border-bottom: 1px dotted rgb(35, 71, 83);">
                                        <div class="text14 line-height-1 margin-bottom-10 bold-text down_bottom_otzv down_text_page2" style="color: #f03f28;">
                                            ' . count($sanatorium->getComments) . '
                                            <span class="text11 font-size_big">Читать отзывы</span>
                                        </div>
                                    </a>
                                </div>';
            } else {
                $html .= '<div class="show_review_border text-center text-danger">Отзывов о санатории нет.</div>';
            }
            $html .= '</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12 padding-clear left-block-inform">
                    <div class="col-lg-4 col-md-5 col-sm-5  padding-left-clear padding-rightf-clear  before_title">
                        <div class="sanatorium_main_img">
                            <div class="discount-picture">

                                <div class="ribbon" style="">
                                    <span class="ribbon_contents">
                                        <span>Вы экономите</span>
                                        <span class="discount-prices">-0%</span>
                                    </span>
                                </div>
                                <div class="ribbon ribbon_ekskursiya" style="display: block; margin-top: 0;">
                                    <span class="ribbon_contents">
                                        <div class="bold-text">Бесплатная экскурсия в Гянджу, Шеки или в Габалу</div>
                                    </span>
                                </div>
                            </div>
                            <div href="' . $sanatorium['youtube_video_link'] . '" class="about_video page2_video hoverVideo top_right_video_icon ">
                                <div class="video_text text-right" style="display:inline-block;">
                                    Посмотреть<br> видео
                                </div>
                                <div class="video_icon">
                                    <i class="fa fa-play" aria-hidden="true">
                                    </i>
                                </div>
                            </div>
                            <div class="sanat-img">
                                <a href="/sanatorii/azerbaijan/naftalan/qashalti-sanatorium?fTo=30.08.2022+-+06.09.2022&amp;lRooms%5B0%5D%5B0%5D%5BlAge%5D=Adult&amp;lRooms%5B0%5D%5B0%5D%5BlTfd%5D=FBT&amp;lRooms%5B0%5D%5B1%5D%5BlAge%5D=Adult&amp;lRooms%5B0%5D%5B1%5D%5BlTfd%5D=FBT&amp;cty_slct%5B0%5D=43&amp;snt_slct%5B0%5D=112&amp;couList=81 " target="_blank" data-original-title="" title="">
                                    <img src="https://mysanatorium.com/upload/sanatorium/item/thumbs/thumb-360x260.58dbbc6ec3aeb.jpg" alt="">
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="row col-md-0 col-sm-0">
                        <div class="col-xs-12 col-md-0 col-lg-0 col-sm-0">
                            <ul class="mobile_otviz">
                                <li>
                                    <a class="text-center" href="/sanatorii/azerbaijan/naftalan/qashalti-sanatorium/reviews" target="_blank" data-original-title="" title="">
                                        <div class="small_text_mobileOt otv_blue">
                                            <p class="int-mobileOt margin-clear">
                                               ' . general_rating($sanatorium->id) . '
                                            </p>
                                            <span class="small_text_mobileOt">
                                                <span>Общий</span> рейтинг </span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="text-center" href="/sanatorii/azerbaijan/naftalan/qashalti-sanatorium/reviews" target="_blank" data-original-title="" title="">
                                        <div class="small_text_mobileOt otv_green">
                                            <p class="int-mobileOt margin-clear">' . treatment_rating($sanatorium->id) . '</p>
                                            <span class="small_text_mobileOt">
                                                <span>Рейтинг</span> лечения </span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="/sanatorii/azerbaijan/naftalan/qashalti-sanatorium/reviews" target="_blank" data-original-title="" title="">
                                        <span class="small_text_mobileOt otv_red">
                                            <p class="otv_red small_text_mobileOt" style="margin: 0; padding:0; text-align: center;">7 <br> Читать отзывы</p>
                                        </span></a>
                                </li>
                            </ul>
                            
                        </div>
                    </div>
                    <div class="otz_border col-md-0 col-sm-0"></div>

                    <div class="col-lg-8 col-md-7 col-sm-7  top_mobile_div" id="height_class_">

                        <div class="col-md-12 col-sm-12 padding-clear darkblue">
                            <div class="text12 opacity_color">
                                Lənkəran, Azerbaycan
                            </div>
                        </div>
                        <br><br>
                        <div class="text_div_title_and_text">
                            <p id="page2_event_title">Преимущества санатория:</p>
                            <ul class="first-view-ul" id="datalist112">
                                <p>&nbsp;</p>
                                <ul class="pages_uls">
                                    <li>относительно новый санаторий</li>
                                </ul>
                                <ul class="pages_uls">
                                    <li>задействованы узкоспециализированные врачи</li>
                                </ul>
                                <ul class="pages_uls">
                                    <li>только здесь проводят процедуры «Газовые уколы CO2» и
                                        «УФБ-терапия»
                                    </li>
                                </ul>
                                <ul class="pages_uls" style="display: none;">
                                    <li>наличие диагностической базы с УЗИ, ЭКГ, лабораторией</li>
                                </ul>
                                <ul class="pages_uls" style="display: none;">
                                    <li>wellness-центр с закрытым бассейном (25x11 м.),&nbsp;турецкой баней,
                                        финской сауной и большой зоной отдыха
                                    </li>
                                </ul>
                                <ul class="pages_uls" style="display: none;">
                                    <li>БЕСПЛАТНАЯ парковка с навесом на 100 машиномест</li>
                                </ul>
                                <ul class="pages_uls" style="display: none;">
                                    <li>футбольное поле, баскетбольная и волейбольная площадки</li>
                                </ul>
                                <ul class="pages_uls" style="display: none;">
                                    <li>наличие детской комнаты и детской игровой площадки</li>
                                </ul>
                            </ul>
                            <a href="javascript:void(0);" data-title="Закрыть" id="myDatalist112" class=" toggle_height" style="display: none;" data-original-title="" title="">Показать больше</a>
                        </div>
                    </div>
                </div>
                ' . $this->getLowPriceRoom($sanatorium->id) . '
            </div>
        </div>
    </div>';
        }
        return $html;
    }

    public function getLowPriceRoom($sanatorium_id)
    {
        $sanatorium = Sanatoriums::find($sanatorium_id);

        if (Session::get('informations')['fTo'] == null) {
            $html_response = '<div class="col-md-12
            my_row">
<div class="row">
<div class="col-md-9
                    col-sm-9
                    col-xs-12
                    down_all_mobile
                    padding-none-mobile-Smart">
    <div class="col-md-0
                        col-sm-0
                        col-xs-12
                        padding-clear
                        top_a_tag ">
        <a id="df1_title" href="nahichevanj/sanatorij-duzdag21f9.html?fTo=01.07.2022+-+08.07.2022&amp;lRooms%5B0%5D%5B0%5D%5BlAge%5D=Adult&amp;lRooms%5B0%5D%5B0%5D%5BlTfd%5D=FBT&amp;lRooms%5B0%5D%5B1%5D%5BlAge%5D=Adult&amp;lRooms%5B0%5D%5B1%5D%5BlTfd%5D=FBT&amp;cty_slct%5B0%5D=42&amp;snt_slct%5B0%5D=111&amp;couList=81" target="_blank" data-original-title="" title="">
            <p class="text-center" style="margin:
                                0;">Otaq adi</p>
        </a>
        <div class="df_ul_Div"></div>
    </div>
    <div class="image_and_text_div">
        <div class="col-lg-6
                            col-md-7
                            col-sm-7">
            <div class="image_df1">
                <div class="row">
                    <div class="col-md-12
                                        col-sm-12
                                        col-xs-12
                                        df1_image">
                        <a href="nahichevanj/sanatorij-duzdag21f9.html?fTo=01.07.2022+-+08.07.2022&amp;lRooms%5B0%5D%5B0%5D%5BlAge%5D=Adult&amp;lRooms%5B0%5D%5B0%5D%5BlTfd%5D=FBT&amp;lRooms%5B0%5D%5B1%5D%5BlAge%5D=Adult&amp;lRooms%5B0%5D%5B1%5D%5BlTfd%5D=FBT&amp;cty_slct%5B0%5D=42&amp;snt_slct%5B0%5D=111&amp;couList=81" target="_blank" data-original-title="" title="">
                            <img src="../../upload/sanatoriums/roomtype/5ace020fa2b41.jpg" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6
                            col-md-5
                            col-sm-5
                            col-xs-0
                            padding-clear
                            top_a_tag
                            ">
            <a id="df1_title" href="" target="_blank" data-original-title="" title="">Otaq adi</a>
            <div class="df_ul_Div"></div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="row">
                <div class="col-md-0
                                    col-sm-0
                                    col-xs-12
                                    " id="down_version">
                    <div class="" style="float:
                                        left;">Цена включает</div>
                </div>
                <br>
                <div class="col-md-0
                                    col-sm-12
                                    col-xs-0
                                    " style="margin-top:
                                    0;
                                    margin-bottom:
                                    20px;" id="down_version">
                    <div class="">Цена включает</div>
                </div>
                <div class="col-md-10
                                    col-sm-12
                                    col-xs-12">
                    <div class="flex-icn-items">
                        <div class="flex-col-item">
                            <div class="flex-title-icons">
                                <img src="../../images/icons/nights.png" alt="">
                                <div class="text_col-items">
                                    <p> ночей проживания</p>
                                </div>
                            </div>
                        </div>
                        <div class="flex-col-item">
                            <div class="flex-title-icons">
                                <img src="../../images/icons/food.png" alt="">
                                <div class="text_col-items">
                                    <p> 3-x разовое питание</p>
                                </div>
                            </div>
                        </div>
                        <div class="flex-col-item">
                            <div class="flex-title-icons">
                                <img src="../../upload/manual/treatmentpackage/5bd851c0be1fd.png" alt="">
                                <div class="text_col-items">
                                    <p> 2 осмотра доктора</p>
                                </div>
                            </div>
                        </div>
                        <div class="flex-col-item">
                            <div class="flex-title-icons">
                                <img src="../../upload/manual/treatmentpackage/5bd85568913be.png" alt="">
                                <div class="text_col-items">
                                    <p> лечение в соляных пещерах</p>
                                </div>
                            </div>
                        </div>
                        <div class="flex-col-item">
                            <div class="flex-title-icons">
                                <img src="../../upload/manual/treatmentpackage/5bd85300b30af.png" alt="">
                                <div class="text_col-items">
                                    <p> бесплатный трансфер из аэропорта в санаторий</p>
                                </div>
                            </div>
                        </div>
                        <div class="flex-col-item">
                            <div class="flex-title-icons">
                                <img src="../../upload/manual/treatmentpackage/5bd853748568d.png" alt="">
                                <div class="text_col-items">
                                    <p> трансфер санаторий-пещера-санаторий</p>
                                </div>
                            </div>
                        </div>
                        <div class="flex-col-item">
                            <div class="flex-title-icons">
                                <img src="../../upload/manual/treatmentpackage/5e54d6e7e6fb9.png" alt="">
                                <div class="text_col-items">
                                    <p> бесплатная экскурсия в Нахичевань</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2
                                    col-sm-0
                                    col-xs-0
                                    margin-clear" id="down_version">
                    <div class="">Цена <br> включает </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-md-3
                    col-sm-3
                    col-xs-12
                    page2_right_border
                    down_all_mobile" style="text-align:
                    center;">
    <div class="ucken_block
                        get_referance_border">
        <p id="ref_title">Цена за номер</p>
        <p id="ref_small">лечение / 3-х разове питание / <br> 1 ночей проживания / 1 взрослых </p>
    </div>
    <p class="price_df16
                        darkblue" style="margin-top:
                        0px;">
        <span class="text18" style="color:
                            #27A3BF">от</span>
        ' . get_low_price($sanatorium->id) . '
    </p>
    <a href="nahichevanj/sanatorij-duzdag21f9.html?fTo=01.07.2022+-+08.07.2022&amp;lRooms%5B0%5D%5B0%5D%5BlAge%5D=Adult&amp;lRooms%5B0%5D%5B0%5D%5BlTfd%5D=FBT&amp;lRooms%5B0%5D%5B1%5D%5BlAge%5D=Adult&amp;lRooms%5B0%5D%5B1%5D%5BlTfd%5D=FBT&amp;cty_slct%5B0%5D=42&amp;snt_slct%5B0%5D=111&amp;couList=81" target="_blank" class="df16_number" data-original-title="" title="">Посмотреть номера</a>
    <p class="df16_grey" style="color:#939da7;">Моментальное подтверждение</p>
    <p class="df16_grey" style="color:#939da7;">Оплата при заселении</p>
    <p class="df16_green">Банковская карта не требуется</p>
    <p class="df16_green"> Мы возвращаем разницу в цене</p>
    <p class="df16_green">Бесплатная отмена</p>
</div>
</div>
</div>';
        } else {
            $date = explode(" - ", Session::get('informations')['fTo']);
            $start_date = $date[0];
            $end_date = $date[1];

            $new_start_date = Carbon::parse($start_date)->format('Y-m-d');
            $new_end_date = Carbon::parse($end_date)->format('Y-m-d');

            $day_difference = Carbon::parse($new_start_date)->diffInDays($new_end_date);

            $rooms = [];
            $items = [];

            if (isset(Session::get('informations')['fTo'])) {
                if (isset(Session::get('informations')['lRooms'])) {
                    foreach (Session::get('informations')['lRooms'] as $room_key => $data) {
                        foreach ($data as  $dat) {
                            array_push($items, $dat);
                        }
                        array_push($rooms, $data);
                    }
                }
            }

            $adult_count_array = [];
            $lAge = "Adult";
            foreach ($rooms as $key => $value) {
                $count = array_count_values(array_column($value, 'lAge'))[$lAge];
                array_push($adult_count_array, $count);
            }

            $ids = [];
            foreach ($sanatorium->getSrks as $srk) {
                $room_status = RoomStatus::where('sanatoriums_id', $sanatorium['id'])->where('room_kinds_id', $srk['room_kinds_id'])->whereBetween('start_date', [$new_start_date, $new_end_date])->first();
                if (!empty($room_status)) {
                    array_push($ids, $room_status['room_kinds_id']);
                }
            }

            $treatment_package = ["range-FBT", "range-HBT"];
            $simple_package = ["range-FB", "range-HB"];
            $price = 0;
            $prices = [];
            foreach ($rooms as $room_key => $room) {
                foreach ($room as $item_key => $item) {
                    if ($item['lAge'] == $lAge) {
                        $price += DB::table($sanatorium->daily_price_group)->where('sanatoriums_id', $sanatorium['id'])
                            ->whereNotIn('room_kinds_id', $ids)
                            ->where('date_of_price', '>=', $start_date)
                            ->where('date_of_price', '<', $end_date)
                            ->where('input_name', $adult_count_array[$room_key] . $item['lTfd'])
                            ->sum('price');
                    } else {
                        if (in_array($item['lTfd'], $treatment_package)) {
                            foreach ($sanatorium->getStchild as $stchild) {
                                if ($stchild['min_age'] < $item['lAge'] && $item['lAge'] < $stchild['max_age']) {
                                    if ($stchild['paid_or_not'] == 1) {
                                        $input_name = $stchild['min_age'] . '-' . $stchild['max_age'] . '-' . $item['lTfd'];
                                        $price += DB::table($sanatorium->daily_price_group)->where('sanatoriums_id', $sanatorium['id'])
                                            ->whereNotIn('room_kinds_id', $ids)
                                            ->where('date_of_price', '>=', $start_date)
                                            ->where('date_of_price', '<', $end_date)
                                            ->where('input_name', $input_name)->sum('price');
                                    }
                                }
                            }
                        } else {
                            if (in_array($item['lTfd'], $simple_package)) {
                                foreach ($sanatorium->getStoutchild as  $stoutchild) {
                                    if ($stoutchild['min_age'] < $item['lAge'] && $item['lAge'] < $stoutchild['max_age']) {
                                        if ($stoutchild['paid_or_not'] == 1) {
                                            $input_name = $stoutchild['min_age'] . '-' . $stoutchild['max_age'] . '-' . $item['lTfd'];
                                            $price += DB::table($sanatorium->daily_price_group)->where('sanatoriums_id', $sanatorium['id'])
                                                ->whereNotIn('room_kinds_id', $ids)
                                                ->where('date_of_price', '>=', $start_date)
                                                ->where('date_of_price', '<', $end_date)
                                                ->where('input_name', $input_name)->sum('price');
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
                array_push($prices, $price);
                $price = 0;
            }




            $fibber_price = 0;
            $price_sum = array_sum($prices);
            $discount_sum = 0;

            $discount_options_all = DiscountOptions::where('sanatoriums_id', $sanatorium['id'])->orderBy('id', 'DESC')->get();
            foreach ($discount_options_all as $option) {
                if ($new_start_date >= $option['start_date'] && $new_start_date <= $option['finish_date']) {
                    print_r("tarixden sonraki if-e girdim..." . "<br>");
                    if ($option['discounts_id'] == 1) {
                        print_r("gune gore endirim if-ine girdim..." . "<br>");
                        if ($day_difference >= $option['min_night'] && $day_difference <= $option['max_night']) {
                            if ($option['depending_number_of_person'] == 1) {
                                print_r("adam sayindan asili olaraq if-ine girdim..." . "<br>");
                                foreach ($rooms as $key => $value) {
                                    if ($adult_count_array[$key] >= $option['number_of_person']) {
                                        $prices[$key] = round($prices[$key] - ($prices[$key] / $day_difference) * $option['free_night']);

                                        $price_sum = $prices[$key];
                                    }
                                }
                            } else {
                                print_r("adam sayindan asili olmayaraq if-ine girdim..." . "<br>");
                                $prices[$key] = round($prices[$key] - ($prices[$key] / $day_difference) * $option['free_night']);

                                $price_sum = $prices[$key];
                            }
                        }
                    } elseif ($option['discounts_id'] == 2) {

                        $reserv_discounts = DiscountOptions::where('sanatoriums_id', $sanatorium['id'])->where('discounts_id', 2)->get();
                        $diff = now()->diffInDays(Carbon::parse($new_start_date));
                        foreach ($reserv_discounts as $res_dis) {

                            if ($diff >= $res_dis['before_reserv_day_start'] && $diff < $res_dis['before_reserv_day_end']) {
                                $price_sum = $price_sum - ($price_sum * $res_dis['discount'] / 100);
                            }
                        }
                    } elseif ($option['discounts_id'] == 3) {
                        if ($day_difference >= $option['min_night'] && $day_difference <= $option['max_night']) {
                            if ($option['depending_number_of_person'] == 1) {
                                print_r("adam sayindan asili olaraq if-ine girdim..." . "<br>");
                                foreach ($rooms as $key => $value) {
                                    if ($adult_count_array[$key] >= $option['number_of_person']) {
                                        $prices[$key] = round($prices[$key] - ($prices[$key] * $option['discounts']) / 100);

                                        $price_sum = $prices[$key];
                                    }
                                }
                            } else {
                                print_r("adam sayindan asili olmayaraq if-ine girdim..." . "<br>");
                                $prices[$key] = round($prices[$key] - ($prices[$key] * $option['discounts']) / 100);

                                $price_sum = $prices[$key];
                            }
                        }
                    } elseif ($option['discounts_id'] == 4) {

                        $price_sum = $price_sum - ($price_sum * $option['discount'] / 100);
                        $discount_sum += $option['discount'];
                    } elseif ($option['discounts_id'] == 5) {

                        $discount_sum += $option['discount'];
                        $fibber_price += round($price_sum / (1 - ($discount_sum / 100)));
                    }
                }
            }



            $html_response = '';
            $html_response .= '
        <div class="col-md-12 my_row">
            <div class="row">
                <div class="col-md-9 col-sm-9 col-xs-12 down_all_mobile padding-none-mobile-Smart">';
            foreach ($rooms as $room_key => $room) {
                $html_response .= '
                        <div class="col-md-0 col-sm-0 col-xs-12 padding-clear top_a_tag ">
                        <a id="df1_title" href="" target="_blank" data-original-title="" title="">
                        <p class="text-center" style="margin: 0;">Room name ' . $room_key . '</p>
                        </a>
                        <div class="df_ul_Div">
                        </div>
                    </div>
                    <div class="image_and_text_div">
                        <div class="col-lg-6 col-md-7 col-sm-7">
                        <div class="image_df1">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12 df1_image">
                                    <a href="" target="_blank" data-original-title="" title=""> <img src="https://mysanatorium.com/upload/sanatoriums/roomtype/5af5c9139f98b.png" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="col-lg-6  col-md-5 col-sm-5 col-xs-0 padding-clear top_a_tag ">
                        <a id="df1_title" href="" target="_blank" data-original-title="" title="">Room name ' . $room_key . '</a>
                        <div class="df_ul_Div">
                        </div>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <div class="row">';
                foreach ($room as $item_key => $item) {
                    $item_key++;
                    $html_response .= '
                            <div class="row">
                            <div class="col-md-0 col-sm-0 col-xs-12 " id="down_version">
                                <div class="" style="float: left;">' . $item_key . '-й <small>взрослый</small></div>
                            </div>
                            <br>
                            <div class="col-md-0 col-sm-12 col-xs-0 " style="margin-top: 0; margin-bottom: 20px;" id="down_version">
                                <div class="">Цена включает</div>
                            </div>
                            <div class="col-md-10 col-sm-12 col-xs-12">
                                <div class="flex-icn-items">
                                    <div class="flex-col-item">
                                    <div class="flex-title-icons">
                                        <img src="/images/icons/nights.png" alt="">
                                        <div class="text_col-items">
                                            <p> ночей проживания</p>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="flex-col-item">
                                    <div class="flex-title-icons">
                                        <img src="/images/icons/food.png" alt="">
                                        <div class="text_col-items">
                                            <p> 3-x разовое питание</p>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="flex-col-item">
                                    <div class="flex-title-icons">
                                        <img src="/upload/manual/treatmentpackage/5bd8539bbd211.png" alt="">
                                        <div class="text_col-items">
                                            <p> нафталановые ванны</p>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="flex-col-item">
                                    <div class="flex-title-icons">
                                        <img src="/upload/manual/treatmentpackage/5bd851c0be1fd.png" alt="">
                                        <div class="text_col-items">
                                            <p> 3 осмотра доктора</p>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="flex-col-item">
                                    <div class="flex-title-icons">
                                        <img src="/upload/manual/treatmentpackage/5bd85357d022c.png" alt="">
                                        <div class="text_col-items">
                                            <p> лабораторные анализы</p>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="flex-col-item">
                                    <div class="flex-title-icons">
                                        <img src="/upload/manual/treatmentpackage/5bd8531c7f418.png" alt="">
                                        <div class="text_col-items">
                                            <p> физиотерапия </p>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="flex-col-item">
                                    <div class="flex-title-icons">
                                        <img src="/upload/manual/treatmentpackage/5bd8517fa8bc4.png" alt="">
                                        <div class="text_col-items">
                                            <p> лечение по назначению врача</p>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="flex-col-item">
                                    <div class="flex-title-icons">
                                        <img src="/upload/manual/treatmentpackage/5bd852141b4d6.png" alt="">
                                        <div class="text_col-items">
                                            <p> бесплатный трансфер из аэропорта Гянджи</p>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-0 col-xs-0 margin-clear" id="down_version">
                                <div class="">' . $item_key . '-й <small>взрослый</small></div>
                            </div>
                        </div>
                            ';
                }
                $html_response .= '</div>
                    </div>
                        ';
            }
            $html_response .= '</div>
                <div class="col-md-3 col-sm-3 col-xs-12 page2_right_border down_all_mobile" style="text-align: center;">
                    <div class="ucken_block get_referance_border">
                    <div id="green_prc"> ' . $discount_sum . ' % </div>
                            <p id="ref_title">Цена за номер</p>
                            <p id="ref_small">лечение / 3-х разове питание / <br> 1 ночей проживания / 1
                            взрослых
                            </p>
                    </div>
                    <div class="margin-top-10">
                        <div class="discount_mini_design">
                        -
                        10%
                        </div>
                        <span class="old-price-with-discount">
                        <span class="prc">' . $fibber_price . ' $ </span>
                        </span>
                        <div class="text28 bold-text darkblue" style="padding-top: 5px;color: #F03F28">
                        <span class="prc">
                        ' . $price_sum . ' $</span>
                        </div>
                    </div>
                    <a href="" target="_blank" class="df16_number" data-original-title="" title="">Посмотреть
                    номера</a>
                    <p class="df16_grey" style="color:#939da7;">Моментальное подтверждение</p>
                    <p class="df16_grey" style="color:#939da7;">Оплата при заселении</p>
                    <p class="df16_green">Банковская карта не требуется</p>
                    <p class="df16_green"> Мы возвращаем разницу в цене</p>
                    <p class="df16_green">Бесплатная отмена</p>
                </div>
            </div>
        </div>
        ';
        }


        return $html_response;
    }
}
