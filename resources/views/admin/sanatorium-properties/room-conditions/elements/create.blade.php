@extends('admin.layouts.master')
@section('page-title', 'Yeni element')
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

        <form action="{{ route('admin.elements.store') }}" method="POST">
            @csrf

            <div class="row mb-3">
                <label for="name" class="col-4 col-xl-3 col-form-label">Otaq şəraiti adı</label>
                <div class="col-8 col-xl-9">
                    <h5>{{ $room_condition->name }}</h5>
                    <input type="hidden" readonly value="{{ $room_condition->id }}" class="form-control" name="room_condition_id" id="name">
                    @error('name')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="name" class="col-4 col-xl-3 col-form-label">Ad</label>
                <div class="col-8 col-xl-9">
                    <input type="text" class="form-control" name="name" id="name">
                    @error('name')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="description" class="col-4 col-xl-3 col-form-label">Açıqlama</label>
                <div class="col-8 col-xl-9">
                    <textarea name="description" id="description" class="form-control" cols="4" rows="4"></textarea>
                    @error('description')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="show_filter" class="col-4 col-xl-3 col-form-label">Filtrdə göstər</label>
                <div class="col-8 col-xl-9">
                    <select name="show_filter" id="show_filter" class="form-control">
                        <option value="1">Göstər</option>
                        <option value="0">Gizlə</option>
                    </select>
                    @error('show_filter')
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


