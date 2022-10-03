@extends('admin.layouts.master')
@section('page-title', 'Endirim paketi məlumatları')
@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.discounts.update', ['id'=>$discount->id]) }}" method="POST">
            @csrf
            <div class="row mb-3">
                <label for="discount_name" class="col-4 col-xl-3 col-form-label">Endirim paketi</label>
                <div class="col-8 col-xl-9">
                    <input type="text" value="{{ $discount->discount_name }}" name="discount_name" class="form-control" id="discount_name" placeholder="Paket adını daxil edin">
                    @error('discount_name')
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

