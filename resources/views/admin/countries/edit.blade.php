@extends('admin.layouts.master')
@section('page-title', 'Ölkə məlumatları')
@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.countries.update', ['id'=>$country->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <label for="slug" class="col-4 col-xl-3 col-form-label">Slug</label>
                <div class="col-8 col-xl-9">
                    <input type="text" name="slug" value="{{ $country->slug }}" class="form-control" id="slug" placeholder="slug">
                    @error('slug')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="title" class="col-4 col-xl-3 col-form-label">Ölkə adı</label>
                <div class="col-8 col-xl-9">
                    <input type="text" name="title" value="{{ $country->title }}" class="form-control" id="title" placeholder="Ölkə adını daxil edin">
                    @error('title')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="search_title" class="col-4 col-xl-3 col-form-label">Axtarış adı</label>
                <div class="col-8 col-xl-9">
                    <input type="text" name="search_title" value="{{ $country->search_title }}" class="form-control" id="search_title" placeholder="Axtarış adını daxil edin">
                    @error('search_title')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="shortened" class="col-4 col-xl-3 col-form-label">Qısaldılmış adı</label>
                <div class="col-8 col-xl-9">
                    <input type="text" name="shortened" value="{{ $country->shortened }}" class="form-control" id="shortened" placeholder="Qısaldılmış adı daxil edin">
                    @error('shortened')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="meta_titul" class="col-4 col-xl-3 col-form-label">Meta başlıq</label>
                <div class="col-8 col-xl-9">
                    <input type="text" name="meta_titul" value="{{ $country->meta_titul }}" class="form-control" id="meta_titul" placeholder="Meta başlıq">
                    @error('meta_titul')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="meta_description" class="col-4 col-xl-3 col-form-label">Meta başlıq</label>
                <div class="col-8 col-xl-9">
                    <textarea name="meta_description" id="meta_description" class="form-control" cols="30" rows="2">
                        {{ $country->meta_description }}
                    </textarea>
                    @error('meta_description')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="meta_keywords" class="col-4 col-xl-3 col-form-label">Açar sözlər</label>
                <div class="col-8 col-xl-9">
                    <textarea name="meta_keywords" id="meta_keywords" cols="30" class="form-control" rows="2">
                        {{ $country->meta_keywords }}
                    </textarea>
                    @error('meta_keywords')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="meta_H1" class="col-4 col-xl-3 col-form-label">Meta H1</label>
                <div class="col-8 col-xl-9">
                    <input type="text" name="meta_H1" value="{{ $country->meta_H1 }}" class="form-control" id="meta_H1" placeholder="Səhifə başlığı">
                    @error('meta_H1')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="country_number_prefix" class="col-4 col-xl-3 col-form-label">Nömrə başlığı</label>
                <div class="col-8 col-xl-9">
                    <input type="text" name="country_number_prefix" value="{{ $country->country_number_prefix }}" class="form-control" id="country_number_prefix" placeholder="+994">
                    @error('country_number_prefix')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="flag" class="col-4 col-xl-3 col-form-label">Bayraq</label>
                <div class="col-8 col-xl-9">
                    <input type="file" name="flag" data-plugins="dropify"  data-default-file="{{asset('backend/images/flags') .'/'. $country->flag}}"/>
                    @error('flag')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="cover" class="col-4 col-xl-3 col-form-label">Cover</label>
                <div class="col-8 col-xl-9">
                    <input type="file" name="cover" data-plugins="dropify" data-default-file="{{asset('backend/images/cover') .'/'. $country->cover}}"/>
                    @error('image')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="for_sanatorium" class="col-4 col-xl-3 col-form-label">Sanatoriyada istifadəsi</label>
                <div class="col-8 col-xl-9">
                    <div class="form-check form-switch">
                        <input type="checkbox" {{ ($country->for_sanatorium)==1 ? 'checked' : ''}} name="for_sanatorium" class="form-check-input" id="for_sanatorium">
                        <label class="form-check-label" for="for_sanatorium">Sanatoriyada istifadə edilir</label>
                    </div>
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

