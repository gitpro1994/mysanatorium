<?php

use App\Models\Cities;
use App\Models\CreditCards;
use App\Models\RoutesModel;
use App\Models\RouteLines;
use App\Models\TransferCompanies;
use App\Models\SmbElements;
use App\Models\Sws;
use App\Models\DiscountOptions;
use App\Models\RoomKinds;
use App\Models\Sanatoriums;
use App\Models\Stchild;
use App\Models\Stoutchild;
use App\Models\Comments;
use App\Models\Countries;
use Illuminate\Support\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\CodeUnitReverseLookup\Wizard;

function countRoutesByCountry($country_id)
{
    $data = RoutesModel::where('country_id', $country_id)->count();
    return $data;
}

function countRouteLinesByCompany($company_id)
{
    $data = RouteLines::where('transfer_company_id', $company_id)->count();
    return $data;
}

function getRouteLinesLocation($id)
{
    $from = RoutesModel::where('id', $id)->first();
    return $from['address'];
}

function getTransferCompanyCurrencySymbol($id)
{
    $company = TransferCompanies::where('id', $id)->first();
    $symbol = $company->getCurrency['code'];

    return $symbol;
}

function check_available($sanatorium_id, $medical_base_id)
{
    $medical_base_id = SmbElements::where('sanatoriums_id', $sanatorium_id)->where('medical_base_elements_id', $medical_base_id)->first();
    if (isset($medical_base_id)) {
        return "yes";
    } else {
        return "no";
    }
}


function gdo($discount_id, $option_element_name)
{
    $options = DiscountOptions::where('discounts_id', $discount_id)->first();
    if (isset($options)) {
        return $options[$option_element_name];
    } else {
        return '';
    }
}

function getCreditCardInfo($card_id)
{
    $card_data = CreditCards::find($card_id);
    return $card_data['name'];
}

function getRoomName($id)
{
    $room_name = RoomKinds::find($id);
    return $room_name['name'];
}

function getCountryName($id)
{
    $country = Countries::find($id);
    return $country['title'];
}

function getCityName($id)
{
    $city = Cities::find($id);
    return $city['title'];
}

function getCountryCities($id)
{
    $cities = Cities::where('country_id', $id)->where('status', 1)->get();
    return $cities;
}


function child_is_accepted($sanatorium_id)
{
    $child = Stchild::where('sanatoriums_id', $sanatorium_id)->first();
    if (!empty($child)) {
        return $child->child_id_accepted;
    } else {
        return '';
    }
}

function out_child_is_accepted($sanatorium_id)
{
    $child = Stoutchild::where('sanatoriums_id', $sanatorium_id)->first();
    if (!empty($child)) {
        return $child->out_child_id_accepted;
    } else {
        return '';
    }
}

function get_sanatoriums_info($sanatorium_id, $info)
{
    $data = Sanatoriums::where('id', $sanatorium_id)->first();
    return $data[$info];
}


function get_price_date($sanatorium_id, $room_id, $imput_name)
{
    $date_of_price = DB::table('daily_price_group_' . get_sanatoriums_info($sanatorium_id, 'country_id'))->where('sanatoriums_id', $sanatorium_id)->where('room_kinds_id', $room_id)->where('input_name', $imput_name)->pluck('date_of_price')->toArray();
    return $date_of_price;
}

function get_price($sanatorium_id, $room_id, $imput_name, $date, $package = '')
{
    $sws = Sws::where('sanatoriums_id', $sanatorium_id)->first();
    if ((int)$sws['price_table_kind'] == 1) {
        $room_price = DB::table('daily_price_group_' . get_sanatoriums_info($sanatorium_id, 'country_id'))->where('sanatoriums_id', $sanatorium_id)->where('room_kinds_id', $room_id)->where('date_of_price', $date)->where('input_name', $imput_name)->first();
    } elseif ((int)$sws['price_table_kind'] == 2) {
        $room_price = DB::table('weekly_price_group_' . get_sanatoriums_info($sanatorium_id, 'country_id'))->where('sanatoriums_id', $sanatorium_id)->where('room_kinds_id', $room_id)->where('date_of_price', $date)->where('input_name', $imput_name)->where('package', $package)->first();
    } elseif ((int)$sws['price_table_kind'] == 3) {
        $room_price = DB::table('optional_price_group_' . get_sanatoriums_info($sanatorium_id, 'country_id'))->where('sanatoriums_id', $sanatorium_id)->where('room_kinds_id', $room_id)->where('date_of_price', $date)->where('input_name', $imput_name)->first();
    }
    if (empty($room_price)) {
        return 0;
    } else {
        return $room_price->price;
    }
}

function general_rating($sanatorium_id)
{
    $sanatorium = Sanatoriums::find($sanatorium_id);
    $treatment = $sanatorium->getComments->sum('treatment_quality');
    $food = $sanatorium->getComments->sum('food_quality');
    $reservation = $sanatorium->getComments->sum('reservation_quality');
    $personal = $sanatorium->getComments->sum('personal_quality');
    $location = $sanatorium->getComments->sum('location_quality');

    $result = round((($treatment + $food + $reservation + $personal + $location) / 5) / count($sanatorium->getComments), 2);
    return $result;
}

function treatment_rating($sanatorium_id)
{
    $sanatorium = Sanatoriums::find($sanatorium_id);
    $treatment = $sanatorium->getComments->sum('treatment_quality');
    return round(($treatment) / count($sanatorium->getComments));
}

function get_low_price($sanatorium_id)
{
    $data = Sanatoriums::where('id', $sanatorium_id)->first();
    $now = Carbon::now()->format('Y-m-d');
    $yearEnd = date('Y-m-d', strtotime('12-31'));

    if (get_sanatorium_price_kind($sanatorium_id) == 1) {
        $table = $data->daily_price_group;
    } elseif (get_sanatorium_price_kind($sanatorium_id) == 2) {
        $table = $data->weekly_price_group;
    } else {
        $table = $data->optional_price_group;
    }

    $min = DB::table($table)->where('sanatoriums_id', $sanatorium_id)->where('input_name', '1-FBT')->min('price');
    if (empty($min)) {
        $min = DB::table($table)->where('sanatoriums_id', $sanatorium_id)->where('input_name', '1-HBT')->min('price');
    }
    return $min;
}


function get_last_comment($sanatorium_id, $info)
{
    $comment = Comments::where('sanatoriums_id', $sanatorium_id)->latest()->first();
    return $comment[$info];
}

function get_sanatorium_price_kind($sanatorium_id)
{
    $wizart = Sws::where('sanatoriums_id', $sanatorium_id)->first();
    return $wizart['price_table_kind'];
}

function get_food_count($sanatorium_id)
{
    $wizart = Sws::where('sanatoriums_id', $sanatorium_id)->first();
    return $wizart['food_count'];
}
