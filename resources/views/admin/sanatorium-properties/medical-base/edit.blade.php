@extends('admin.layouts.master')
@section('page-title', 'Müalicə növü məlumatları')
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
        <form action="{{ route('admin.medical-base.update', ['id'=>$medical_base->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <label for="name" class="col-4 col-xl-3 col-form-label">Ad</label>
                <div class="col-8 col-xl-9">
                    <input type="text" class="form-control" value="{{ $medical_base->name }}" name="name" id="name">
                    @error('name')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="description" class="col-4 col-xl-3 col-form-label">Açıqlama</label>
                <div class="col-8 col-xl-9">
                    <textarea name="description" class="form-control" id="summary-ckeditor" cols="30" rows="10">{{ $medical_base->description }}</textarea>
                    @error('description')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="image" class="col-4 col-xl-3 col-form-label">Şəkil</label>
                <div class="col-8 col-xl-9">
                    <input type="file" id="image" data-plugins="dropify" name="image" data-default-file="{{ asset('backend/images/medical-base/').'/'.$medical_base->image }}"/>
                    @error('image')
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
    CKEDITOR.replace( 'summary-ckeditor', {
        filebrowserUploadUrl: "{{route('admin.medical-base.upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
</script>
@endsection
