@extends('admin.layouts.master')
@section('page-title', 'Yeni sanatoriya')
@section('content')
<div class="card">
    <div class="card-header">
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
        <form action="{{ route('admin.sanatoriums.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <label for="name" class="col-4 col-xl-3 col-form-label">Sanatoriya adı</label>
                <div class="col-8 col-xl-9">
                    <input type="text" name="name" class="form-control" id="name" placeholder="sanatoriya adını daxil edin">
                    @error('name')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="search_title" class="col-4 col-xl-3 col-form-label">Axtarış adı</label>
                <div class="col-8 col-xl-9">
                    <input type="text" name="search_title" class="form-control" id="search_title" placeholder="Axtarış adını daxil edin">
                    @error('search_title')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="meta_title" class="col-4 col-xl-3 col-form-label">Meta başlıq</label>
                <div class="col-8 col-xl-9">
                    <input type="text" name="meta_title" class="form-control" id="meta_title" placeholder="Meta başlıq">
                    @error('meta_title')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="meta_description" class="col-4 col-xl-3 col-form-label">Meta açıqlama</label>
                <div class="col-8 col-xl-9">
                    <textarea name="meta_description" id="meta_description" class="form-control" cols="30" rows="2"></textarea>
                    @error('meta_description')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="meta_keywords" class="col-4 col-xl-3 col-form-label">Açar sözlər</label>
                <div class="col-8 col-xl-9">
                    <textarea name="meta_keywords" id="meta_keywords" cols="30" class="form-control" rows="2"></textarea>
                    @error('meta_keywords')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="meta_H1" class="col-4 col-xl-3 col-form-label">Meta H1</label>
                <div class="col-8 col-xl-9">
                    <input type="text" name="meta_H1" class="form-control" id="meta_H1" placeholder="Səhifə başlığı">
                    @error('meta_H1')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="slug" class="col-4 col-xl-3 col-form-label">Slug</label>
                <div class="col-8 col-xl-9">
                    <input type="text" name="slug" class="form-control" id="slug" placeholder="slug">
                    @error('slug')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="address" class="col-4 col-xl-3 col-form-label">Ünvan</label>
                <div class="col-8 col-xl-9">
                    <input type="text" name="address" class="form-control" id="address" placeholder="Ünvan daxil edin">
                    @error('address')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="currency_id" class="col-4 col-xl-3 col-form-label">Valyuta</label>
                <div class="col-8 col-xl-9">
                    <select name="currency_id" class="form-control" id="currency_id">
                        @foreach($currencies as $currency)
                        <option value="{{ $currency->id }}">{{ $currency->code }}</option>
                        @endforeach
                    </select>
                    @error('currency_id')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="main_image" class="col-4 col-xl-3 col-form-label">Əsas şəkil</label>
                <div class="col-8 col-xl-9">
                    <input type="file" id="example-fileinput" name="main_image" class="form-control">
                    @error('main_image')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="second_image" class="col-4 col-xl-3 col-form-label">Əlavə şəkil</label>
                <div class="col-8 col-xl-9">
                    <input type="file" id="example-fileinput" name="second_image" class="form-control">
                    @error('second_image')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>


            <div class="row mb-3">
                <label for="youtube_video_link" class="col-4 col-xl-3 col-form-label">Youtube video link</label>
                <div class="col-8 col-xl-9">
                    <input type="url" name="youtube_video_link" class="form-control">
                    @error('youtube_video_link')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="youtube_image" class="col-4 col-xl-3 col-form-label">Youtube şəkli</label>
                <div class="col-8 col-xl-9">
                    <input type="file" id="example-fileinput" name="youtube_image" class="form-control">
                    @error('youtube_image')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="rate" class="col-4 col-xl-3 col-form-label">Reytinq</label>
                <div class="col-8 col-xl-9">
                        <div class="stars">
                            <label class="rate">
                                <input type="radio" name="rate" id="star1" value="1">
                                <div class="face"></div>
                                <i class="far fa-star star one-star"></i>
                            </label>
                            <label class="rate">
                                <input type="radio" name="rate" id="star2" value="2">
                                <div class="face"></div>
                                <i class="far fa-star star two-star"></i>
                            </label>
                            <label class="rate">
                                <input type="radio" name="rate" id="star3" value="3">
                                <div class="face"></div>
                                <i class="far fa-star star three-star"></i>
                            </label>
                            <label class="rate">
                                <input type="radio" name="rate" id="star4" value="4">
                                <div class="face"></div>
                                <i class="far fa-star star four-star"></i>
                            </label>
                            <label class="rate">
                                <input type="radio" name="rate" id="star5" value="5">
                                <div class="face"></div>
                                <i class="far fa-star star five-star"></i>
                            </label>
                        </div>
                    @error('rate')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="bron_email" class="col-4 col-xl-3 col-form-label">Bron email</label>
                <div class="col-8 col-xl-9">
                    <input type="email" name="bron_email" class="form-control">
                    @error('bron_email')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="country_id" class="col-4 col-xl-3 col-form-label">Ölkə</label>
                <div class="col-8 col-xl-9">
                    <select name="country_id" class="form-control country" id="country_id">
                        <option disabled selected>Ölkə seçin</option>
                        @foreach($countries as $country)
                        <option value="{{ $country->id }}">{{ $country->title }}</option>
                        @endforeach
                    </select>
                    @error('country_id')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="city_id" class="col-4 col-xl-3 col-form-label">Şəhər</label>
                <div class="col-8 col-xl-9">
                    <select name="city_id" class="form-control cities" id="city_id">
                    <option disabled selected>Şəhər seçin</option>
                    </select>
                    @error('city_id')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="company_id" class="col-4 col-xl-3 col-form-label">Şirkət</label>
                <div class="col-8 col-xl-9">
                    <select name="company_id" class="form-control companies" id="company_id">
                        <option disabled selected>Şirkət seçin seçin</option>
                    </select>
                    @error('company_id')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="phone_number" class="col-4 col-xl-3 col-form-label">Əlaqə nömrəsi</label>
                <div class="col-8 col-xl-9">
                    <input type="text" class="form-control" data-toggle="input-mask" name="phone_number" data-mask-format="(000) 000-0000" maxlength="14">
                    @error('phone_number')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="map" class="col-4 col-xl-3 col-form-label">Xəritə linki</label>
                <div class="col-8 col-xl-9">
                    <input type="text" class="form-control" name="map" id="map">
                    @error('map')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="_3d_map" class="col-4 col-xl-3 col-form-label">3D Xəritə linki</label>
                <div class="col-8 col-xl-9">
                    <input type="text" class="form-control" name="_3d_map" id="_3d_map">
                    @error('_3d_map')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="latitude" class="col-4 col-xl-3 col-form-label">Xəritə</label>
                <div class="col-8 col-xl-9">
                    <input type="text" class="form-control" name="latitude" id="latitude">
                    @error('latitude')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="longitude" class="col-4 col-xl-3 col-form-label">Xəritə</label>
                <div class="col-8 col-xl-9">
                    <input type="text" class="form-control" name="longitude" id="longitude">
                    @error('longitude')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="number_of_staff" class="col-4 col-xl-3 col-form-label">Personal sayı</label>
                <div class="col-8 col-xl-9">
                    <div class="form-check form-switch">
                        <input type="checkbox" name="number_of_staff" class="form-check-input" id="number_of_staff">
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <label for="tax_included" class="col-4 col-xl-3 col-form-label">ƏDV daxil</label>
                <div class="col-8 col-xl-9">
                    <div class="form-check form-switch">
                        <input type="checkbox" name="tax_included" class="form-check-input" id="tax_included">
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <label for="tax_price" class="col-4 col-xl-3 col-form-label">Vergi qiyməti</label>
                <div class="col-8 col-xl-9">
                    <input type="text" step="any" name="tax_price" class="form-control" id="tax_price">
                    @error('tax_price')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="transfer_included" class="col-4 col-xl-3 col-form-label">Transfer</label>
                <div class="col-8 col-xl-9">
                    <div class="form-check form-switch">
                        <input type="checkbox" name="transfer_included" class="form-check-input" id="transfer_included">
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <label for="transfer_link" class="col-4 col-xl-3 col-form-label">Transfer linki</label>
                <div class="col-8 col-xl-9">
                    <input type="text" name="transfer_link" class="form-control" id="transfer_link">
                    @error('transfer_link')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="main_description" class="col-4 col-xl-3 col-form-label">Ümumi məlumat</label>
                <div class="col-8 col-xl-9">
                        <textarea name="main_description" class="form-control" id="main_description" cols="30" rows="10"></textarea>
                        @error('main_description')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="reservation_rules" class="col-4 col-xl-3 col-form-label">Qeydiyyat qaydaları</label>
                <div class="col-8 col-xl-9">
                        <textarea name="reservation_rules" class="form-control" id="reservation_rules" cols="30" rows="10"></textarea>
                        @error('reservation_rules')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="payment_rules" class="col-4 col-xl-3 col-form-label">Ödəniş qaydaları</label>
                <div class="col-8 col-xl-9">
                        <textarea name="payment_rules" class="form-control" id="payment_rules" cols="30" rows="10"></textarea>
                        @error('payment_rules')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="reservation_contract" class="col-4 col-xl-3 col-form-label">Rezerv müqaviləsi</label>
                <div class="col-8 col-xl-9">
                        <textarea name="reservation_contract" class="form-control" id="reservation_contract" cols="30" rows="10"></textarea>
                        @error('reservation_contract')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="advantages" class="col-4 col-xl-3 col-form-label">Avantajlar</label>
                <div class="col-8 col-xl-9">
                        <textarea name="advantages" class="form-control" id="advantages" cols="30" rows="10"></textarea>
                        @error('advantages')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="important_to_know" class="col-4 col-xl-3 col-form-label">Lazımi məlumatlar</label>
                <div class="col-8 col-xl-9">
                        <textarea name="important_to_know" class="form-control" id="important_to_know" cols="30" rows="10"></textarea>
                        @error('important_to_know')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="treatment_package_price" class="col-4 col-xl-3 col-form-label">Müalicə paket qiymətləri</label>
                <div class="col-8 col-xl-9">
                        <textarea name="treatment_package_price" class="form-control" id="treatment_package_price" cols="30" rows="10"></textarea>
                        @error('treatment_package_price')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="paid_medical_procedures" class="col-4 col-xl-3 col-form-label">Ödənişli tibbi xidmətlər</label>
                <div class="col-8 col-xl-9">
                        <textarea name="paid_medical_procedures" class="form-control" id="paid_medical_procedures" cols="30" rows="10"></textarea>
                        @error('paid_medical_procedures')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="check_in_for_adults" class="col-4 col-xl-3 col-form-label">Böyüklər üçün yoxlanış</label>
                <div class="col-8 col-xl-9">
                        <textarea name="check_in_for_adults" class="form-control" id="check_in_for_adults" cols="30" rows="10"></textarea>
                        @error('check_in_for_adults')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="check_in_for_children" class="col-4 col-xl-3 col-form-label">Uşaqlar üçün yoxlanış</label>
                <div class="col-8 col-xl-9">
                        <textarea name="check_in_for_children" class="form-control" id="check_in_for_children" cols="30" rows="10"></textarea>
                        @error('check_in_for_children')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                </div>
            </div>

            <div class="justify-content-end row">
                <div class="col-8 col-xl-9">
                    <button type="submit" class="btn btn-info waves-effect waves-light">Daxil et</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>

    $(function() {

        $(document).on({
            mouseover: function(event) {
                $(this).find('.far').addClass('star-over');
                $(this).prevAll().find('.far').addClass('star-over');
            },
            mouseleave: function(event) {
                $(this).find('.far').removeClass('star-over');
                $(this).prevAll().find('.far').removeClass('star-over');
            }
        }, '.rate');


        $(document).on('click', '.rate', function() {
            if ( !$(this).find('.star').hasClass('rate-active') ) {
                $(this).siblings().find('.star').addClass('far').removeClass('fas rate-active');
                $(this).find('.star').addClass('rate-active fas').removeClass('far star-over');
                $(this).prevAll().find('.star').addClass('fas').removeClass('far star-over');
            } else {
                console.log('has');
            }
        });

    });



    $(document).ready(function() {
        $('form textarea[id]').each(function() {
            CKEDITOR.replace( $(this).attr('id'), {
                filebrowserUploadUrl: "{{route('admin.sanatoriums.upload', ['_token' => csrf_token() ])}}",
                filebrowserUploadMethod: 'form'
            });
        });
    });

    $(function () {
        $('.country').on('change', function (e) {
            var country_id = $(this).val();
            $.ajax({
                type: 'GET',
                url: "{{url('admin/sanatoriums/getCities')}}"+"/"+country_id,
                data: {
                    "country_id":country_id
                },
                success: function (data) {
                    $('.cities').html(data.cities);
                    $('.companies').html(data.companies);
                }
            })
        })
    })
</script>
@endsection

