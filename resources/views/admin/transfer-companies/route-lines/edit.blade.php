@extends('admin.layouts.master')
@section('page-title', 'Yeni ünvan')
@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.route-lines.update', ['id'=>$route_line->id]) }}" method="POST">
            @csrf
            <div class="row mb-3">
                <label for="transfer_company_id" class="col-4 col-xl-3 col-form-label">Ölkə</label>
                <div class="col-8 col-xl-9">
                    <select name="transfer_company_id" class="form-control" id="transfer_company_id">
                        @foreach($transfer_companies as $company)
                        <option value="{{ $company->id }}" {{ ($route_line->company_id==$company->id) ? 'selected' : '' }}>{{ $company->name }}</option>
                        @endforeach
                    </select>
                    @error('transfer_company_id')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="price" class="col-4 col-xl-3 col-form-label">Qiymət</label>
                <div class="col-8 col-xl-9">
                    <input type="number" value="{{ $route_line->price }}" step="any" name="price" class="form-control" id="price" placeholder="Qiymət daxil edin">
                    @error('price')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="name_surname" class="col-4 col-xl-3 col-form-label">Sərnişin məlumatları</label>
                <div class="col-8 col-xl-9">
                    <input type="text" value="{{ $route_line->name_surname }}" name="name_surname" class="form-control" id="name_surname" placeholder="Ad soyad daxil edin">
                    @error('name_surname')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="note" class="col-4 col-xl-3 col-form-label">Qeyd</label>
                <div class="col-8 col-xl-9">
                    <input type="text" value="{{ $route_line->note }}" name="note" class="form-control" id="note" placeholder="Qeyd daxil edin">
                    @error('note')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="from" class="col-4 col-xl-3 col-form-label">Başlanğıc ünvanı</label>
                <div class="col-8 col-xl-9">
                    <select name="from" class="form-control" id="from">
                        @foreach($routes as $route)
                        <option value="{{ $route->id }}" {{ ($route_line->from == $route->id) ? 'selected' : '' }}>{{ $route->address }}</option>
                        @endforeach
                    </select>
                    @error('from')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="to" class="col-4 col-xl-3 col-form-label">Bitiş ünvanı</label>
                <div class="col-8 col-xl-9">
                    <select name="to" class="form-control" id="to">
                        @foreach($routes as $route)
                        <option value="{{ $route->id }}" {{ ($route_line->to == $route->id) ? 'selected' : '' }}>{{ $route->address }}</option>
                        @endforeach
                    </select>
                    @error('to')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="travel_time" class="col-4 col-xl-3 col-form-label">Səyahət vaxtı</label>
                <div class="col-8 col-xl-9">
                    <input type="text" value="{{ $route_line->travel_time }}" class="form-control" name="travel_time" id="">
                    @error('travel_time')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="travel_type" class="col-4 col-xl-3 col-form-label">Səyahət növü</label>
                <div class="col-8 col-xl-9">
                    <select name="travel_type" id="travel_type" class="form-control">
                        <option value="1" {{ ($route_line->travel_type == 1) ? 'selected' : '' }}>Fərdi səyahət</option>
                        <option value="2" {{ ($route_line->travel_type == 2) ? 'selected' : '' }}>Qrup səyahəti</option>
                    </select>
                    @error('travel_type')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="min" class="col-4 col-xl-3 col-form-label">Minimum nəfər sayı</label>
                <div class="col-8 col-xl-9">
                    <input type="number" value="{{ $route_line->min }}" class="form-control" id="min" name="min" placeholder="Minimum nəfər sayı">
                    @error('min')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="max" class="col-4 col-xl-3 col-form-label">Maksimum nəfər sayı</label>
                <div class="col-8 col-xl-9">
                    <input type="number" value="{{ $route_line->max }}" class="form-control" id="max" name="max" placeholder="Maksimum nəfər sayı">
                    @error('max')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="description" class="col-4 col-xl-3 col-form-label">Açıqlama</label>
                <div class="col-8 col-xl-9">
                    <textarea name="description" id="description" class="form-control" cols="4" rows="4">{{ $route_line->description }}</textarea>
                    @error('description')
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

