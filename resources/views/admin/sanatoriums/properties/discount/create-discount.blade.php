@extends('admin.layouts.master')
@section('page-title', 'Yeni endirim paketi')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="float-start">
            <h3>{{ $sanatorium->name }}</h3>
        </div>
        <div class="float-end">
            <a href="{{ URL::previous() }}">
                <button class="btn btn-sm btn-danger">
                    <span>
                        <i class="fas fa-arrow-left"></i>
                    </span>
                    Geri
                </button>
            </a>
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.sanatoriums.discount-options.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <input type="hidden" value="{{ $sanatorium->id }}" name="sanatoriums_id" id="">
                <label for="discounts_id" class="col-4 col-xl-3 col-form-label">Endirim paketi seçin</label>
                <div class="col-8 col-xl-8">
                    <select class="form-control" name="discounts_id" id="discounts_id">
                        <option disabled selected>Siyahıdan seçin</option>
                        @foreach($discounts as $discount)
                        <option value="{{ $discount->id }}">{{ $discount->discount_name }}</option>
                        @endforeach
                    </select>
                    @error('discounts_id')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="mb-0">
                <div class="row discount-content"></div>
            </div>
            <div class="justify-content-end row mt-4">
                <div class="col-12 col-xl-12">
                    <button type="submit" class="btn btn-info waves-effect waves-light">Daxil et</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')

<script>
    $(document).ready(function() {

        $('#discounts_id').change(function(e) {
            e.preventDefault();
            var discount_id = $(this).val();
            $.ajax({
                url: "{{ url('admin/sanatoriums/getDiscountOption') }}" + "/" + discount_id,
                type: "GET",
                data: {
                    "discount_id": discount_id
                },
                success: function(data) {
                    $('.discount-content').html(data);
                }
            });
        })


        $('body').on('click', '.radio_number_of_person', function() {
            if ($('.radio_number_of_person').is(':checked')) {
                if ($(this).val() == 0) {
                    $('.number_of_person').hide();
                } else {
                    $('.number_of_person').show();
                }
            }
        });

        $('body').on("click", ".new-general-discount", function(e) {
            e.preventDefault();
            $('.general-discount').append('<section class="row" id="new-added-general-discount"> <div class="col-4 mt-2"> <select class="form-control" name="room_kinds_id[]"> <option disabled>Siyahıdan seçin</option> <option value="all">Bütün otaqlar</option> @foreach($room_kinds as $kind) <option value="{{ $kind->id }}">{{ $kind->name }}</option> @endforeach </select> </div> <div class="col-4 mt-2"> <div class="input-group"> <div class="input-group-text">%</div> <input type="text" name="discount[]" class="form-control" id="discount" placeholder="Endirim faizi daxil edin"> </div> </div> <div class="col-auto mt-2"> <button type="submit" class="remove-general-discount btn btn-outline-danger waves-effect waves-light"> <span><i class="fas fa-times"></i></span> Sil </button> </div> </section>');

        });

        $('body').on("click", ".remove-general-discount", function(e) {
            e.preventDefault();
            $(this).closest('section').remove();
        })

        $('body').on("click", ".new-before-reserv-day-discount", function(e) {
            e.preventDefault();
            $('.before-day-discount').append('<section class="row mt-2"> <div class="col-md-4"> <div class="col-12"> <label for="before_reserv_day_start">Gün daxil edin</label> <input type="text" name="before_reserv_day_start[]" class="form-control" id="before_reserv_day_start"> </div> </div> <div class="col-md-4"> <div class="col-12"> <label for="before_reserv_day_end">Gün daxil edin</label> <input type="text" name="before_reserv_day_end[]" class="form-control" id="before_reserv_day_end"> </div> </div> </div> <div class="row mt-4"> <div class="col-4"> <select class="form-control" name="room_kinds_id[]"> <option disabled>Siyahıdan seçin</option> <option value="all">Bütün otaqlar</option> @foreach($room_kinds as $kind) <option value="{{ $kind->id }}">{{ $kind->name }}</option> @endforeach</select> </div> <div class="col-4"> <div class="input-group"> <div class="input-group-text">%</div> <input type="text" name="discount[]" class="form-control" id="discount" placeholder="Endirim faizi daxil edin"> </div> </div> <div class="col-auto"> <button type="button" class="remove-before-reserv-day-discount btn btn-outline-danger waves-effect waves-light"> <span><i class="fas fa-times"></i></span> Sil </button> </div> </section>');

        });

        $('body').on("click", ".remove-before-reserv-day-discount", function(e) {
            e.preventDefault();
            $(this).closest('section').remove();
        })

        $('body').on("click", ".new-lie-discount", function(e) {
            e.preventDefault();
            $('.lie-discount').append('<section class="row mt-2"> <div class="col-4"> <select class="form-control" name="room_kinds_id[]"> <option disabled>Siyahıdan seçin</option> <option value="all">Bütün otaqlar</option>@foreach($room_kinds as $kind) <option value="{{ $kind->id }}">{{ $kind->name }}</option> @endforeach</select> </div> <div class="col-4"> <div class="input-group"> <div class="input-group-text">%</div> <input type="text" name="discount[]" class="form-control" id="discount" placeholder="Endirim faizi daxil edin"> </div> </div> <div class="col-auto"> <button type="button" class="remove-lie-discount btn btn-outline-danger waves-effect waves-light"> <span><i class="fas fa-times"></i></span> Sil </button> </div> </section>');

        });

        $('body').on("click", ".remove-lie-discount", function(e) {
            e.preventDefault();
            $(this).closest('section').remove();
        });

        $('body').on("click", ".new-reserv-discount", function(e) {
            e.preventDefault();
            $('.reserv-discount').append('<section class="row mt-4"> <div class="col-3"> <label for="min_night">Minimum gecə</label> <input type="text" name="min_night" class="form-control" id="min_night"> </div> <div class="col-3"> <label for="max_night">Maksimum gecə</label> <input type="text" name="max_night" class="form-control" id="max_night"> </div> </div> <div class="row mt-4"> <div class="col-4"> <select class="form-control" name="room_kinds_id[]"> <option disabled>Siyahıdan seçin</option> <option value="all">Bütün otaqlar</option>@foreach($room_kinds as $kind) <option value="{{ $kind->id }}">{{ $kind->name }}</option> @endforeach</select> </div> <div class="col-4"> <div class="input-group"> <div class="input-group-text">%</div> <input type="text" name="discount[]" class="form-control" id="discount" placeholder="Endirim faizi daxil edin"> </div> </div> <div class="col-auto"> <button type="button" class="remove-reserv-discount btn btn-outline-danger waves-effect waves-light"> <span><i class="fas fa-times"></i></span> Sil </button> </div> </section>');

        });

        $('body').on("click", ".remove-reserv-discount", function(e) {
            e.preventDefault();
            $(this).closest('section').remove();
        });

        $("#finish_date").datepicker({
            onSelect: function() {
                $(this).change();
                console.log("Changed");
            }
        });

    });
</script>

@endsection