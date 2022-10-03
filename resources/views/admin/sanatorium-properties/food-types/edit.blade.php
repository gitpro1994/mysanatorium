@extends('admin.layouts.master')
@section('page-title', 'Yemək növü məlumatları')
@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.food-types.update', ['id'=>$types->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <label for="name" class="col-4 col-xl-3 col-form-label">Ad</label>
                <div class="col-8 col-xl-9">
                    <input type="text" name="name" value="{{ $types->name }}" class="form-control" id="name">
                    @error('name')
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
