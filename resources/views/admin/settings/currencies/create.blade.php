@extends('admin.layouts.master')
@section('page-title', 'Yeni valyuta')
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
        <form action="{{ route('admin.currencies.store') }}" method="POST">
            @csrf
            <div class="row mb-3">
                <label for="slug" class="col-4 col-xl-3 col-form-label">Slug</label>
                <div class="col-8 col-xl-9">
                    <input type="text" name="slug" class="form-control" id="slug" placeholder="slug">
                    @error('slug')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="code" class="col-4 col-xl-3 col-form-label">Valyuta</label>
                <div class="col-8 col-xl-9">
                    <input type="text" name="code" class="form-control" id="code" placeholder="Kod daxil edin">
                    @error('code')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="title" class="col-4 col-xl-3 col-form-label">Başlıq</label>
                <div class="col-8 col-xl-9">
                    <input type="text" name="title" class="form-control" id="title" placeholder="Adını daxil edin">
                    @error('title')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="currency" class="col-4 col-xl-3 col-form-label">Mövcud kurs</label>
                <div class="col-8 col-xl-9">
                    <input type="number" step="any" name="currency" class="form-control" id="currency" placeholder="Kurs daxil edin">
                    @error('currency')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="symbol" class="col-4 col-xl-3 col-form-label">Simvol</label>
                <div class="col-8 col-xl-9">
                    <input type="text" name="symbol" class="form-control" id="symbol" placeholder="Simvol">
                    @error('symbol')
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
