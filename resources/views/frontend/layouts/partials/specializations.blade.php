<section id="specializations">
    <div class="container">
        <div class="col-md-12">
            <div class="row text-center">
                <h2 class="blue text-bold text36" style="font-size: 36px; font-weight: normal">Найти санаторий <span class="text-lightblue">по следующим специализациям:</span></h2>
            </div>
            <div class="row">
                @foreach($treatment_directions as $direction)
                <div class="col-md-3 col-sm-6 col-xs-12 extensive clear-padding">
                    <div class="specializations-div margin-bottom-20">
                        <a class="link-sanatorium" href="{{ route('treatment_specialization', ['treatment_id'=>$direction->id]) }}">
                            <div class="container-areas-treatment" style="height: 175px; overflow:hidden;position: relative;">
                                <img src="{{ asset('backend/images/td').'/'. $direction->cover}}" />
                                <div class="spec-text">
                                    <h3 class="area_treatment">{{ $direction->name }}</h3>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>