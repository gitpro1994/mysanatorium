@extends('frontend.layouts.app')
@section('content')
@section('content')
@include('frontend.layouts.partials.search-bar')

<section id="breadcrumbs">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="../../index.html">Главная</a></li>
            <li><a href="../azerbaijan.html">Азербайджан</a></li>
            <li class="active">Нахичевань</li>
        </ul>
    </div>
</section>

<section id="two_page">
    <div class="container mobil_not_container">
        <div class="row mobile-tab-2page">
            <div class="col-xs-12 text-center padding-clear">
                <div id="show_sanatorium" class="col-xs-6 active"><b>1</b>
                    санаторие</div>
                <div id="show_filter" class="col-xs-6">Фильтр</div>
            </div>
        </div>
        <div class="col-md-3 padding-clear">
            <form id="form-search" action="https://mysanatorium.com/sanatorii">

                <input type="hidden" name="vRooms" value="" />

                <div id="search-main-block" class="left-sidebar" style="padding:0 15px;">
                    <div class="wraps_cont checked_opened">
                        <h4 class="main-color bold wraps_cont-margin">Фильтровать
                            санатории по городам</h4>
                        <ul class="ul-style search-types-5
                                search-main-are-areas-treatment">
                            <li>
                                <input type="radio" name="couList" value="81" checked> <label for="all-country">Азербайджан</label>
                            </li>
                        </ul>
                        <ul class="ul-style search-type-5
                                search-main-are-areas-treatment">
                            <li class="cityList">
                                <input type="radio" id="42" name="cty_slct[]" value="42" data-city-id="42" class="city-list" checked>
                                <label for="42">
                                    Нахичевань <span class="number-country">
                                    </span>
                                </label>
                            </li>
                            <li class="cityList">
                                <input type="radio" id="43" name="cty_slct[]" value="43" data-city-id="43" class="city-list">
                                <label for="43">
                                    Нафталан <span class="number-country">
                                    </span>
                                </label>
                            </li>
                            <li class="cityList">
                                <input type="radio" id="56" name="cty_slct[]" value="56" data-city-id="56" class="city-list">
                                <label for="56">
                                    Баку <span class="number-country">
                                    </span>
                                </label>
                            </li>
                            <li class="cityList">
                                <input type="radio" id="59" name="cty_slct[]" value="59" data-city-id="59" class="city-list">
                                <label for="59">
                                    Шабран <span class="number-country">
                                    </span>
                                </label>
                            </li>
                            <li class="cityList">
                                <input type="radio" id="65" name="cty_slct[]" value="65" data-city-id="65" class="city-list">
                                <label for="65">
                                    Ленкорань <span class="number-country">
                                    </span>
                                </label>
                            </li>
                        </ul>
                    </div>

                    <div class="trt-block wraps_cont
                            ">
                        <h4 class="main-color bold">Показания к лечению</h4>
                        <ul class="ul-style search-type-1
                                search-main-are-areas-treatment">
                            <li style="">
                                <input type="checkbox" id="68" name="trt[]" value="68" data-trt-id="68" class="trt-list" />
                                <label for="68">
                                    Аллергические болезни (любая форма)
                                    <span class="number-trt"></span>
                                </label>
                            </li>
                            <li style="">
                                <input type="checkbox" id="69" name="trt[]" value="69" data-trt-id="69" class="trt-list" />
                                <label for="69">
                                    Хронические бронхиты <span class="number-trt"></span>
                                </label>
                            </li>
                        </ul>
                    </div>

                    <div class="mbs-block wraps_cont">
                        <h4 class="main-color bold wraps_cont-margin">Лечебные
                            базы</h4>
                        <ul class="ul-style search-type-2 ">
                            <li style="">
                                <input type="checkbox" id="273" name="mbs[]" value="273" data-mbs-id="273" class="mbs-list" />
                                <label for="273">
                                    Иппотерапия <span class="number-mbs">
                                    </span>
                                </label>
                            </li>
                            <li style="">
                                <input type="checkbox" id="270" name="mbs[]" value="270" data-mbs-id="270" class="mbs-list" />
                                <label for="270">
                                    Пляжные процедуры <span class="number-mbs"> </span>
                                </label>
                            </li>
                            <li style="">
                                <input type="checkbox" id="231" name="mbs[]" value="231" data-mbs-id="231" class="mbs-list" />
                                <label for="231">
                                    Диетотерапия <span class="number-mbs">
                                    </span>
                                </label>
                            </li>
                            <li style="">
                                <input type="checkbox" id="218" name="mbs[]" value="218" data-mbs-id="218" class="mbs-list" />
                                <label for="218">
                                    Диагностика <span class="number-mbs">
                                    </span>
                                </label>
                            </li>
                            <li style="">
                                <input type="checkbox" id="214" name="mbs[]" value="214" data-mbs-id="214" class="mbs-list" />
                                <label for="214">
                                    Собственный бальнеоцентр <span class="number-mbs"> </span>
                                </label>
                            </li>
                            <li style="display:none;">
                                <input type="checkbox" id="210" name="mbs[]" value="210" data-mbs-id="210" class="mbs-list" />
                                <label for="210">
                                    Лечение газом <span class="number-mbs">
                                    </span>
                                </label>
                            </li>
                            <li style="display:none;">
                                <input type="checkbox" id="112" name="mbs[]" value="112" data-mbs-id="112" class="mbs-list" />
                                <label for="112">
                                    Физиотерапия <span class="number-mbs">
                                    </span>
                                </label>
                            </li>
                            <li style="display:none;">
                                <input type="checkbox" id="110" name="mbs[]" value="110" data-mbs-id="110" class="mbs-list" />
                                <label for="110">
                                    Электролечение <span class="number-mbs">
                                    </span>
                                </label>
                            </li>
                            <li style="display:none;">
                                <input type="checkbox" id="109" name="mbs[]" value="109" data-mbs-id="109" class="mbs-list" />
                                <label for="109">
                                    Грязелечение <span class="number-mbs">
                                    </span>
                                </label>
                            </li>
                            <li style="display:none;">
                                <input type="checkbox" id="108" name="mbs[]" value="108" data-mbs-id="108" class="mbs-list" />
                                <label for="108">
                                    Водолечение <span class="number-mbs">
                                    </span>
                                </label>
                            </li>
                        </ul>
                        <a href="javascript:void(0);" onclick="show_more(this,'search-type-2','show');" class="sh_all">Показать все</a>
                    </div>
                    <div class="star-block wraps_cont">
                        <h4 class="main-color bold wraps_cont-margin">Количество
                            звезд</h4>
                        <ul class="ul-style search-type-3">
                            <li>
                                <input type="checkbox" id="star_5" name="stars[]" value="5" data-stars-id="5" class="stars-list" />
                                <label for="star_5" class="star_search">
                                    <div class="filter_star star"></div>
                                    <div class="filter_star star"></div>
                                    <div class="filter_star star"></div>
                                    <div class="filter_star star"></div>
                                    <div class="filter_star star"></div>
                                    <span class="number-stars"> </span>
                                </label>
                            </li>
                            <li>
                                <input type="checkbox" id="star_4" name="stars[]" value="4" data-stars-id="4" class="stars-list" />
                                <label for="star_4" class="star_search">
                                    <div class="filter_star star"></div>
                                    <div class="filter_star star"></div>
                                    <div class="filter_star star"></div>
                                    <div class="filter_star star"></div>
                                    <div class="filter_star unstar"></div>
                                    <span class="number-stars"> </span>
                                </label>
                            </li>
                            <li>
                                <input type="checkbox" id="star_3" name="stars[]" value="3" data-stars-id="3" class="stars-list" />
                                <label for="star_3" class="star_search">
                                    <div class="filter_star star"></div>
                                    <div class="filter_star star"></div>
                                    <div class="filter_star star"></div>
                                    <div class="filter_star unstar"></div>
                                    <div class="filter_star unstar"></div>
                                    <span class="number-stars"> </span>
                                </label>
                            </li>
                            <li>
                                <input type="checkbox" id="star_2" name="stars[]" value="2" data-stars-id="2" class="stars-list" />
                                <label for="star_2" class="star_search">
                                    <div class="filter_star star"></div>
                                    <div class="filter_star star"></div>
                                    <div class="filter_star unstar"></div>
                                    <div class="filter_star unstar"></div>
                                    <div class="filter_star unstar"></div>
                                    <span class="number-stars"> </span>
                                </label>
                            </li>
                        </ul>
                    </div>

                    <div class="fcl-block wraps_cont wraps_cont-padding">
                        <h4 class="main-color bold wraps_cont-margin">Удобства</h4>
                        <ul class="ul-style search-type-4">
                            <li style="">
                                <input type="checkbox" id="extra_166" name="fcl[]" value="166" data-fcl-id="166" class="fcl-list" />
                                <label for="extra_166">
                                    Парковка <span class="number-fcl">
                                    </span>
                                </label>
                            </li>
                            <li style="">
                                <input type="checkbox" id="extra_167" name="fcl[]" value="167" data-fcl-id="167" class="fcl-list" />
                                <label for="extra_167">
                                    Бассейн <span class="number-fcl">
                                    </span>
                                </label>
                            </li>
                            <li style="">
                                <input type="checkbox" id="extra_168" name="fcl[]" value="168" data-fcl-id="168" class="fcl-list" />
                                <label for="extra_168">
                                    Фитнесс <span class="number-fcl">
                                    </span>
                                </label>
                            </li>
                            <li style="">
                                <input type="checkbox" id="extra_169" name="fcl[]" value="169" data-fcl-id="169" class="fcl-list" />
                                <label for="extra_169">
                                    Термальный бассейн <span class="number-fcl"> </span>
                                </label>
                            </li>
                            <li style="">
                                <input type="checkbox" id="extra_170" name="fcl[]" value="170" data-fcl-id="170" class="fcl-list" />
                                <label for="extra_170">
                                    Присмотр за детьми <span class="number-fcl"> </span>
                                </label>
                            </li>
                            <li style="display:none;">
                                <input type="checkbox" id="extra_171" name="fcl[]" value="171" data-fcl-id="171" class="fcl-list" />
                                <label for="extra_171">
                                    Оборудование для инвалидов <span class="number-fcl"> </span>
                                </label>
                            </li>
                            <li style="display:none;">
                                <input type="checkbox" id="extra_173" name="fcl[]" value="173" data-fcl-id="173" class="fcl-list" />
                                <label for="extra_173">
                                    Диетические блюда <span class="number-fcl"> </span>
                                </label>
                            </li>
                            <li style="display:none;">
                                <input type="checkbox" id="extra_174" name="fcl[]" value="174" data-fcl-id="174" class="fcl-list" />
                                <label for="extra_174">
                                    Сауна <span class="number-fcl"> </span>
                                </label>
                            </li>
                            <li style="display:none;">
                                <input type="checkbox" id="extra_175" name="fcl[]" value="175" data-fcl-id="175" class="fcl-list" />
                                <label for="extra_175">
                                    Wi-Fi <span class="number-fcl"> </span>
                                </label>
                            </li>
                            <li style="display:none;">
                                <input type="checkbox" id="extra_178" name="fcl[]" value="178" data-fcl-id="178" class="fcl-list" />
                                <label for="extra_178">
                                    Диетические блюда <span class="number-fcl"> </span>
                                </label>
                            </li>
                        </ul>
                        <a href="javascript:void(0);" onclick="show_more(this,'search-type-4','show');" class="sh_all">
                            Показать все</a>
                    </div>
                    <input type="hidden" name="fTo" id="fTo" value="" />
                    <input type="hidden" name="sb" id="sb" value="" />
                </div>
                <div class="left-call left_call_page2">
                    <div class="video_sanat_iv iv_m_version last_im_v">
                        <div class="container-fluid">
                            <h3 class="title_ivv" style="padding-bottom:
                                    10px;">Служба поддержки клиентов</h3>
                            <div class="sanat_white_div sanat_white_dr" style="background-color:#eceff4;">
                                <h3 class="white_title last_white_title">Наталья
                                    Силкова <br>
                                    <small>Консультант</small>
                                </h3>
                                <div class="border_radios_div_sanat
                                        br_drm_img"></div>
                            </div>
                            <div href="ttps://www.youtube.com/watch?v=ZPuoT1SzpbI" class="video_fff about_video
                                    last_white_video_fff">
                                <div class="gray_larn_video mv_video">
                                    <div class="text_learn
                                            text_learn_ls_mv">
                                        <p>Посмотреть <br>
                                            видео
                                        </p>
                                    </div>
                                    <div class="learn_icon_div
                                            learn_icon_div_ls">
                                        <i class="fa fa-play"></i>
                                    </div>
                                </div>
                            </div>
                            <p id="video_fff_text_p">
                                Затрудняетесь самостоятельно выбрать
                                санаторий?<br />
                                Обращайтесь в нашу службу поддержки, мы
                                поможем сделать правильный выбор!
                            </p>
                        </div>
                    </div>
                    <div class="social_media_and_text_rite">
                        <div class="container-fluid">
                            <div class="bordeR_tik"></div>
                            <p id="social_p_white">Мы перезвоним и
                                проконсультируем бесплатно
                            <p>
                                <button type="button" class="social_button_rite" onclick="show_zadarma_call()" id="ksalksaska"><i class="fa
                                                fa-phone left_padding_plus"></i>
                                    Заказать звонок
                                </button>
                                <span id="rite_span">или
                                    проконсультируем по мессенджерам</span>
                            <ul id="rite_id">
                                <li id="wp_1">
                                    <a rel="nofollow" href="https://wa.me/79683815259" target="_blank">
                                        <img src="../../frontend/images/icons/whatsapp.png" alt="whatsapp
                                                        mysanatorium"></a>
                                    <p>Whatsapp</p>
                                    <div class="about_icon_rite">
                                        <div class="bordeR_tik"></div>
                                        <p id="md_rite">Для связи с
                                            нами добавьте номер</p>
                                        <p>+7 968 381 52 59</p>
                                        <p id="md_rite">в список
                                            контактов вашнго
                                            телефона</p>
                                    </div>
                                </li>
                                <li id="tl_1">
                                    <a href="https://t.me/mysanatorium_com" target="_blank">
                                        <img src="../../frontend/images/icons/telegram.png" alt="telegram
                                                        mysanatorium "></a>
                                    <p>Telegram</p>
                                    <div class="about_icon_rite
                                                    tl_about">
                                        <div class="bordeR_tik"></div>
                                        <p id="md_rite">Для связи с
                                            нами добавьте номер</p>
                                        <p>+7 968 381 52 59</p>
                                        <p id="md_rite">в список
                                            контактов вашнго
                                            телефона</p>
                                    </div>
                                </li>
                                <li id="vb_1">
                                    <a rel="nofollow" href="https://live.viber.com/#/mysanatorium" target="_blank">
                                        <img src="../../frontend/images/icons/viber.png" alt="viber
                                                        mysanatorium"></a>
                                    <p>Viber</p>
                                    <div class="about_icon_rite
                                                    vb_about">
                                        <div class="bordeR_tik"></div>
                                        <p id="md_rite">Для связи с
                                            нами добавьте номер</p>
                                        <p>+7 968 381 52 59</p>
                                        <p id="md_rite">в список
                                            контактов вашнго
                                            телефона</p>
                                    </div>
                                </li>
                                <li id="vk_1">
                                    <a rel="nofollow" href="https://vk.me/mysanatorium" target="_blank">
                                        <img src="../../frontend/images/icons/vkontakte.png" alt="vkontakte
                                                        mysanatorium"></a>
                                    <p>Vkontakte</p>
                                    <div class="about_icon_rite
                                                    vk_about">
                                        <div class="bordeR_tik"></div>
                                        <p>Vkontakte</p>
                                    </div>
                                </li>
                                <li id="mr_1">
                                    <a rel="nofollow" href="https://m.me/mysanatorium" target="_blank">
                                        <img src="../../frontend/images/icons/fb_messenger.png" alt="facebook messenger
                                                        mysanatorium"></a>
                                    <p>Messenger</p>
                                    <div class="about_icon_rite
                                                    m1_about">
                                        <div class="bordeR_tik"></div>
                                        <p>Messenger</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <style>
            @media (min-width: 792px) {
                .min-height-2000 {
                    min-height: 2000px;
                }
            }
        </style>
        <div class="col-md-9 right-sidebar padding-right-clear
                        min-height-2000">
            <div class="additional_info margin-bottom-20">

                <div class="font_mobile" style="display:
                                inline-block; padding-left: 10px;padding-top:
                                5px">
                    <h1 style="color: #013b47; margin: 0; display:
                                    inline-block">
                        <span style="margin:8px 0 0px 3px; display:
                                        inline-block; color: #013b47;">
                            Нахичевань </span>
                        <span style="margin: 0 0 10px
                                        3px;display:inline;color:#27a3bf;font-size:
                                        24px;">
                            найдено 1 варианта </span>
                </div>

                <section class="news">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12
                                                padding-clear">
                                <div class="container-fluid">
                                    <div class="row
                                                        child-control">
                                        <div class=" col-xs-12
                                                            col-sm-4 col-md-4
                                                            news child_app">
                                            <a href="../../vibor-kurorta/azerbaijan/nahichevanj/lechenie-v-duzdag.html">
                                                <div class="n-item
                                                                    new_shadow">
                                                    <div class="thumb
                                                                        description_img_div">
                                                        <img src="../../upload/news/thumbs/5d8de4b13cd9f.jpg" alt="">
                                                        <div class="description_title">
                                                            <a target="_blank" href="../../vibor-kurorta/azerbaijan/nahichevanj/lechenie-v-duzdag.html" style="color:
                                                                                white;
                                                                                font-weight:bold;">
                                                                <span class="dashed_border">
                                                                    Лечение
                                                                    в
                                                                    соляных
                                                                    пещерах
                                                                    Дуздага
                                                                </span>
                                                            </a>
                                                        </div>
                                                        <div class="description_news">
                                                            <a target="_blank" href="../../vibor-kurorta/azerbaijan/nahichevanj/lechenie-v-duzdag.html">
                                                                <span class="text-white" style="padding:
                                                                                    3px;">Подробнее
                                                                    ></span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class=" col-xs-12
                                                            col-sm-4 col-md-4
                                                            news child_app">
                                            <a href="../../vibor-kurorta/azerbaijan/nahichevanj/kak-dobratsya-v-nahichevanj.html">
                                                <div class="n-item
                                                                    new_shadow">
                                                    <div class="thumb
                                                                        description_img_div">
                                                        <img src="../../upload/news/thumbs/5d9205ee350fa.jpg" alt="">
                                                        <div class="description_title">
                                                            <a target="_blank" href="../../vibor-kurorta/azerbaijan/nahichevanj/kak-dobratsya-v-nahichevanj.html" style="color:
                                                                                white;
                                                                                font-weight:bold;">
                                                                <span class="dashed_border">
                                                                    Как
                                                                    добраться
                                                                    до
                                                                    санатория
                                                                    Дуздаг
                                                                </span>
                                                            </a>
                                                        </div>
                                                        <div class="description_news">
                                                            <a target="_blank" href="../../vibor-kurorta/azerbaijan/nahichevanj/kak-dobratsya-v-nahichevanj.html">
                                                                <span class="text-white" style="padding:
                                                                                    3px;">Подробнее
                                                                    ></span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class=" col-xs-12
                                                            col-sm-4 col-md-4
                                                            news child_app">
                                            <a href="../../vibor-kurorta/azerbaijan/nahichevanj/chto-privezti.html">
                                                <div class="n-item
                                                                    new_shadow">
                                                    <div class="thumb
                                                                        description_img_div">
                                                        <img src="../../upload/news/thumbs/5e68b979c7a0a.jpg" alt="">
                                                        <div class="description_title">
                                                            <a target="_blank" href="../../vibor-kurorta/azerbaijan/nahichevanj/chto-privezti.html" style="color:
                                                                                white;
                                                                                font-weight:bold;">
                                                                <span class="dashed_border">
                                                                    Что
                                                                    можно
                                                                    привезти
                                                                    из
                                                                    Нахичевани
                                                                </span>
                                                            </a>
                                                        </div>
                                                        <div class="description_news">
                                                            <a target="_blank" href="../../vibor-kurorta/azerbaijan/nahichevanj/chto-privezti.html">
                                                                <span class="text-white" style="padding:
                                                                                    3px;">Подробнее
                                                                    ></span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="n-item desc padding-left-10" style="display:none;margin-left: 5px">
                        <h3 style="color: black;">Лечения
                            санатории в </h3>

                        Lorem ipsum dolor sit amet, consectetur
                        adipisicing elit.
                        Commodi expedita iure iusto quasi
                        reiciendis repudiandae suscipit ullam
                        vero.
                        Iure minima numquam optio tempora
                        voluptate! Aliquid et nemo odit totam
                        veritatis?
                    </div>
                </section>

                <div class="row margin-clear">
                    <div class="sh_cl_treat">
                        <div class="sanatoriums_treatment">
                            <div class="areas_treatment_head" style="margin-top: 0;">
                                <div class="row margin-clear">
                                    <div class="col-md-12
                                                        bold-text text15" style="margin-left:
                                                        5px;padding-left: 0;">
                                        Основной профиль лечения</div>
                                    <div class="display_none
                                                        bold-text text15">
                                        Сопутствующие показания
                                        к лечению </div>
                                </div>
                            </div>
                            <div class="areas_treatment_body">
                                <div class="row margin-clear
                                                    ">
                                    <div class="col-md-12
                                                        border-left 3" style="
                                                        padding-top:
                                                        5px;line-height: 1.2;
                                                        margin-bottom: 15px">
                                        Болезни органов дыхания,
                                        ЛОР органы</div>
                                    <div class="display_none
                                                        border-left 3" style="margin-left: 6px;
                                                        padding-top:
                                                        5px;line-height: 1.2;">
                                    </div>
                                </div>
                            </div>
                            <div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row hrefShowSkitka">
                <div class="container-fluid">
                    <div class="grenLayerBox">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-1 col-sm-2
                                                    col-xs-0 pushHeightLayer">
                                    <div class="logoBoxLayer">
                                        <p class="percentIcn">%</p>
                                    </div>
                                </div>
                                <div class="col-md-11 col-sm-10
                                                    getHeightLayer
                                                    padding-clear">
                                    <div class="col-md-12">
                                        <p class="LayerBold">Дополнительные
                                            скидки при
                                            бронировании по
                                            телефону</p>
                                    </div>
                                    <div class="col-md-8
                                                        col-sm-7 col-xs-12 ">
                                        <p class="layerLower">
                                            Для получения
                                            информации о скидках
                                            при
                                            бронировании
                                            некоторых санаториев
                                            на курорте Боржоми
                                            звоните к нам по
                                            телефону
                                            или пишете в
                                            онлайн-чат.
                                        </p>
                                    </div>
                                    <div class="col-md-3
                                                        col-sm-3 col-xs-12
                                                        buttonLayer">
                                        <button class="greenLayerBlock" onclick="Chatra('openChat',
                                                            true)">Я хочу скидку</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row col-md-12 search-result-sort
                                margin-bottom-20 bottoms_rows" id="scroll_top_head">
                <div class="col-lg-5 col-md-4 col-sm-3 col-xs-3
                                    bold-text" style="font-size: 16px; color:
                                    #013b47; font-weight: normal;">
                    <p style="float: left">Сортировать &nbsp;</p>
                    <p class="col-sm-0" style="float: left">
                        санатории по критериям</p>
                    <p>:</p>
                </div>
                <div class="col-lg-7 col-md-8 col-sm-9 col-xs-9
                                    padding-clear">
                    <a class="list-sort-design active-sort" href="nahichevanj456d.html?sort=" selected>
                        Рекомендуемые
                    </a>
                    <a class="list-sort-design " href="nahichevanjc608.html?sort=qual">
                        Качество лечения </a>
                    <a class="list-sort-design " href="nahichevanj9122.html?sort=rew">
                        Отзывы гостей </a>

                </div>
                <input type="hidden" name="sort" value="">
            </div>
            <div class="right-sidebar-header" style="margin-top:
                                25px">
                <div class="row margin-clear">

                    <div class="searchPanelPopOver_0" id="box_shadow__0">
                        <div class="row first-view
                                            sanatorium-item">
                            <div class="row">
                                <div class="col-md-12 col-sm-12
                                                    col-xs-12 ">
                                    <div class="col-md-8
                                                        col-lg-9 col-sm-9
                                                        col-xs-12
                                                        padding-left-clear">
                                        <div class="sanatorium-item_head
                                                            ">
                                            <h2 class="h2MarginNone">
                                                <a target="_blank" class="sanatorum_link
                                                                    blue text24
                                                                    sanatorium_link_c" href="nahichevanj/sanatorij-duzdag21f9.html?fTo=01.07.2022+-+08.07.2022&amp;lRooms%5B0%5D%5B0%5D%5BlAge%5D=Adult&amp;lRooms%5B0%5D%5B0%5D%5BlTfd%5D=FBT&amp;lRooms%5B0%5D%5B1%5D%5BlAge%5D=Adult&amp;lRooms%5B0%5D%5B1%5D%5BlTfd%5D=FBT&amp;cty_slct%5B0%5D=42&amp;snt_slct%5B0%5D=111&amp;couList=81">Санаторий
                                                    Дуздаг
                                                    (Duzdag)
                                                    <span class="sanatorium-rating" style="vertical-align:
                                                                        inherit;">
                                                        <div class="filter_star
                                                                            star"></div>
                                                        <div class="filter_star
                                                                            star"></div>
                                                        <div class="filter_star
                                                                            star"></div>
                                                        <div class="filter_star
                                                                            star"></div>
                                                        <div class="filter_star
                                                                            star"></div>
                                                    </span>
                                                </a>
                                            </h2>
                                        </div>
                                    </div>
                                    <div class="col-md-4
                                                        col-lg-3 col-sm-3
                                                        col-xs-12">
                                        <div class="right-block-inform
                                                            padding-right-clear
                                                            top_page2_otviz_part
                                                            width_25 col-xs-0">
                                            <div class="row
                                                                margin-clear
                                                                border_bottom">
                                                <div class="show_review_border
                                                                    text-center" style="float:
                                                                    left;">
                                                    <a class="reviews-a
                                                                        " href="nahichevanj/sanatorij-duzdag/reviews.html" target="_blank">
                                                        <div class="text14
                                                                            line-height-1
                                                                            bold-text
                                                                            down_text_1" style="color:
                                                                            #27A3BF;">
                                                            <p class="int-mobileOt
                                                                                margin-clear">8.8</p>
                                                            <span class="text11" style="color:#095764;">
                                                                <span>Общий</span>
                                                                рейтинг
                                                            </span>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="show_review_border
                                                                    text-center">
                                                    <a class="reviews-a
                                                                        down_bottom" href="nahichevanj/sanatorij-duzdag/reviews.html" target="_blank">
                                                        <div class="text14
                                                                            line-height-1
                                                                            bold-text
                                                                            right_block" style="color:
                                                                            green;
                                                                            float:
                                                                            right;">
                                                            <p class="int-mobileOt
                                                                                margin-clear">
                                                                8.9
                                                            </p>
                                                            <span class="text11
                                                                                " style="color:#095764;">
                                                                <span>Рейтинг</span>
                                                                лечения
                                                            </span>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="show_review_border
                                                                    text-right
                                                                    red_right">
                                                    <a class="reviews-a
                                                                        " href="nahichevanj/sanatorij-duzdag/reviews.html" target="_blank">
                                                        <div class="text14
                                                                            line-height-1
                                                                            margin-bottom-10
                                                                            bold-text
                                                                            down_bottom_otzv
                                                                            down_text_page2" style="color:
                                                                            #f03f28;">
                                                            58
                                                            <span class="text11
                                                                                font-size_big">Читать
                                                                отзывы</span>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <input type="hidden" value="111" id="price-san-id">
                                            <input type="hidden" value="0" id="price-modal-id">
                                            <input type="hidden" value="1" id="price-number-rooms">
                                            <input type="hidden" value="1" id="price-number-adults">
                                            <input type="hidden" value="0" id="price-number-nights">
                                            <input type="hidden" value="1" id="price-total-numbers-people">
                                            <input type="hidden" value="$" id="price-currency-symbol">
                                            <input type="hidden" value="" id="price-date-begin">
                                            <input type="hidden" value="" id="price-date-end">
                                            <input type="hidden" value="01.07.2022
                                                                - 08.07.2022" id="price-full-date">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12
                                                padding-clear
                                                left-block-inform">
                                <div class="col-lg-4 col-md-5
                                                    col-sm-5 padding-left-clear
                                                    padding-rightf-clear
                                                    before_title">
                                    <div class="sanatorium_main_img">
                                        <div class="discount-picture">
                                            <div class="ribbon" style="display:block;">
                                                <span class="ribbon_contents">
                                                    <span>Вы
                                                        экономите</span>
                                                    <span class="discount-prices">-10%</span>
                                                </span>
                                            </div>
                                            <div class="ribbon
                                                                ribbon_ekskursiya" style="display:
                                                                block;
                                                                margin-top:
                                                                30%;">
                                                <span class="ribbon_contents">
                                                    <div class="bold-text">Бесплатная
                                                        экскурсия
                                                        в
                                                        Нахичевань</div>
                                                </span>
                                            </div>
                                            <div class="ribbon
                                                                ribbon_transfer" style="display:
                                                                block;
                                                                margin-top: 30%;
                                                                ">
                                                <span class="ribbon_contents">
                                                    <div class="bold-text">
                                                        БЕСПЛАТНЫЙ
                                                        ТРАНСФЕР
                                                    </div>
                                                </span>
                                            </div>
                                        </div>
                                        <div href="https://www.youtube.com/watch?v=8uVit-CM5TY" class="about_video
                                                            page2_video
                                                            hoverVideo
                                                            top_right_video_icon
                                                            yeniclass">
                                            <div class="video_text
                                                                text-right" style="display:inline-block;">
                                                Посмотреть<br />
                                                видео
                                            </div>
                                            <div class="video_icon">
                                                <i class="fa
                                                                    fa-play" aria-hidden="true">
                                                </i>
                                            </div>
                                        </div>
                                        <div class="sanat-img">
                                            <a href="nahichevanj/sanatorij-duzdag21f9.html?fTo=01.07.2022+-+08.07.2022&amp;lRooms%5B0%5D%5B0%5D%5BlAge%5D=Adult&amp;lRooms%5B0%5D%5B0%5D%5BlTfd%5D=FBT&amp;lRooms%5B0%5D%5B1%5D%5BlAge%5D=Adult&amp;lRooms%5B0%5D%5B1%5D%5BlTfd%5D=FBT&amp;cty_slct%5B0%5D=42&amp;snt_slct%5B0%5D=111&amp;couList=81" target="_blank">
                                                <img src="../../upload/sanatorium/item/thumbs/thumb-360x260.5acb8d4c3a0d3.jpg" alt="">
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="row col-md-0
                                                    col-sm-0">
                                    <div class="col-xs-12
                                                        col-md-0 col-lg-0
                                                        col-sm-0">
                                        <ul class="mobile_otviz">
                                            <li>
                                                <a class="text-center" href="nahichevanj/sanatorij-duzdag/reviews.html" target="_blank">
                                                    <div class="small_text_mobileOt
                                                                        otv_blue">
                                                        <p class="int-mobileOt
                                                                            margin-clear">
                                                            8.8
                                                        </p>
                                                        <span class="small_text_mobileOt">
                                                            <span>Общий</span>
                                                            рейтинг
                                                        </span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="text-center" href="nahichevanj/sanatorij-duzdag/reviews.html" target="_blank">
                                                    <div class="small_text_mobileOt
                                                                        otv_green">
                                                        <p class="int-mobileOt
                                                                            margin-clear">8.9</p>
                                                        <span class="small_text_mobileOt">
                                                            <span>Рейтинг</span>
                                                            лечения
                                                        </span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="nahichevanj/sanatorij-duzdag/reviews.html" target="_blank">
                                                    <span class="small_text_mobileOt
                                                                        otv_red">
                                                        <p class="otv_red
                                                                            small_text_mobileOt" style="margin:
                                                                            0;
                                                                            padding:0;
                                                                            text-align:
                                                                            center;">58
                                                            <br>
                                                            Читать
                                                            отзывы
                                                        </p>
                                                    </span></a>
                                            </li>
                                        </ul>
                                        <input type="hidden" value="111" id="price-san-id">
                                        <input type="hidden" value="0" id="price-modal-id">
                                        <input type="hidden" value="1" id="price-number-rooms">
                                        <input type="hidden" value="1" id="price-number-adults">
                                        <input type="hidden" value="0" id="price-number-nights">
                                        <input type="hidden" value="1" id="price-total-numbers-people">
                                        <input type="hidden" value="$" id="price-currency-symbol">
                                        <input type="hidden" value="" id="price-date-begin">
                                        <input type="hidden" value="" id="price-date-end">
                                        <input type="hidden" value="01.07.2022 -
                                                            08.07.2022" id="price-full-date">
                                    </div>
                                </div>
                                <div class="otz_border col-md-0
                                                    col-sm-0"></div>

                                <div class="col-lg-8 col-md-7
                                                    col-sm-7 top_mobile_div" id="height_class_">

                                    <div class="col-md-12
                                                        col-sm-12 padding-clear
                                                        darkblue">
                                        <div class="text12
                                                            opacity_color">
                                            Нахичевань,
                                            Азербайджан </div>
                                    </div>
                                    <br><br>
                                    <div class="text_div_title_and_text">
                                        <p id="page2_event_title">Преимущества
                                            санатория:</p>
                                        <ul class="first-view-ul" id="datalist111">
                                            <ul>
                                                <li>лечение в
                                                    природной
                                                    соляной
                                                    пещере</li>
                                            </ul>
                                            <ul>
                                                <li>возможность
                                                    лечения
                                                    детей без
                                                    возрастного
                                                    ограничения,
                                                    по
                                                    специальной
                                                    программе</li>
                                            </ul>
                                            <ul>
                                                <li>высококвалифицированные
                                                    специалисты</li>
                                            </ul>
                                            <ul>
                                                <li>наличие двух
                                                    бассейнов
                                                    &ndash;
                                                    закрытого и
                                                    открытого</li>
                                            </ul>
                                            <ul>
                                                <li>современный
                                                    аквапарк и
                                                    полный набор
                                                    спортивных
                                                    площадок</li>
                                            </ul>
                                            <ul>
                                                <li>бесплатный
                                                    трансфер от
                                                    санатория до
                                                    соляных
                                                    пещер и
                                                    обратно</li>
                                            </ul>
                                            <ul>
                                                <li>бесплатный
                                                    трансфер от
                                                    аэропорта до
                                                    отеля и
                                                    обратно</li>
                                            </ul>
                                        </ul>
                                        <a href="javascript:void(0);" data-title="Закрыть" id="myDatalist111" class="
                                                            toggle_height">Показать
                                            больше</a>
                                    </div>
                                </div>
                            </div>
                            <div class="icons_block_div_page_2">
                                <div class="row">
                                    <div class="col-md-12
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
                                                    <a id="df1_title" href="nahichevanj/sanatorij-duzdag21f9.html?fTo=01.07.2022+-+08.07.2022&amp;lRooms%5B0%5D%5B0%5D%5BlAge%5D=Adult&amp;lRooms%5B0%5D%5B0%5D%5BlTfd%5D=FBT&amp;lRooms%5B0%5D%5B1%5D%5BlAge%5D=Adult&amp;lRooms%5B0%5D%5B1%5D%5BlTfd%5D=FBT&amp;cty_slct%5B0%5D=42&amp;snt_slct%5B0%5D=111&amp;couList=81" target="_blank">
                                                        <p class="text-center" style="margin:
                                                                            0;">Двухместный
                                                            номер
                                                            ''Стандарт''</p>
                                                    </a>
                                                    <div class="df_ul_Div">
                                                    </div>
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
                                                                    <a href="nahichevanj/sanatorij-duzdag21f9.html?fTo=01.07.2022+-+08.07.2022&amp;lRooms%5B0%5D%5B0%5D%5BlAge%5D=Adult&amp;lRooms%5B0%5D%5B0%5D%5BlTfd%5D=FBT&amp;lRooms%5B0%5D%5B1%5D%5BlAge%5D=Adult&amp;lRooms%5B0%5D%5B1%5D%5BlTfd%5D=FBT&amp;cty_slct%5B0%5D=42&amp;snt_slct%5B0%5D=111&amp;couList=81" target="_blank">
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
                                                        <a id="df1_title" href="nahichevanj/sanatorij-duzdag21f9.html?fTo=01.07.2022+-+08.07.2022&amp;lRooms%5B0%5D%5B0%5D%5BlAge%5D=Adult&amp;lRooms%5B0%5D%5B0%5D%5BlTfd%5D=FBT&amp;lRooms%5B0%5D%5B1%5D%5BlAge%5D=Adult&amp;lRooms%5B0%5D%5B1%5D%5BlTfd%5D=FBT&amp;cty_slct%5B0%5D=42&amp;snt_slct%5B0%5D=111&amp;couList=81" target="_blank">Двухместный
                                                            номер
                                                            ''Стандарт''</a>
                                                        <div class="df_ul_Div">
                                                        </div>
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
                                                                                    left;">Цена
                                                                    включает</div>
                                                            </div>
                                                            <br>
                                                            <div class="col-md-0
                                                                                col-sm-12
                                                                                col-xs-0
                                                                                " style="margin-top:
                                                                                0;
                                                                                margin-bottom:
                                                                                20px;" id="down_version">
                                                                <div class="">Цена
                                                                    включает</div>
                                                            </div>
                                                            <div class="col-md-10
                                                                                col-sm-12
                                                                                col-xs-12">
                                                                <div class="flex-icn-items">
                                                                    <div class="flex-col-item">
                                                                        <div class="flex-title-icons">
                                                                            <img src="../../images/icons/nights.png" alt="">
                                                                            <div class="text_col-items">
                                                                                <p>
                                                                                    ночей
                                                                                    проживания</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="flex-col-item">
                                                                        <div class="flex-title-icons">
                                                                            <img src="../../images/icons/food.png" alt="">
                                                                            <div class="text_col-items">
                                                                                <p>
                                                                                    3-x
                                                                                    разовое
                                                                                    питание</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="flex-col-item">
                                                                        <div class="flex-title-icons">
                                                                            <img src="../../upload/manual/treatmentpackage/5bd851c0be1fd.png" alt="">
                                                                            <div class="text_col-items">
                                                                                <p>
                                                                                    2
                                                                                    осмотра
                                                                                    доктора</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="flex-col-item">
                                                                        <div class="flex-title-icons">
                                                                            <img src="../../upload/manual/treatmentpackage/5bd85568913be.png" alt="">
                                                                            <div class="text_col-items">
                                                                                <p>
                                                                                    лечение
                                                                                    в
                                                                                    соляных
                                                                                    пещерах</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="flex-col-item">
                                                                        <div class="flex-title-icons">
                                                                            <img src="../../upload/manual/treatmentpackage/5bd85300b30af.png" alt="">
                                                                            <div class="text_col-items">
                                                                                <p>
                                                                                    бесплатный
                                                                                    трансфер
                                                                                    из
                                                                                    аэропорта
                                                                                    в
                                                                                    санаторий</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="flex-col-item">
                                                                        <div class="flex-title-icons">
                                                                            <img src="../../upload/manual/treatmentpackage/5bd853748568d.png" alt="">
                                                                            <div class="text_col-items">
                                                                                <p>
                                                                                    трансфер
                                                                                    санаторий-пещера-санаторий</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="flex-col-item">
                                                                        <div class="flex-title-icons">
                                                                            <img src="../../upload/manual/treatmentpackage/5e54d6e7e6fb9.png" alt="">
                                                                            <div class="text_col-items">
                                                                                <p>
                                                                                    бесплатная
                                                                                    экскурсия
                                                                                    в
                                                                                    Нахичевань</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2
                                                                                col-sm-0
                                                                                col-xs-0
                                                                                margin-clear" id="down_version">
                                                                <div class="">Цена
                                                                    <br>
                                                                    включает
                                                                </div>
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
                                                    <p id="ref_title">Цена
                                                        за номер</p>
                                                    <p id="ref_small">лечение
                                                        / 3-х
                                                        разове
                                                        питание
                                                        / <br> 1
                                                        ночей
                                                        проживания
                                                        / 1
                                                        взрослых</p>
                                                </div>
                                                <p class="price_df16
                                                                    darkblue" style="margin-top:
                                                                    0px;">
                                                    <span class="text18" style="color:
                                                                        #27A3BF">от</span>
                                                    55 $
                                                </p>
                                                <a href="nahichevanj/sanatorij-duzdag21f9.html?fTo=01.07.2022+-+08.07.2022&amp;lRooms%5B0%5D%5B0%5D%5BlAge%5D=Adult&amp;lRooms%5B0%5D%5B0%5D%5BlTfd%5D=FBT&amp;lRooms%5B0%5D%5B1%5D%5BlAge%5D=Adult&amp;lRooms%5B0%5D%5B1%5D%5BlTfd%5D=FBT&amp;cty_slct%5B0%5D=42&amp;snt_slct%5B0%5D=111&amp;couList=81" target="_blank" class="df16_number">Посмотреть
                                                    номера</a>
                                                <p class="df16_grey" style="color:#939da7;">Моментальное
                                                    подтверждение</p>
                                                <p class="df16_grey" style="color:#939da7;">Оплата
                                                    при
                                                    заселении</p>
                                                <p class="df16_green">Банковская
                                                    карта не
                                                    требуется</p>
                                                <p class="df16_green">
                                                    Мы
                                                    возвращаем
                                                    разницу в
                                                    цене</p>
                                                <p class="df16_green">Бесплатная
                                                    отмена</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <style>
                        .simple-ajax-popup-align-top:hover {
                            text-decoration: none;
                            border-bottom-color: red;
                        }
                    </style>
                    <div class="row margin-clear banner-view" style="margin-bottom: 15px;">
                        <div class="col-md-10 col-sm-10
                                            padding-clear">
                            <p class="white-text text24">
                                Вы не знаете, по каким критериям
                                выбрать санаторий? </p>
                            <p class="white-text text14 ">
                                Звоните бесплатно или отправьте
                                нам запрос. Наши курортологи
                                помогут вам в правильном выборе
                                санатория! </p>
                        </div>
                        <div class="col-md-8 col-sm-8 col-xs-12
                                            padding-clear margin-top-10
                                            banner-number-country">
                            <div class="col-md-12 col-sm-12
                                                padding-clear margin-top-10">
                                <div class="col-md-6 col-sm-6
                                                    padding-clear">
                                    <p class="white-text
                                                        margin-clear">Международный
                                        звонок</p>
                                    <p class="white-text
                                                        text20"><i class="phone-icon"></i>
                                        <a href="tel:+74993808232"><span style="color:
                                                                red">+7 499</span>
                                            380-82-32</a>
                                    </p>
                                </div>
                                <div class="col-md-6 col-sm-6
                                                    padding-clear">
                                    <p class="white-text
                                                        margin-clear">Бесплатный
                                        по Росиии</p>
                                    <p class="white-text
                                                        text20"><i class="phone-icon"></i>
                                        <span style="color:red;">8800</span>
                                        350-82-32
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12
                                                padding-clear">
                                <div class="col-md-6 col-sm-6
                                                    padding-clear">
                                    <p class="white-text
                                                        margin-clear">Бесплатный
                                        по Украине</p>
                                    <p class="white-text
                                                        text20"><i class="phone-icon"></i>
                                        <a href="tel:+380800211597"><span style="color:
                                                                red">+380</span>
                                            800 21-15-97</a>
                                    </p>
                                </div>
                                <div class="col-md-6 col-sm-6
                                                    padding-clear">
                                    <a href="../../konsuljtatsiya-vrachey.html" target="_blank" class="btn-choose-sanatorium
                                                        text24 bold-text
                                                        text-center">
                                        Задать вопрос </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection