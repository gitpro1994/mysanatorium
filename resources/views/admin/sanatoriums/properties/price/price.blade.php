@extends('admin.layouts.master')
@section('page-title', 'Qiymətlər')
@section('styles')
<style>
    #success {
        height: 15px;
        width: 15px;
        background-color: green;
    }

    #danger {
        height: 15px;
        width: 15px;
        background-color: red;
    }

    #primary {
        height: 15px;
        width: 15px;
        background-color: blue;
    }

    .menu-item {
        font-weight: 500;
    }

    .table-body {
        background-color: #f1f1f1;
    }

    #price_input_red {
        background-color: #ff8c8c;
        color: white;
    }
</style>
@endsection
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-12">
                        @if(session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                        @endif
                    </div>
                    <div class="col-md-12">
                        <div class="float-start">
                            <h4><strong>{{ $sanatorium->anme }}</strong></h4>
                            <input type="hidden" value="{{ $sanatorium['id'] }}" name="sanatorium_id" id="sanatorium_id">
                            <h5>{{ get_sanatorium_price_kind($sanatorium->id) }}</h5>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-{{ $sanatorium->getSws->first()['price_table_kind']==1 ? '6' : '3' }}">
                        <div class="mt-2">
                            <label for="">Otaq seçin</label>
                            <select name="room_id" class="form-control" id="room_id">
                                @foreach($sanatorium->getSrks as $sanatorium_room)
                                <option value="{{ $sanatorium_room->room_kinds_id }}">{{ getRoomName($sanatorium_room->room_kinds_id) }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    @if($sanatorium->getSws->first()['price_table_kind']!=1)
                    <div class="col-md-3">
                        <div class="mt-2">
                            <label for="">Cədvəl seçin</label>
                            <select name="optional" class="form-control" id="optional">
                                <option disabled selected>Cədvəl seçin</option>
                                @foreach($sanatorium->getWizartOptional as $optional)
                                <option value="{{ $optional->min_day.'-'.$optional->max_day }}">{{ $optional->min_day.'-'.$optional->max_day }} günlük</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    @endif
                    <div class="col-md-6 float-end">
                        <div class="row mt-3">
                            <div class="col-md-4">
                                Bron üçün uyğundur <div id="success"></div>
                            </div>
                            <div class="col-md-4">
                                Bron üçün uyğun deyil <div id="danger"></div>
                            </div>
                            <div class="col-md-4">
                                Otaq yoxdur <div id="primary"></div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="mt-2">
                            <label for="">Tarix seçin</label>
                            <input class="form-control" id="start_date" type="date" required="" name="start_date">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mt-2">
                            <label for="">Tarix seçin</label>
                            <input class="form-control" id="end_date" type="date" required="" name="end_date">
                        </div>
                    </div>
                </div>
                <div class="mt-2">
                    <button class="btn btn-primary get-calendar">Seç</button>
                </div>
            </div>
            <div class="card-body">

            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    $(document).ready(function() {

        $('.get-calendar').click(function(e) {
            e.preventDefault();
            var sanatorium_id = $('#sanatorium_id').val();
            var optional = $('#optional').val();
            var room_id = $('#room_id').val();
            var start_date = $('#start_date').val();
            var end_date = $('#end_date').val();
            $.ajax({
                url: "{{ url('admin/sanatoriums/get-calendar') }}" + "/" + sanatorium_id,
                method: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "room_id": room_id,
                    "start_date": start_date,
                    "end_date": end_date,
                    "optional": optional,
                },
                success: function(data) {
                    $('.card-body').html(data);
                }
            });
        });

        $(document).on("click", ".save-price", function() {
            var value = $('#room_price').find(':selected').val();
            var price = $('#price').val();
            var package = $('#package').val();
            var start_date = $('#price_start_date').val();
            var end_date = $('#price_end_date').val();
            var sanatorium_id = $('#sanatorium_id').val();
            var room_id = $('#room_id').val();
            var selected = [];
            $('#price_checkboxes input:checked').each(function() {
                selected.push($(this).attr('value'));
            });

            $.ajax({
                url: "{{ url('admin/sanatoriums/save-price') }}",
                method: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "room_id": room_id,
                    "sanatorium_id": sanatorium_id,
                    "value": value,
                    "price": price,
                    "package": package,
                    "date_of_price": selected,
                    "start_date": start_date,
                    "end_date": end_date,
                }

            })
            $("." + value).each(function() {
                $(this).find('input').val(price);
            })
            var price = $('#price').val(0);


        })


        $(document).on("click", ".save-special-price", function() {
            var value = $('#room_price').find(':selected').val();
            var special_price = $('#special_price').val();
            var start_date = $('#special_price_start_date').val();
            var sanatorium_id = $('#sanatorium_id').val();
            var room_id = $('#room_id').val();
            var package = $('#package').val();
            $.ajax({
                url: "{{ url('admin/sanatoriums/save-special-price') }}",
                method: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "room_id": room_id,
                    "sanatorium_id": sanatorium_id,
                    "package": package,
                    "value": value,
                    "special_price": special_price,
                    "start_date": start_date,
                }

            })

            var price = $('#price').val(0);


        })

    });
</script>
@endsection