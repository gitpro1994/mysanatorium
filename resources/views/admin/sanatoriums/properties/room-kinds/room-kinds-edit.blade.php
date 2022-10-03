@extends('admin.layouts.master')
@section('page-title', 'Otaq növü məlumatları')
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
        <form action="{{ route('admin.sanatoriums.room-kinds.update', ['id'=>$room_kind->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <label for="name" class="col-4 col-xl-3 col-form-label">Sanatoriya</label>
                <div class="col-8 col-xl-9">
                    <h4>{{ $room_kind->getSanatorium['name'] }}</h4>
                    <input type="hidden" value="{{ $room_kind->getSanatorium['id'] }}" name="sanatoriums_id">
                </div>
            </div>

            <div class="row mb-3">
                <label for="room_kinds_id" class="col-4 col-xl-3 col-form-label">Otaq növü</label>
                <div class="col-8 col-xl-9">
                    <select name="room_kinds_id" class="form-control" id="room_kinds_id">
                        @foreach($room_kinds as $kind)
                        	<option value="{{ $kind->id }}" @if($room_kind->room_kinds_id==$kind->id) selected @endif>{{ $kind->name }}</option>
                        @endforeach
                    </select>
                    @error('room_kinds_id')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>


            <div class="row mb-3">
                <label for="room_size" class="col-4 col-xl-3 col-form-label">Otaq ölçüsü (m<sup>2</sup>) </label>
                <div class="col-8 col-xl-9">
                    <input type="number" value="{{ $room_kind->room_size }}" class="form-control" name="room_size" id="room_size">
                    @error('room_size')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>


            <div class="row mb-3">
                <label for="bed_width" class="col-4 col-xl-3 col-form-label">Yataq ölçüsü (m<sup>2</sup>) </label>
                <div class="col-8 col-xl-9">
                    <input type="text" class="form-control" value="{{ $room_kind->bed_width }}" name="bed_width" id="bed_width">
                    @error('bed_width')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>


             <div class="row mb-3">
                <label for="smoking" class="col-4 col-xl-3 col-form-label">Tütün məmulatları istifadəsi</label>
                <div class="col-8 col-xl-9">
                    <div class="form-check form-switch">
                        <input type="checkbox" @if($room_kind->smoking==1) checked @endif name="smoking" class="form-check-input" id="smoking">
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <label for="extra_bed" class="col-4 col-xl-3 col-form-label">Əlavə yataq</label>
                <div class="col-8 col-xl-9">
                    <div class="form-check form-switch">
                        <input type="checkbox" @if($room_kind->extra_bed==1) checked @endif name="extra_bed" class="form-check-input" id="extra_bed">
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <label for="possible_additional_beds" class="col-4 col-xl-3 col-form-label">Əlavə oluna biləcək maksimum yataq sayı</label>
                <div class="col-8 col-xl-9">
                    <input type="text" class="form-control" value="{{ $room_kind->possible_additional_beds }}" id="possible_additional_beds" name="possible_additional_beds">
                     @error('possible_additional_beds')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>


            <div class="row mb-3">
                <label for="main_image" class="col-4 col-xl-3 col-form-label">Əsas şəkil</label>
                <div class="col-8 col-xl-9">
                    <input type="file" id="example-fileinput" name="main_image" class="form-control">
                    @error('main_image')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            

            <div class="row mb-3">
                <label for="room_features" class="col-4 col-xl-3 col-form-label">Otaq məlumatları</label>
                <div class="col-8 col-xl-9">
                        <textarea name="room_features" class="form-control" id="room_features" cols="30" rows="10">{{ $room_kind->room_features }}</textarea>
                        @error('room_features')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                </div>
            </div>

            <h4>Otaq şəraiti</h4>

            @foreach($room_conditions as $condition)
            <div class="row mb-3">
                <label for="room_features" class="col-4 col-xl-3 col-form-label">{{ $condition->name }}</label>
                <div class="col-8 col-xl-9">
                	<div class="row">
                		@php 
                        		$data=json_decode($room_kind->room_amenities);
                        	@endphp
                        @foreach($condition->getRoomElements as $element)
                        	<div class="col-md-3">
                        	<label for="element-{{$element->id}}">
                        	<input type="checkbox" @if(in_array($element->id, $data)) checked @endif id="element-{{ $element->id }}" value="{{ $element->id }}" name="room_amenities[]">
                        	{{ $element->name }}
                        </label>
                        </div>
                        @endforeach
                	</div>
                </div>
            </div>
            @endforeach

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
    $(document).ready(function() {
        $('form textarea[id]').each(function() {
            CKEDITOR.replace( $(this).attr('id'), {
                filebrowserUploadUrl: "{{route('admin.sanatoriums.upload', ['_token' => csrf_token() ])}}",
                filebrowserUploadMethod: 'form'
            });
        });
    });
</script>
@endsection

