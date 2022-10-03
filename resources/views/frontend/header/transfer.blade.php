@extends('frontend.layouts.app')
@section('content')

<section id="breadcrumbs ss">
    <ul class="breadcrumb">
        <li><a href="index.html" data-original-title="" title="">Главная</a></li>
        <li class="active">Трансфер</li>
    </ul>
</section>

<section id="navbar-transfer" class="step-first">
    <div class="container">
        <div class="col-md-12 padding-clear">
            <a href="transfer.html" data-original-title="" title="">
                <div class="col-md-4 nav_parent nav-trans active">
                    <span>Трансфер</span>
                </div>
            </a>
            <div class="col-md-4 nav-trans  ">
                <span>1 шаг: Выбор маршрута</span>
            </div>
            <div class="col-md-4 nav-trans ">
                <span>2 шаг: Данные пассажира</span>
            </div>
        </div>
    </div>
</section>

<section id="transfer-header">
    <form id="transfer-search" action="" method="get">
        <div class="transfer-header">
            <div class="container">
                <div class="col-md-8 transfer-top-left-form">
                    <h2 class="margin-clear text46 text-white">Мы всегда рады встретить Вас!</h2>
                </div>
                <div class="col-md-4 transfer-top-right-form">
                    <h4 class="text28" style="margin-bottom:20px;">Заполните форму<br> для поиска трансфера!</h4>
                    <div class="form-group">
                        <div class="form-group field-transfer-country_id">
                            <div class="form-group trip"><select id="transfer-country_id" class="form-control  select-blue-colored" name="Transfer[country_id]">
                                    <option value="0">Выбрать страну</option>
                                    <option value="10874">Чехия</option>
                                    <option value="9908">Украина</option>
                                    <option value="5673">Словения</option>
                                    <option value="5666">Словакия</option>
                                    <option value="3159">Россия</option>
                                    <option value="2514">Литва</option>
                                    <option value="2448">Латвия</option>
                                    <option value="1786">Италия</option>
                                    <option value="1280">Грузия</option>
                                    <option value="924">Венгрия</option>
                                    <option value="428">Болгария</option>
                                    <option value="81">Азербайджан</option>
                                </select>
                                <div class="help-block"></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group field-transfer-start_transfer required">
                            <div class="form-group trip"><select id="transfer-start_transfer" class="form-control   select-blue-colored" name="Transfer[start_transfer]" aria-required="true">
                                    <option value="0">Откуда</option>
                                </select>
                                <div class="help-block"></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group field-transfer-end_transfer required">
                            <div class="form-group trip"><select id="transfer-end_transfer" class="form-control   select-blue-colored" name="Transfer[end_transfer]" aria-required="true">
                                    <option value="0">Куда</option>
                                </select>
                                <div class="help-block"></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="sanatorium-red-button normal btn-transfer-searc" style="width: 100%;">Найти трансфер</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="transfer-bottom">
        <div class="container">
            <div class="col-md-4 padding-clear">
                <div class="media">
                    <div class="media-left transfer_bottom_media_image">
                        <img class="media-object" src="{{ asset('frontend/img/icons/transfer_icon_1.png')}}" style="width:80px;">
                    </div>
                    <div class="media-body" style="padding-top:20px;">
                        <h4 class="media-heading text-white bold-text">Бесплатное ожидание</h4>
                        <span class="text-lightblue">если рейс задерживается</span>
                    </div>
                </div>
            </div>
            <div class="col-md-4 padding-clear">
                <div class="media">
                    <div class="media-left transfer_bottom_media_image">
                        <img class="media-object" src="{{ asset('frontend/img/icons/transfer_icon_2.png')}}" style="width:80px;">
                    </div>
                    <div class="media-body" style="padding-top:20px;">
                        <h4 class="media-heading text-white bold-text">Цена известна заранее</h4>
                        <span class="text-lightblue">и не изменится во время поездки</span>
                    </div>
                </div>
            </div>
            <div class="col-md-4 padding-clear">
                <div class="media">
                    <div class="media-left transfer_bottom_media_image">
                        <img class="media-object" src="{{ asset('frontend/img/icons/transfer_icon_3.png')}}" style="width:80px;">
                    </div>
                    <div class="media-body" style="padding-top:20px;">
                        <h4 class="media-heading text-white bold-text">Водитель с табличкой встретит</h4>
                        <span class="text-lightblue">точно вовремя и поможет с багажом</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="transfer-body">
    <div class="container-fluid">
        <div class="row">
            <div class="container">
                <h2 class="darkblue text-bold text48">Как <span class="text-lightblue">это</span> работает?</h2>
            </div>
        </div>
        <div class="row transfer_body_list">
            <div class="container">
                <div class="media">
                    <div class="media-left my_media_left">
                        <img class="media-object my_media_obj" src="{{ asset('frontend/img/icons/transfer_body_1.png')}}" alt="" style="width:204px;">
                    </div>
                    <div class="media-body media-middle" style="padding-left:40px;">
                        <h3 class="media-heading darkblue bold-text text30">Вы можете заказать трансфер на любую
                            дату,</h3>
                        <span class="darkblue text16"> но не позже чем <span class="red"> за 48 часов</span> до поездки</span>
                    </div>
                    &nbsp;
                </div>
            </div>
        </div>
        <div class="row transfer_body_list">
            <div class="container">
                <div class="media">
                    <div class="media-body media-middle my_media_left">
                        <h3 class="media-heading darkblue bold-text text30">Водитель отслеживает прилет по номеру
                            рейса,</h3>
                        <span class="darkblue text16">и если рейс задерживается, он подождет или приедет за Вами позже</span>
                    </div>
                    <div class="media-right">
                        <img class="media-object my_media_obj_r" src="{{ asset('frontend/img/icons/transfer_body_2.png')}}" alt="" style="width:204px;">
                    </div>
                </div>
            </div>
        </div>
        <div class="row transfer_body_list">
            <div class="container">
                <div class="media">
                    <div class="media-left my_media_left">
                        <img class="media-object my_media_obj" src="{{ asset('frontend/img/icons/transfer_body_3.png')}}" style="width:204px;">
                    </div>
                    <div class="media-body media-middle" style="padding-left:40px;">
                        <h3 class="media-heading darkblue bold-text text30">В указанное время в зале ожидания
                            аэропорта Вас будет встречать
                            водитель</h3>
                        <span class="darkblue text16">с табличкой, где указаны Ваши фамилия и имя. После посадки самолета, пожалуйста,
                            держите свой телефон включенным, в зоне слышимости. Это необходимо для того, чтобы
                            водитель в случае необходимости мог&nbsp;<span class="red">связаться с Вами </span></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row transfer_body_list">
            <div class="container">
                <div class="media">
                    <div class="media-body media-middle my_media_left">
                        <h3 class="media-heading darkblue bold-text text30">Оплату Вы можете произвести </h3>
                        <p class="darkblue text16"><span class="red">наличными,</span> заплатив водителю, когда он
                            привезет Вас на место назначения. Пожалуйста, подготовьте необходимую сумму заранее.
                            Оплата в ваучере указана в валюте (евро/доллар) или в местной валюте по официальному
                            курсу.</p>
                    </div>
                    <div class="media-right">
                        <img class="media-object my_media_obj_r" src="{{ asset('frontend/img/icons/transfer_body_4.png')}}" alt="" style="width:204px;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection