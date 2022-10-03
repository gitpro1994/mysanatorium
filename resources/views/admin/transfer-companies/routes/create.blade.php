@extends('admin.layouts.master')
@section('page-title', 'Yeni ünvan')
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
        <form action="{{ route('admin.routes.store') }}" method="POST">
            @csrf
            <div class="row mb-3">
                <label for="country_id" class="col-4 col-xl-3 col-form-label">Ölkə</label>
                <div class="col-8 col-xl-9">
                    <select name="country_id" class="form-control" id="country_id">
                        @foreach($countries as $country)
                            <option value="{{ $country->id }}">{{ $country->title }}</option>
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
                    <input type="text" name="address" class="form-control" id="address" placeholder="Ünvanı daxil edin">
                    @error('address')
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

@section('scripts')
<script>
    var loadFile = function(event) {
        var reader = new FileReader();
        reader.onload = function(){
            var output = document.getElementById('output');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    };
</script>
@endsection
