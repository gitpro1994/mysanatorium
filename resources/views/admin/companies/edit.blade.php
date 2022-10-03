@extends('admin.layouts.master')
@section('page-title', 'Şirkət məlumatları')
@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.companies.update', ['id'=>$company->id]) }}" method="POST">
            @csrf
            <div class="row mb-3">
                <label for="country_id" class="col-4 col-xl-3 col-form-label">Ölkələr</label>
                <div class="col-8 col-xl-9">
                    <select name="country_id" id="country_id" class="form-control">
                        <option disabled selected>Seçin</option>
                        @foreach($countries as $country)
                        <option value="{{ $country->id }}" {{ ($company->country_id==$country->id) ? 'selected' : '' }}>{{ $country->title }}</option>
                        @endforeach
                    </select>
                    @error('country_id')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="city_id" class="col-4 col-xl-3 col-form-label">Şəhərlər</label>
                <div class="col-8 col-xl-9">
                    <select name="city_id" id="city_id" class="form-control">
                        <option disabled selected>Seçin</option>
                        @foreach($cities as $city)
                        <option value="{{ $city->id }}" {{ ($company->city_id==$city->id) ? 'selected' : '' }}>{{ $city->title }}</option>
                        @endforeach
                    </select>
                    @error('city_id')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="name" class="col-4 col-xl-3 col-form-label">Şirkət adı</label>
                <div class="col-8 col-xl-9">
                    <input type="text" name="name" value="{{ $company->name }}" class="form-control" id="name" placeholder="Şirkət adını daxil edin">
                    @error('name')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="related_person" class="col-4 col-xl-3 col-form-label">Əlaqədar şəxs</label>
                <div class="col-8 col-xl-9">
                    <input type="text" name="related_person" value="{{ $company->related_person }}" class="form-control" id="related_person" placeholder="Əlaqədar şəxs">
                    @error('related_person')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="address" class="col-4 col-xl-3 col-form-label">Ünvan</label>
                <div class="col-8 col-xl-9">
                    <input type="text" name="address" value="{{ $company->address }}" class="form-control" id="address" placeholder="Dəqiq ünvanı qey edin">
                    @error('address')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="postal_code" class="col-4 col-xl-3 col-form-label">Poçt indeksi</label>
                <div class="col-8 col-xl-9">
                    <input type="text" name="postal_code" value="{{ $company->postal_code }}" class="form-control" id="postal_code" placeholder="Poçt indeksi">
                    @error('postal_code')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="representative" class="col-4 col-xl-3 col-form-label">Nümayəndə</label>
                <div class="col-8 col-xl-9">
                    <input type="text" name="representative" value="{{ $company->representative }}" class="form-control" id="representative" placeholder="Nümayəndə">
                    @error('representative')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="tax_number" class="col-4 col-xl-3 col-form-label">Vergi nömrəsi</label>
                <div class="col-8 col-xl-9">
                    <input type="text" name="tax_number" value="{{ $company->tax_number }}" class="form-control" id="tax_number" placeholder="Vergi nömrəsi">
                    @error('tax_number')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="voen" class="col-4 col-xl-3 col-form-label">Vöen</label>
                <div class="col-8 col-xl-9">
                    <input type="text" name="voen" value="{{ $company->voen }}" class="form-control" id="voen" placeholder="Vöen">
                    @error('voen')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="contact_number" class="col-4 col-xl-3 col-form-label">Əlaqə nömrəsi</label>
                <div class="col-8 col-xl-9">
                    <input type="text" name="contact_number" value="{{ $company->contact_number }}" class="form-control" id="contact_number" placeholder="+994 xx xxx xx xx">
                    @error('contact_number')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="email" class="col-4 col-xl-3 col-form-label">Email</label>
                <div class="col-8 col-xl-9">
                    <input type="email" name="email" value="{{ $company->email }}" class="form-control" id="email" placeholder="info@mysanatorium.com">
                    @error('email')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="justify-content-end row">
                <div class="col-8 col-xl-9">
                    <button type="submit" class="btn btn-info waves-effect waves-light">Yadda saxla</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
