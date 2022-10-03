@extends('admin.layouts.master')
@section('page-title', 'Ünvan məlumatları')
@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.routes.update', ['id'=>$route->id]) }}" method="POST">
            @csrf
            <div class="row mb-3">
                <label for="country_id" class="col-4 col-xl-3 col-form-label">Ölkə</label>
                <div class="col-8 col-xl-9">
                    <select name="country_id" class="form-control" id="country_id">
                        @foreach($countries as $country)
                        <option value="{{ $country->id }}" {{ ($route->country_id==$country->id) ? 'selected' : '' }}>{{ $country->title }}</option>
                        @endforeach
                    </select>
                    @error('country_id')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="address" class="col-4 col-xl-3 col-form-label">Ünvan</label>
                <div class="col-8 col-xl-9">
                    <input type="text" name="address" value="{{ $route->address }}" class="form-control" id="address" placeholder="Ünvanı daxil edin">
                    @error('address')
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

