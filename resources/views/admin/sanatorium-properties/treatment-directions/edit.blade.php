@extends('admin.layouts.master')
@section('page-title', 'Yeni valyuta')
@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.treatment-directions.update', ['id'=>$td->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <label for="slug" class="col-4 col-xl-3 col-form-label">Slug</label>
                <div class="col-8 col-xl-9">
                    <input type="text" value="{{ $td->slug }}" name="slug" class="form-control" id="slug" placeholder="slug">
                    @error('slug')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="name" class="col-4 col-xl-3 col-form-label">Ad</label>
                <div class="col-8 col-xl-9">
                    <input type="text" value="{{ $td->name }}" name="name" class="form-control" id="name" placeholder="Ad daxil edin">
                    @error('name')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="description" class="col-4 col-xl-3 col-form-label">Açıqlama</label>
                <div class="col-8 col-xl-9">
                    <textarea name="description" id="description" class="form-control" cols="30" rows="4">{{ $td->description }}</textarea>
                    @error('description')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>


            <div class="row mb-3">
                <label for="meta_title" class="col-4 col-xl-3 col-form-label">Meta başlıq</label>
                <div class="col-8 col-xl-9">
                    <input type="text" value="{{ $td->meta_title }}" name="meta_title" class="form-control" id="meta_title" placeholder="Başlıq daxil edin">
                    @error('meta_title')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="meta_desc" class="col-4 col-xl-3 col-form-label">Meta açıqlama</label>
                <div class="col-8 col-xl-9">
                    <input type="text" name="meta_desc" value="{{ $td->meta_desc }}" class="form-control" id="meta_desc" placeholder="Açıqlama daxil edin">
                    @error('meta_desc')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="keywords" class="col-4 col-xl-3 col-form-label">Açar sözlər</label>
                <div class="col-8 col-xl-9">
                    <textarea name="keywords" id="keywords" class="form-control" cols="30" rows="4">{{ $td->keywords }}</textarea>
                    @error('keywords')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="meta_H1" class="col-4 col-xl-3 col-form-label">Meta H1</label>
                <div class="col-8 col-xl-9">
                    <input type="text" value="{{ $td->meta_H1 }}" name="meta_H1" class="form-control" id="meta_H1">
                    @error('meta_H1')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="image" class="col-4 col-xl-3 col-form-label">Şəkil</label>
                <div class="col-8 col-xl-9">
                    <input type="file" name="image" data-plugins="dropify" data-default-file="{{ asset('backend/images/td').'/'.$td->image }}" />
                    @error('image')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="cover" class="col-4 col-xl-3 col-form-label">Cover</label>
                <div class="col-8 col-xl-9">
                    <input type="file" name="cover" data-plugins="dropify" data-default-file="{{ asset('backend/images/td').'/'.$td->cover }}" />
                    @error('cover')
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