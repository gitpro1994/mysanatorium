@extends('admin.layouts.master')
@section('page-title', 'Yeni endirim paketi')
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
        <form action="{{ route('admin.discounts.store') }}" method="POST">
            @csrf


            <div class="row mb-3">
                <label for="discount_name" class="col-4 col-xl-3 col-form-label">Endirim paketi</label>
                <div class="col-8 col-xl-9">
                    <input type="text" name="discount_name" class="form-control" id="discount_name" placeholder="Paket adını daxil edin">
                    @error('discount_name')
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
