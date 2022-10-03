@extends('admin.layouts.master')
@section('page-title', 'Wizart')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="float-start">
            <h3>{{ $sanatorium->name }}
                <input type="hidden" value="{{ $sanatorium->id }}" name="sanatorium_id" id="sanatorium_id">
            </h3>
        </div>
    </div>
    <div class="card-body">

        <form action="{{ route('admin.sanatoriums.wizarts.wizart-save', ['sanatorium_id'=>$sanatorium->id]) }}" method="post" id="wizart-save">
            @csrf
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Sanatoriyanın istifadə etdiyi qiymət cədvəli növünü seçin</label>
                <div class="col-sm-4">
                    <select name="price_table_kind" class="form-control" id="price_table_kind">
                        <option disabled>Seçin</option>
                        <option value="1" {{ ($sanatorium->getSws->first()->price_table_kind==1) ? 'selected' : '' }}>Günlük qiymət dəcvəli</option>
                        <option value="2" {{ ($sanatorium->getSws->first()->price_table_kind==2) ? 'selected' : '' }}>Həftəlik qiymət dəcvəli</option>
                        <option value="3" {{ ($sanatorium->getSws->first()->price_table_kind==3) ? 'selected' : '' }}>İstəyəbağlı qiymət dəcvəli</option>
                    </select>
                </div>
            </div>

            <div class="row" id="table-optional-properties">

            </div>

            <div class="mt-2">
                <button onclick="confirm('Qiymət cədvəli dəyişdirilən zaman köhnə cədvəldə olan qiymətlər silinəcək. Davam edilsin ?')" type="submit" class="btn btn-sm btn-info save-price-table-properties">
                    Yadda saxla
                </button>
            </div>
        </form>

        <div class="mt-4 table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th style="width: 20%;">Otaq</th>
                        <th style="width: 10%;">Otaq sayı</th>
                        <th style="width: 10%;">Ümumi nəfər sayı</th>
                        <th style="width: 10%;">Minimum nəfər sayı</th>
                        <th style="width: 10%;">Böyük nəfər sayı</th>
                        <th style="width: 10%;">Uşaq sayı</th>
                        <th style="width: 15%;">Əlavə oluna biləcək yataq sayı</th>
                        <th style="width: 15%;">Uşaq/Böyük üçün</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sanatorium->getSws as $data)
                    <tr>
                        <td>
                            {{ getRoomName($data->room_kinds_id) }}
                        </td>
                        <td>
                            <select name="room_count[]" class="form-control room_count">
                                <option disabled>Seçin</option>
                                @for($value=0;$value<=50;$value++) <option data-id="{{ $data->room_kinds_id }}" data-id="{{ $data->room_kinds_id }}" value="{{ $value }}" {{ ($data->room_count==$value) ? 'selected' : '' }}>{{ $value }}</option>
                                    @endfor
                            </select>
                        </td>
                        <td>
                            <select name="general_human_count[]" class="form-control general_human_count">
                                <option disabled>Seçin</option>
                                @for($value=0;$value<=50;$value++) <option data-id="{{ $data->room_kinds_id }}" value="{{ $value }}" {{ ($data->general_human_count==$value) ? 'selected' : '' }}>{{ $value }}</option>
                                    @endfor
                            </select>
                        </td>
                        <td>
                            <select name="minimum_human_count[]" class="form-control minimum_human_count">
                                <option disabled>Seçin</option>
                                @for($value=0;$value<=50;$value++) <option data-id="{{ $data->room_kinds_id }}" value="{{ $value }}" {{ ($data->minimum_human_count==$value) ? 'selected' : '' }}>{{ $value }}</option>
                                    @endfor
                            </select>
                        </td>
                        <td>
                            <select name="older_count[]" class="form-control older_count">
                                <option disabled>Seçin</option>
                                @for($value=0;$value<=50;$value++) <option data-id="{{ $data->room_kinds_id }}" value="{{ $value }}" {{ ($data->older_count==$value) ? 'selected' : '' }}>{{ $value }}</option>
                                    @endfor
                            </select>
                        </td>
                        <td>
                            <select name="child_count[]" class="form-control child_count">
                                <option disabled>Seçin</option>
                                @for($value=0;$value<=50;$value++) <option data-id="{{ $data->room_kinds_id }}" value="{{ $value }}" {{ ($data->child_count==$value) ? 'selected' : '' }}>{{ $value }}</option>
                                    @endfor
                            </select>
                        </td>
                        <td>
                            <select name="possible_additional_beds[]" class="form-control possible_additional_beds">
                                <option disabled>Seçin</option>
                                @for($value=0;$value<=50;$value++) <option data-id="{{ $data->room_kinds_id }}" value="{{ $value }}" {{ ($data->possible_additional_beds==$value) ? 'selected' : '' }}>{{ $value }}</option>
                                    @endfor
                            </select>
                        </td>
                        <td>
                            <select name="for[]" class="form-control for">
                                <option disabled>Seçin</option>
                                <option data-id="{{ $data->room_kinds_id }}" value="0" {{ $data->for==0 ? 'selected' : '' }}>Uşaq üçün</option>
                                <option data-id="{{ $data->room_kinds_id }}" value="1" {{ $data->for==1 ? 'selected' : '' }}>Böyük üçün</option>
                            </select>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

</div>
</div>

@endsection

@section('scripts')
<script>
    $('#price_table_kind').change(function() {
        var value = $(this).val();
        if (value == 2 || value == 3) {
            $('#table-optional-properties').html('<label class="col-sm-2 col-form-label">Cədvəl yaratmaq üçün gün aralığını seçin</label> <div class="col-md-6" id="range-div"> <section id="append_html"> <div class="row" id="range-content"> <div class="col-md-4"> <input type="text" class="form-control" name="min_day[]" id="min_day"> </div> <div class="col-md-4"> <input type="text" class="form-control" name="max_day[]" id="max_day"> </div> <div class="col-md-4"> <button type="button" class="btn btn-info add-new-range"> <span><i class="fas fa-plus"></i></span> </button> </div> </div> </section> </div>');
        } else {
            $('#table-optional-properties').html('');
        }
    })

    $('body').on("click", ".add-new-range", function() {
        $('#append_html').append('<section class="row mt-2" id="range-content"> <div class="col-md-4"> <input type="text" class="form-control" name="min_day[]" id=""> </div> <div class="col-md-4"> <input type="text" class="form-control" name="max_day[]" id=""> </div> <div class="col-md-4"> <button type="button" class="btn btn-danger remove-range"> <span><i class="fas fa-times"></i></span> </button> </div> </section>')
    })

    $('body').on("click", ".remove-range", function(e) {
        e.preventDefault();
        $(this).closest('section').remove();
    })


    $('.room_count').change(function() {
        var sanatorium_id = $('#sanatorium_id').val();
        var room_kinds_id = $(this).find(':selected').attr('data-id');
        var value = $(this).val();
        $.ajax({
            url: "{{ url('admin/sanatoriums/wizarts/change_room_count') }}" + "/" + sanatorium_id + "/" + room_kinds_id + "/" + value,
            type: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                "sanatorium_id": sanatorium_id,
                "room_kinds_id": room_kinds_id,
                "value": value
            },
            success: function(response) {
                console.log(response);
            }

        })
    })

    $('.general_human_count').change(function() {
        var sanatorium_id = $('#sanatorium_id').val();
        var room_kinds_id = $(this).find(':selected').attr('data-id');
        var value = $(this).val();
        $.ajax({
            url: "{{ url('admin/sanatoriums/wizarts/change_general_human_count') }}" + "/" + sanatorium_id + "/" + room_kinds_id + "/" + value,
            type: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                "sanatorium_id": sanatorium_id,
                "room_kinds_id": room_kinds_id,
                "value": value
            },
            success: function(response) {
                console.log(response);
            }

        })
    })

    $('.minimum_human_count').change(function() {
        var sanatorium_id = $('#sanatorium_id').val();
        var room_kinds_id = $(this).find(':selected').attr('data-id');
        var value = $(this).val();
        $.ajax({
            url: "{{ url('admin/sanatoriums/wizarts/change_minimum_human_count') }}" + "/" + sanatorium_id + "/" + room_kinds_id + "/" + value,
            type: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                "sanatorium_id": sanatorium_id,
                "room_kinds_id": room_kinds_id,
                "value": value
            },
            success: function(response) {
                console.log(response);
            }

        })
    })

    $('.older_count').change(function() {
        var sanatorium_id = $('#sanatorium_id').val();
        var room_kinds_id = $(this).find(':selected').attr('data-id');
        var value = $(this).val();
        $.ajax({
            url: "{{ url('admin/sanatoriums/wizarts/change_older_count') }}" + "/" + sanatorium_id + "/" + room_kinds_id + "/" + value,
            type: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                "sanatorium_id": sanatorium_id,
                "room_kinds_id": room_kinds_id,
                "value": value
            },
            success: function(response) {
                console.log(response);
            }

        })
    })

    $('.child_count').change(function() {
        var sanatorium_id = $('#sanatorium_id').val();
        var room_kinds_id = $(this).find(':selected').attr('data-id');
        var value = $(this).val();
        $.ajax({
            url: "{{ url('admin/sanatoriums/wizarts/change_child_count') }}" + "/" + sanatorium_id + "/" + room_kinds_id + "/" + value,
            type: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                "sanatorium_id": sanatorium_id,
                "room_kinds_id": room_kinds_id,
                "value": value
            },
            success: function(response) {
                console.log(response);
            }

        })
    })

    $('.possible_additional_beds').change(function() {
        var sanatorium_id = $('#sanatorium_id').val();
        var room_kinds_id = $(this).find(':selected').attr('data-id');
        var value = $(this).val();
        $.ajax({
            url: "{{ url('admin/sanatoriums/wizarts/change_possible_additional_beds') }}" + "/" + sanatorium_id + "/" + room_kinds_id + "/" + value,
            type: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                "sanatorium_id": sanatorium_id,
                "room_kinds_id": room_kinds_id,
                "value": value
            },
            success: function(response) {
                console.log(response);
            }

        })
    })

    $('.for').change(function() {
        var sanatorium_id = $('#sanatorium_id').val();
        var room_kinds_id = $(this).find(':selected').attr('data-id');
        var value = $(this).val();
        $.ajax({
            url: "{{ url('admin/sanatoriums/wizarts/change_for_beds') }}" + "/" + sanatorium_id + "/" + room_kinds_id + "/" + value,
            type: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                "sanatorium_id": sanatorium_id,
                "room_kinds_id": room_kinds_id,
                "value": value
            },
            success: function(response) {
                console.log(response);
            }

        })
    })

    $('.new-optional').on("click", function(e) {
        e.preventDefault();
        $('.optional-content').append('<section class="row mt-2"><div class="col-3"> <select name="start_day[]" class="form-control" id=""> @for($i=1;$i<=31;$i++) <option value="{{ $i }}">{{ $i }}</option> @endfor <option value="after">Sonra</option> </select> </div> <div class="col-3"> <select name="end_day[]" class="form-control" id=""> @for($i=1;$i<=31;$i++) <option value="{{ $i }}">{{ $i }}</option> @endfor <option value="after">Sonra</option> </select> </div><div class="col-auto"> <button type="button" class="remove-optional btn btn-outline-danger waves-effect waves-light"> <span><i class="fas fa-times"></i></span> Sil </button> </div> </section>');
    });

    $('body').on("click", ".remove-optional", function(e) {
        e.preventDefault();
        $(this).closest('section').remove();
    })
</script>
@endsection