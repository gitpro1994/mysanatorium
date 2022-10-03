<div id="search-main-block" class="left-sidebar" style="padding:0  15px;">
    <div class="wraps_cont checked_opened">
        <h4 class="main-color bold wraps_cont-margin">Фильтровать санатории по городам</h4>
        <ul class="ul-style search-types-5 search-main-are-areas-treatment">
            <li>
                <input type="radio" name="couList" value="" checked="">
                <label for="all-country">{{ getCountryName(Session::get('informations')['couList']) }}</label>
            </li>
        </ul>
        <ul class="ul-style search-type-5 search-main-are-areas-treatment">

            @foreach(getCountryCities(Session::get('informations')['couList']) as $city)
            <li class="cityList">
                <input type="radio" id="{{ $city->id }}" name="cty_slct[]" value="{{ $city->id }}" data-city-id="{{ $city->id }}" {{ ($city->id==Session::get('informations')['cty_slct']) ? 'checked' : '' }} class="city-list">
                <label for="{{ $city->id }}">
                    {{$city->title}} <span class="number-country"> </span>
                </label>
            </li>
            @endforeach
        </ul>
    </div>

    <div class="trt-block wraps_cont
        ">
        <h4 class="main-color bold">Показания к лечению</h4>
        <ul class="ul-style search-type-1 search-main-are-areas-treatment">
            <li>
                <input type="checkbox" id="13" name="trt[]" value="13" data-trt-id="13" class="trt-list">
                <label for="13">
                    Заболевания опорно-двигательного аппарата <span class="number-trt"></span>
                </label>
            </li>
            <li>
                <input type="checkbox" id="14" name="trt[]" value="14" data-trt-id="14" class="trt-list">
                <label for="14">
                    Кожные заболевания <span class="number-trt"></span>
                </label>
            </li>
            <li>
                <input type="checkbox" id="16" name="trt[]" value="16" data-trt-id="16" class="trt-list">
                <label for="16">
                    Неврологические заболевания <span class="number-trt"></span>
                </label>
            </li>
            <li>
                <input type="checkbox" id="22" name="trt[]" value="22" data-trt-id="22" class="trt-list">
                <label for="22">
                    Урологические заболевания <span class="number-trt"></span>
                </label>
            </li>
            <li>
                <input type="checkbox" id="27" name="trt[]" value="27" data-trt-id="27" class="trt-list">
                <label for="27">
                    Болезни ЛОР-органов <span class="number-trt"></span>
                </label>
            </li>
            <li style="display:none;">
                <input type="checkbox" id="58" name="trt[]" value="58" data-trt-id="58" class="trt-list">
                <label for="58">
                    Гинекологические заболевания <span class="number-trt"></span>
                </label>
            </li>
            <li style="display:none;">
                <input type="checkbox" id="62" name="trt[]" value="62" data-trt-id="62" class="trt-list">
                <label for="62">
                    Заболевания костно-мышечной системы <span class="number-trt"></span>
                </label>
            </li>
            <li style="display:none;">
                <input type="checkbox" id="65" name="trt[]" value="65" data-trt-id="65" class="trt-list">
                <label for="65">
                    Болезни костно-мышечной системы и соединительной ткани <span class="number-trt"></span>
                </label>
            </li>
            <li style="display:none;">
                <input type="checkbox" id="67" name="trt[]" value="67" data-trt-id="67" class="trt-list">
                <label for="67">
                    Болезни периферической нервной системы <span class="number-trt"></span>
                </label>
            </li>
            <li style="display:none;">
                <input type="checkbox" id="17" name="trt[]" value="17" data-trt-id="17" class="trt-list">
                <label for="17">
                    Послеоперационные и посттравматические состояния <span class="number-trt"></span>
                </label>
            </li>
            <li style="display:none;">
                <input type="checkbox" id="59" name="trt[]" value="59" data-trt-id="59" class="trt-list">
                <label for="59">
                    Бесплодие <span class="number-trt"></span>
                </label>
            </li>
            <li style="display:none;">
                <input type="checkbox" id="70" name="trt[]" value="70" data-trt-id="70" class="trt-list">
                <label for="70">
                    Болезни костно-мышечной системы (опорно-двигательного аппарата) <span class="number-trt"></span>
                </label>
            </li>
            <li style="display:none;">
                <input type="checkbox" id="71" name="trt[]" value="71" data-trt-id="71" class="trt-list">
                <label for="71">
                    Болезни кожи и подкожной клетчатки <span class="number-trt"></span>
                </label>
            </li>
        </ul>
        <a href="javascript:void(0);" onclick="show_more(this,'search-type-1','show');" class="sh_all" data-original-title="" title="">Показать все</a>
    </div>

    <div class="mbs-block wraps_cont">
        <h4 class="main-color bold wraps_cont-margin">Лечебные базы</h4>
        <ul class="ul-style search-type-2 ">
            <li>
                <input type="checkbox" id="336" name="mbs[]" value="336" data-mbs-id="336" class="mbs-list">
                <label for="336">
                    Электросонтерапия <span class="number-mbs"> </span>
                </label>
            </li>
            <li>
                <input type="checkbox" id="273" name="mbs[]" value="273" data-mbs-id="273" class="mbs-list">
                <label for="273">
                    Иппотерапия <span class="number-mbs"> </span>
                </label>
            </li>
            <li>
                <input type="checkbox" id="270" name="mbs[]" value="270" data-mbs-id="270" class="mbs-list">
                <label for="270">
                    Пляжные процедуры <span class="number-mbs"> </span>
                </label>
            </li>
            <li>
                <input type="checkbox" id="231" name="mbs[]" value="231" data-mbs-id="231" class="mbs-list">
                <label for="231">
                    Диетотерапия <span class="number-mbs"> </span>
                </label>
            </li>
            <li>
                <input type="checkbox" id="218" name="mbs[]" value="218" data-mbs-id="218" class="mbs-list">
                <label for="218">
                    Диагностика <span class="number-mbs"> </span>
                </label>
            </li>
            <li style="display:none;">
                <input type="checkbox" id="214" name="mbs[]" value="214" data-mbs-id="214" class="mbs-list">
                <label for="214">
                    Собственный бальнеоцентр <span class="number-mbs"> </span>
                </label>
            </li>
            <li style="display:none;">
                <input type="checkbox" id="210" name="mbs[]" value="210" data-mbs-id="210" class="mbs-list">
                <label for="210">
                    Лечение газом <span class="number-mbs"> </span>
                </label>
            </li>
            <li style="display:none;">
                <input type="checkbox" id="112" name="mbs[]" value="112" data-mbs-id="112" class="mbs-list">
                <label for="112">
                    Физиотерапия <span class="number-mbs"> </span>
                </label>
            </li>
            <li style="display:none;">
                <input type="checkbox" id="110" name="mbs[]" value="110" data-mbs-id="110" class="mbs-list">
                <label for="110">
                    Электролечение <span class="number-mbs"> </span>
                </label>
            </li>
            <li style="display:none;">
                <input type="checkbox" id="109" name="mbs[]" value="109" data-mbs-id="109" class="mbs-list">
                <label for="109">
                    Грязелечение <span class="number-mbs"> </span>
                </label>
            </li>
            <li style="display:none;">
                <input type="checkbox" id="108" name="mbs[]" value="108" data-mbs-id="108" class="mbs-list">
                <label for="108">
                    Водолечение <span class="number-mbs"> </span>
                </label>
            </li>
        </ul>
        <a href="javascript:void(0);" onclick="show_more(this,'search-type-2','show');" class="sh_all" data-original-title="" title="">Показать все</a>
    </div>
    <div class="star-block wraps_cont">
        <h4 class="main-color bold wraps_cont-margin">Количество звезд</h4>
        <ul class="ul-style search-type-3">
            <li>
                <input type="checkbox" id="star_5" name="stars[]" value="5" data-stars-id="5" class="stars-list">
                <label for="star_5">
                    <strong class="text-danger checkbox_stars">&#9733;</strong>
                    <strong class="text-danger checkbox_stars">&#9733;</strong>
                    <strong class="text-danger checkbox_stars">&#9733;</strong>
                    <strong class="text-danger checkbox_stars">&#9733;</strong>
                    <strong class="text-danger checkbox_stars">&#9733;</strong>
                </label>
            </li>
            <li>
                <input type="checkbox" id="star_4" name="stars[]" value="4" data-stars-id="4" class="stars-list">
                <label for="star_4" class="star_search">
                    <strong class="text-danger checkbox_stars">&#9733;</strong>
                    <strong class="text-danger checkbox_stars">&#9733;</strong>
                    <strong class="text-danger checkbox_stars">&#9733;</strong>
                    <strong class="text-danger checkbox_stars">&#9733;</strong>
                </label>
            </li>
            <li>
                <input type="checkbox" id="star_3" name="stars[]" value="3" data-stars-id="3" class="stars-list">
                <label for="star_3" class="star_search">
                    <strong class="text-danger checkbox_stars">&#9733;</strong>
                    <strong class="text-danger checkbox_stars">&#9733;</strong>
                    <strong class="text-danger checkbox_stars">&#9733;</strong>
                </label>
            </li>
            <li>
                <input type="checkbox" id="star_2" name="stars[]" value="2" data-stars-id="2" class="stars-list">
                <label for="star_2" class="star_search">
                    <strong class="text-danger checkbox_stars">&#9733;</strong>
                    <strong class="text-danger checkbox_stars">&#9733;</strong>
                </label>
            </li>
        </ul>
    </div>

    <div class="fcl-block wraps_cont wraps_cont-padding">
        <h4 class="main-color bold wraps_cont-margin">Удобства</h4>
        <ul class="ul-style search-type-4">
            <li>
                <input type="checkbox" id="extra_166" name="fcl[]" value="166" data-fcl-id="166" class="fcl-list">
                <label for="extra_166">
                    Парковка <span class="number-fcl"> </span>
                </label>
            </li>
            <li>
                <input type="checkbox" id="extra_167" name="fcl[]" value="167" data-fcl-id="167" class="fcl-list">
                <label for="extra_167">
                    Бассейн <span class="number-fcl"> </span>
                </label>
            </li>
            <li>
                <input type="checkbox" id="extra_168" name="fcl[]" value="168" data-fcl-id="168" class="fcl-list">
                <label for="extra_168">
                    Фитнесс <span class="number-fcl"> </span>
                </label>
            </li>
            <li>
                <input type="checkbox" id="extra_169" name="fcl[]" value="169" data-fcl-id="169" class="fcl-list">
                <label for="extra_169">
                    Термальный бассейн <span class="number-fcl"> </span>
                </label>
            </li>
            <li>
                <input type="checkbox" id="extra_170" name="fcl[]" value="170" data-fcl-id="170" class="fcl-list">
                <label for="extra_170">
                    Присмотр за детьми <span class="number-fcl"> </span>
                </label>
            </li>
            <li style="display:none;">
                <input type="checkbox" id="extra_171" name="fcl[]" value="171" data-fcl-id="171" class="fcl-list">
                <label for="extra_171">
                    Оборудование для инвалидов <span class="number-fcl"> </span>
                </label>
            </li>
            <li style="display:none;">
                <input type="checkbox" id="extra_173" name="fcl[]" value="173" data-fcl-id="173" class="fcl-list">
                <label for="extra_173">
                    Диетические блюда <span class="number-fcl"> </span>
                </label>
            </li>
            <li style="display:none;">
                <input type="checkbox" id="extra_174" name="fcl[]" value="174" data-fcl-id="174" class="fcl-list">
                <label for="extra_174">
                    Сауна <span class="number-fcl"> </span>
                </label>
            </li>
            <li style="display:none;">
                <input type="checkbox" id="extra_175" name="fcl[]" value="175" data-fcl-id="175" class="fcl-list">
                <label for="extra_175">
                    Wi-Fi <span class="number-fcl"> </span>
                </label>
            </li>
            <li style="display:none;">
                <input type="checkbox" id="extra_178" name="fcl[]" value="178" data-fcl-id="178" class="fcl-list">
                <label for="extra_178">
                    Диетические блюда <span class="number-fcl"> </span>
                </label>
            </li>
        </ul>
        <a href="javascript:void(0);" onclick="show_more(this,'search-type-4','show');" class="sh_all" data-original-title="" title="">
            Показать все</a>
    </div>
    <input type="hidden" name="fTo" id="fTo" value="">
    <input type="hidden" name="sb" id="sb" value="">

</div>

@section('script-code')
<script>
    $('.city-list').click(function() {
        alert("Salam");
        if ($('.city-list').is(':checked')) {
            var selected_city = $(this).val();
            $.ajax({
                url: "{{url('sanatoriums/gss')}}",
                method: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "selected_city": selected_city
                },
                success: function(data) {
                    $('.main-content-selected-sanatoriums').html(data);
                }
            })
        }
    });
</script>
@endsection