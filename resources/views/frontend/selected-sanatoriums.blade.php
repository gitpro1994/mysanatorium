@extends('frontend.layouts.app')
@section('style-code')
<style>
    .main_overlay {
        position: absolute;
        background-color: #fff;
        opacity: 0.5;
    }
</style>
@endsection
@section('content')
@include('frontend.layouts.partials.search-bar')
<div class="advantage" id="hide_location" style="display: block;">
    <div class="container">
        <div class="row">
            <div class="container mobil_none_padding">
                <div class="col-xs-6 col-md-6 col-lg-6 padding-clear">
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12 none_padding_advantage">
                        <div id="icon_2_page">
                            <div class="image_advan_div col-md-2 col-sm-12">
                                <img src="/frontend/images/СЛУЖБА ПОДДЕРЖКИ.png" id="sanat_img1" alt="error">
                            </div>
                            <div class="col-md-10 col-sm-12 advar_text">
                                <div class="advar_text_content">
                                    <span id="sanat_title1">СЛУЖБА ПОДДЕРЖКИ</span>
                                    <p id="small_advar_text" class="sanat_text1">помощь и консультация опытных специалистов</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 none_padding_advantage">
                        <div id="icon_2_page">
                            <div class="image_advan_div col-md-2 col-sm-12">
                                <img src="/frontend/images/ВЫГОДНЫЕ ЦЕНЫ.png" id="sanat_img2" alt="error">
                            </div>
                            <div class="col-md-10 col-sm-12 advar_text">
                                <div class="advar_text_content">
                                    <span id="sanat_title2">ВЫГОДНЫЕ ЦЕНЫ</span>
                                    <p id="small_advar_text" class="sanat_text2"> ниже, чем на официальных сайтах санаториев</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-md-6 col-sm-6 col-lg-6 padding-clear">
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12 none_padding_advantage">
                        <div id="icon_2_page" class="last_advar_padding">
                            <div class="image_advan_div col-md-2 col-sm-12">
                                <img src="/frontend/images/БЕЗ ПРЕДОПЛАТЫ.png" id="sanat_img3" alt="error">
                            </div>
                            <div class="col-md-10 col-sm-12 advar_text">
                                <div class="advar_text_content">
                                    <span id="sanat_title4">БЕЗ ПРЕДОПЛАТЫ</span>
                                    <p id="small_advar_text" class="sanat_text4"> оплата при заселении</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12 none_padding_advantage">
                        <div id="icon_2_page">
                            <div class="image_advan_div col-md-2 col-sm-12">
                                <img src="/frontend/images/БРОНИРУЙТЕ OНЛАЙН.png" id="sanat_img4" alt="error">
                            </div>
                            <div class="col-md-10 col-sm-12 advar_text">
                                <div class="advar_text_content">
                                    <span id="sanat_title3">БРОНИРУЙТЕ OНЛАЙН</span>
                                    <p id="small_advar_text" class="sanat_text3">мгновенное подтверждение при бронировании</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection