<section id="country-list">
    <div class="container-fluid">
        <div class="row text-center">
            <div class="blue text-bold text36">Найти санатории<span class="text-lightblue"> на наиболее востребованных курортах</span>
            </div>
        </div>
        <div class="row">
            @foreach($countries as $country)
            <div class="country_block col-md-4 col-sm-4 col-xs-12">
                <div class="country-div">
                    <img src="{{ asset('backend/images/cover').'/'.$country->cover }}">
                    <div class="spec-text">
                        <h3 class="country_name_body">{{ $country->title }}</h3>
                    </div>
                    <div class="country-cities">
                        @foreach($country->getCities as $city)
                        <a class="text-white city_location" href="{{ route('city_sanatoriums', ['country_slug'=>$country->slug,'city_slug'=>$city->slug]) }}">
                            <h3 class="city">
                                {{ $city->title }}
                            </h3>
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>