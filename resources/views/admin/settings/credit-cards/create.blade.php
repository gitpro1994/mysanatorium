@extends('admin.layouts.master')
@section('page-title', 'Yeni kredit kartı')
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
        <form action="{{ route('admin.credit-cards.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
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
                <label for="icon" class="col-4 col-xl-3 col-form-label">Şəkil</label>
                <div class="col-8 col-xl-9">
                    <input type="file" id="icon" data-plugins="dropify" name="icon" />
                    @error('icon')
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

