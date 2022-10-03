@extends('admin.layouts.master')
@section('page-title', 'Yeni şəhər')
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
        <form action="{{ route('admin.cities.store') }}" method="POST">
            @csrf
            <div class="row mb-3">
                <label for="country_id" class="col-4 col-xl-3 col-form-label">Ölkələr</label>
                <div class="col-8 col-xl-9">
                    <select name="country_id" id="country_id" class="form-control">
                        <option disabled selected>Seçin</option>
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
                <label for="slug" class="col-4 col-xl-3 col-form-label">Slug</label>
                <div class="col-8 col-xl-9">
                    <input type="text" name="slug" class="form-control" id="slug" placeholder="slug">
                    @error('slug')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="title" class="col-4 col-xl-3 col-form-label">Şəhər adı</label>
                <div class="col-8 col-xl-9">
                    <input type="text" name="title" class="form-control" id="title" placeholder="Şəhər adını daxil edin">
                    @error('title')
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

            <div class="justify-content-end row">
                <div class="col-8 col-xl-9">
                    <button type="submit" class="btn btn-info waves-effect waves-light">Daxil et</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
