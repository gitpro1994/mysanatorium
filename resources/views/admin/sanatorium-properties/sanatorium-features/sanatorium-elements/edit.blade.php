@extends('admin.layouts.master')
@section('page-title', 'Element məlumatları')
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

        <form action="{{ route('admin.sanatorium-elements.update', ['id'=>$element->id]) }}" method="POST">
            @csrf

            <div class="row mb-3">
                <label for="sanatorium_features_id" class="col-4 col-xl-3 col-form-label">Sanatoriya özəlliyi</label>
                <div class="col-8 col-xl-9">
                    <h5>{{ $element->getSanatoriumFeatures['name'] }}</h5>
                    <input type="hidden" readonly value="{{ $element->getSanatoriumFeatures['id'] }}" class="form-control" name="sanatorium_features_id" id="sanatorium_features_id">
                    @error('name')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="name" class="col-4 col-xl-3 col-form-label">Ad</label>
                <div class="col-8 col-xl-9">
                    <input type="text" value="{{ $element->name }}" class="form-control" name="name" id="name">
                    @error('name')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="image" class="col-4 col-xl-3 col-form-label">Şəkil</label>
                <div class="col-8 col-xl-9">
                    <input type="file" id="image" data-plugins="dropify" name="image" data-default-file="{{ asset('backend/images/sanatorium-features/elements/').'/'.$element->image }}"/>
                    @error('image')
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


