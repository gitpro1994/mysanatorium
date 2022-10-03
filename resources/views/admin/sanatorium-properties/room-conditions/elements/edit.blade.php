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

        <form action="{{ route('admin.elements.update', ['id'=>$element->id]) }}" method="POST">
            @csrf

            <div class="row mb-3">
                <label for="name" class="col-4 col-xl-3 col-form-label">Otaq şəraiti adı</label>
                <div class="col-8 col-xl-9">
                    <h5>{{ $element->getRoomCondition['name'] }}</h5>
                    <input type="hidden" readonly value="{{ $element->getRoomCondition['id'] }}" class="form-control" name="room_condition_id" id="name">
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
                <label for="description" class="col-4 col-xl-3 col-form-label">Açıqlama</label>
                <div class="col-8 col-xl-9">
                    <textarea name="description" id="description" class="form-control" cols="4" rows="4">{{ $element->description }}</textarea>
                    @error('description')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="show_filter" class="col-4 col-xl-3 col-form-label">Filtrdə göstər</label>
                <div class="col-8 col-xl-9">
                    <select name="show_filter" id="show_filter" class="form-control">
                        <option value="1" {{ $element->show_filter == 1 ? 'selected' : '' }}>Göstər</option>
                        <option value="0" {{ $element->show_filter == 0 ? 'selected' : '' }}>Gizlə</option>
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


