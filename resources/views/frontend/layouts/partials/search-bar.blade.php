<section id="search_panel" class="video-design-edit">
    <div class="container personsPickers new_video_bottom">
        <div class="mobileBlockTextShow">
            <div class="row">
                <div class="col-md-9 col-xs-9 col-sm-9">
                    <p class="whiteTextMobile">Бронируйте санатории по доступным ценам</p>
                </div>
                <div class="col-md-3 col-xs-3 col-sm-3 valutaBoxHeader"></div>
            </div>
        </div>
        <div class="col-md-12 padding-clear">
            <form id="main-form" method="POST" action="{{ route('selected_sanatoriums') }}">
                @csrf
                <div class="col-md-5">
                    <div class="form-group">
                        <input type="button" class="form-control icon-my icon-left icon-search-destination search-button destination-button" id="json_search" data-toggle="tooltip" data-trigger="focus" data-placement="auto" title="Чтобы начать поиск, введите направление." value="Страна, город или санаторий" onclick="get_destination(this,'open')" />
                        <div class="destination_find_input">
                            <input type="text" class="form-control destination_search_input" placeholder="Страна, город или санаторий" onkeyup="get_destination_find(this,'')">
                            <div class="close-button" onclick="get_destination_select(this,'close','')">×</div>
                        </div>
                    </div>
                    <div class="destination-box" tabindex="-1" style="line-height: initial;width:843px;">
                        <input type="hidden" class="destination_search_input_hidden">
                        <div class="row destination-not-writing">
                            <div class="col-md-6" style="padding:0px;">
                                <label class="destination_title" style="margin:0px;">Страна</label>
                                <div class="list_section country_list">
                                    <ul class="reset_ul">
                                        @foreach($countries as $country)
                                        <li style="border-bottom: 1px dashed #d9d9d9">
                                            <input type="radio" name="couList" id="cntr_{{$country->id}}" value="{{ $country->id }}" onclick="get_destination_select(this,'country','');">
                                            <label for="cntr_{{$country->id}}">{{ $country->title }}</label>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6" style="padding:0px;">
                                <label class="destination_title">Города</label>
                                <div class="non_selected_destination">Сначала выберите страну</div>
                                <div class="list_section city_list">
                                    <ul class="reset_ul">
                                        @foreach($cities as $city)
                                        <li class="display_none cities_{{$city->getCountry['id']}}" style="border-bottom: 1px dashed #d9d9d9">
                                            <input type="checkbox" name="cty_slct[]" id="cty_{{$city->getCountry['id']}}.{{$city->id}}" value="{{$city->id}}" onclick="get_destination_select(this,'selected_city','');">
                                            <label for="cty_{{$city->getCountry['id']}}.{{$city->id}}" data-name="city">{{$city->title}}</label>
                                            <small class="destination-open float-right" onclick="get_destination_select(this,'sanatoriums','open');">
                                                санатории
                                                <span class="glyphicon glyphicon-menu-down" aria-hidden="true"> </span>
                                            </small>
                                            <ul class="reset_ul display_none sanatoriums_list">
                                                @foreach($city->getSanatoriums as $sanatorium)
                                                <li style="border-bottom: 1px dashed #d9d9d9">
                                                    <input type="checkbox" name="snt_slct[]" id="snt_{{$sanatorium->getCountry['id']}}.{{ $sanatorium->getCity['id'] }}.{{ $sanatorium->id }}" value="{{ $sanatorium->id }}" onclick="get_destination_select(this,'selected_sanatorium','');">
                                                    <label for="snt_{{$sanatorium->getCountry['id']}}.{{ $sanatorium->getCity['id'] }}.{{ $sanatorium->id }}" data-name="sanatorium">{{ $sanatorium->name }}</label>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="row destination-writing display_none">
                            <div class="col-md-3" style="padding:0px;">
                                <label class="destination_title">Страна</label>
                                <div class="country_search_list">
                                    <div class="not_found_destination"><span class='text-underline'></span>
                                    </div>
                                    <div class="found_destination display_none">
                                        <ul class="reset_ul">
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4" style="padding:0px;">
                                <label class="destination_title">Города</label>
                                <div class="city_search_list">
                                    <div class="not_found_destination"><span class='text-underline'></span>
                                    </div>
                                    <div class="found_destination display_none">
                                        <ul class="reset_ul">
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5" style="padding:0px;">
                                <label class="destination_title">Санатории</label>
                                <div class="sanatorium_search_list">
                                    <div class="not_found_destination"> <span class='text-underline'></span>
                                    </div>
                                    <div class="found_destination display_none">
                                        <ul class="reset_ul">
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row destination_all_not_found">
                            <div class="not_found_destination">Извините, но мы не нашли <span class='text-underline'>ничего</span>.
                            </div>
                        </div>
                        <div class="row">
                            <div class="destination-footer">
                                <div class="col-md-6 text-left">
                                    <a href="javascript:void(0);" onclick="get_destination_select(this,'reset_all','');" class="main-color-2 bold" style="text-decoration:none;"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Сброс</a>
                                </div>
                                <div class="col-md-6 text-right">
                                    <a class="btn-choose-sanatorium text-center" style="display: inline-block; width: 150px; margin: 7px 0; line-height: 38px; height: 39px;" onclick="get_destination_accept(this);">
                                        Выбрать
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <style>
                        .personsPickers .tooltip-inner {
                            max-width: 400px !important;
                            color: #fff;
                            background-color: #D40000 !important;
                            padding: 0px 10px !important;
                            text-align: center !important;
                            margin-left: 65px;
                            margin-top: -10px;
                            font-weight: 600;
                            font-size: 16px;
                        }

                        .personsPickers .tooltip.top .tooltip-arrow,
                        .tooltip.top-left .tooltip-arrow {
                            border-top-color: #D40000 !important;
                        }

                        ul.reset_ul li.destination-li span.textCopy+span {
                            color: #27a3bf;
                        }
                    </style>
                    <div class="other_type_input"></div>

                </div>
                <div class="col-md-3 width22">
                    <button type="button" class="form-control icon-my icon-left icon-search-calendar search-button date-f line" id="d-p-406">
                        <input type="hidden" name="fTo" value="">
                        Прибытие &#65515; Выезд
                    </button>
                </div>


                <div class="col-md-3">
                    <div class="pp">
                        <div id="popup-person">
                            <button type="button" class="icon-my icon-left icon-search-person form-control search-button" id="myybtn">
                                <span>
                                    <span>Номеров <span><b>
                                                1</b></span> | Взрослых <span><b>
                                                2</b></span> | Детей <span><b>
                                                0</b></span>
                                    </span>
                                    <br>
                                    <small class="new_small" style="font-size:14px;">
                                        3-разовое питание с лечением</small></span>
                            </button>
                            <div class="personPicker_select">
                                <div class="row margin-clear">
                                    <div class="col-md-8">
                                        <div class="row ">
                                            <div class="col-md-6 referance_active">
                                                <div class="personPicker_item active_person" onclick="createPersonPickerParamsExtra(this,'1')">
                                                    <span>
                                                        <span>Номеров <span><b>1</b></span> | Взрослых <span><b>1</b></span>
                                                            | Детей <span><b>0</b></span>
                                                        </span>
                                                        <br>
                                                        <small class="new_small" style="font-size:14px;"><b>3</b>-разовое питание с
                                                            лечением</small>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 referance_active">
                                                <div class="personPicker_item active_person first_classPerson" onclick="createPersonPickerParamsExtra(this,'2'); ">
                                                    <span>
                                                        <span>Номеров <span><b>1</b></span> | Взрослых <span><b>2</b></span>
                                                            | Детей <span><b>0</b></span>
                                                        </span>
                                                        <br>
                                                        <small class="new_small" style="font-size:14px;"><b>3</b>-разовое питание с
                                                            лечением</small>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 referance_active">
                                                <div class="personPicker_item active_person" onclick="createPersonPickerParamsExtra(this,'3'); ">
                                                    <span>
                                                        <span>Номеров <span><b>1</b></span> | Взрослых <span><b>1</b></span>
                                                            | Детей <span><b>0</b></span>
                                                        </span>
                                                        <br>
                                                        <small class="new_small" style="font-size:14px;"><b>2</b>-разовое питание с
                                                            лечением</small>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 referance_active">
                                                <div class="personPicker_item active_person " onclick="createPersonPickerParamsExtra(this,'4'); ">
                                                    <span>
                                                        <span>Номеров <span><b>1</b></span> | Взрослых <span><b>2</b></span>
                                                            | Детей <span><b>0</b></span>
                                                        </span>
                                                        <br>
                                                        <small class="new_small" style="font-size:14px;"><b>2</b>-разовое питание с
                                                            лечением</small>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="personPicker_item personP_i_add" data-id="2">
                                            <span>Другие варианты</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>

                        <div class="mfp-content mfp-hide">
                            <div class="personPicker mfp-hide zoom-anim-dialog">
                                <div class="personPicker_count count1">
                                    <div class="personPicker_header">
                                        <div>
                                            Другие варианты
                                        </div>
                                        <button title="Close (Esc)" type="button" class="mfp-close">×</button>
                                    </div>
                                    <div class="personPicker_body row">
                                        <div class="col-md-6 personPicker_fields room_one_area hide" style="    border-left: 5px solid white;">
                                            <div class="text-uppercase" style="font-weight:bold;color: white;  padding: 4px;margin-bottom: 15px;"><span class="personPickerRoomCount"></span> - номер
                                                <div class="float-right">
                                                    <button class="personPickerRemoveRoom" type="button" style="margin-top: -8px;" onclick="personPickerRooms(this,'remove');">
                                                        Удалить номер ×
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="personPicker_area" style="width: 100%;">
                                                <span style="font-size:15px;font-weight: bold;"><i class="glyphicon glyphicon-user"></i>&nbsp;
                                                    Взрослые</span>
                                                <div class="personPicker_adult">
                                                    <div class="input-group person-row-params">
                                                        <span class="input-group-addon personPicker_input_addon personPicker_input_count_addon">1</span>
                                                        <select class="form-control person-type-food">
                                                            <option data-type-food="-FBT">3-разовое питание с лечением</option>
                                                            <option data-type-food="-HBT">2-разовое питание с лечением</option>
                                                            <option data-type-food="-FB">3-разовое питание без лечением</option>
                                                            <option data-type-food="-HB">2-разовое питание без лечением</option>
                                                        </select>
                                                        <span class="input-group-addon personPicker_input_addon">
                                                            <img src="frontend/images/icons/transparent.png" class="personPicker_close" alt="">
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="text-right personPicker_adult_add_button" style="width: 100%;margin-top:10px;">
                                                    <button type="button" class="sanatorium-button" style="display: inline-block;font-weight: 400;" onclick="personPicker(this,'add','adult');">
                                                        <span><img src="frontend/images/icons/plus.png" style="width: 16px;height: 16px;margin-right: 5px;vertical-align: middle" alt="">Добавить взрослого</span>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="personPicker_area personPicker_child_area">
                                                <span style="font-size:15px;font-weight: bold;"><i style="font-size: 12px" class="glyphicon glyphicon-user"></i>&nbsp;
                                                    Дети</span>
                                                <div class="personPicker_child">
                                                </div>
                                                <div class="text-right personPicker_adult_add_button" style="width: 100%;margin-top:10px;">
                                                    <button type="button" class="sanatorium-button" style="display: inline-block;font-weight: 400;" onclick="personPicker(this,'add','child');">
                                                        <span><img src="frontend/images/icons/plus.png" style="width: 16px;height: 16px;margin-right: 5px;vertical-align: middle" alt="">Добавить ребенка</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 personPicker_fields room_one_area">
                                            <div class="text-uppercase" style="font-weight:bold;color: white;padding: 4px;margin-bottom: 15px; "><span class="personPickerRoomCount">1</span> - номер
                                            </div>
                                            <div class="personPicker_area" style="width: 100%;">
                                                <div style="font-size:15px;font-weight: bold;"><i class="glyphicon glyphicon-user"></i>&nbsp;
                                                    Взрослые
                                                </div>
                                                <div class="personPicker_adult">
                                                    <div class="input-group person-row-params">
                                                        <span class="input-group-addon personPicker_input_addon personPicker_input_count_addon">1</span>
                                                        <select class="form-control person-type-food">
                                                            <option data-type-food="-FBT">3-разовое питание с лечением</option>
                                                            <option data-type-food="-HBT">2-разовое питание с лечением</option>
                                                            <option data-type-food="-FB">3-разовое питание без лечением</option>
                                                            <option data-type-food="-HB">2-разовое питание без лечением</option>
                                                        </select>
                                                        <span class="input-group-addon personPicker_input_addon">
                                                            <img src="frontend/images/icons/transparent.png" class="personPicker_close" alt="">
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="text-right personPicker_adult_add_button" style="width: 100%;margin-top:10px;">
                                                    <button type="button" class="sanatorium-button" style="display: inline-block;font-weight: 400;" onclick="personPicker(this,'add','adult');">
                                                        <span><img src="frontend/images/icons/plus.png" style="width: 16px;height: 16px;margin-right: 5px;vertical-align: middle" alt="">Добавить взрослого</span>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="personPicker_area personPicker_child_area">
                                                <span style="font-size:15px;font-weight: bold;"><i style="font-size: 12px" class="glyphicon glyphicon-user"></i>&nbsp;
                                                    Дети</span>
                                                <div class="personPicker_child">
                                                </div>
                                                <div class="text-right personPicker_adult_add_button" style="width: 100%;margin-top:10px;">
                                                    <button type="button" class="sanatorium-button" style="display: inline-block;font-weight: 400;" onclick="personPicker(this,'add','child');">
                                                        <span><img src="frontend/images/icons/plus.png" style="width: 16px;height: 16px;margin-right: 5px;vertical-align: middle" alt="">Добавить ребенка</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="personPickerNewRoom"></div>
                                        <div class="col-md-6 personPicker_room_add">
                                            <div>
                                                <button type="button" class="sanatorium-button-blue addNewRoomPersonPicker" style="margin:10px 0;" onclick="personPickerRooms(this,'add');">
                                                    <img src="frontend/images/icons/add_room.png" alt="">
                                                    <div>Добавить еще номер</div>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="personPicker_footer">
                                        <div class="col-md-12" style="text-align: right;padding: 5px;">
                                            <button type="button" class="sanatorium-red-button removeClassPerson" style="margin:10px 0;padding: 10px 18px;" onclick="createPersonPickerParams(this);">
                                                <span>Подтвердить</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="name-params">

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-1 width11">
                    <div class="form-group">
                        <input class="btn-choose-sanatorium  text-center submit_button sanatorium-red-button big sanatoruium_button_big" value="Найти" type="button" style="vertical-align: middle;height:55px;  margin: 1px;  width: 100%;">
                        <input type="hidden" name="sb" value="1">
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>