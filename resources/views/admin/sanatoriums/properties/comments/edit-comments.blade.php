@extends('admin.layouts.master')
@section('page-title', 'Rəylər')
@section('content')

<div class="card">
    <div class="card-header">
        <div class="float-end">
            <a href="{{route('admin.sanatoriums.comments.edit-comments', ['sanatorium_id'=>$sanatorium->id,'comment_id'=>$comment->id])}}">
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
        <form action="{{ route('admin.sanatoriums.comments.update-comments', ['comment_id'=>$comment->id]) }}" method="POST">
            @csrf
            <div class="row mb-3">
                <label for="sanatorium_id" class="col-4 col-xl-3 col-form-label">Sanatoriya adı</label>
                <div class="col-8 col-xl-9">
                    <h3>{{ $sanatorium->name }}</h3>
                    <input type="hidden" id="sanatorium_id" name="sanatoriums_id" value="{{ $sanatorium->id }}">
                </div>
            </div>

            <div class="row mb-3">
                <label for="country_id" class="col-4 col-xl-3 col-form-label">Ölkə</label>
                <div class="col-8 col-xl-9">
                    <select name="country_id" class="form-control" name="country_id" id="country_id">
                        <option disabled>Seçin</option>
                        @foreach($countries as $country)
                        <option value="{{ $country->id }}" {{ $comment->country_id==$country->id ? 'selected' : '' }}>{{ $country->title }}</option>
                        @endforeach
                    </select>
                    <input type="hidden" name="who_shared" value="0">
                </div>
            </div>

            <div class="row mb-3">
                <label for="user_information" class="col-4 col-xl-3 col-form-label">Istifadəçi məlumatları</label>
                <div class="col-8 col-xl-9">
                    <input type="text" name="user_information" value="{{ $comment->user_information }}" class="form-control" id="user_information" placeholder="İstifadəçi adını/soyadını daxil edin">
                </div>
            </div>

            <div class="row mb-3">
                <label for="treatment_quality" class="col-4 col-xl-3 col-form-label">Müalicə keyfiyyəti</label>
                <div class="col-8 col-xl-9">
                    <input type="number" max="10"  value="{{ $comment->treatment_quality }}" name="treatment_quality" class="form-control" id="treatment_quality">
                </div>
            </div>

            <div class="row mb-3">
                <label for="reservation_quality" class="col-4 col-xl-3 col-form-label">Qarşılama və yerləşdirmə keyfiyyəti</label>
                <div class="col-8 col-xl-9">
                    <input type="number" max="10"  value="{{ $comment->reservation_quality }}" name="reservation_quality" class="form-control" id="reservation_quality">
                </div>
            </div>

            <div class="row mb-3">
                <label for="food_quality" class="col-4 col-xl-3 col-form-label">Qida keyfiyyəti</label>
                <div class="col-8 col-xl-9">
                    <input type="number" max="10"  value="{{ $comment->food_quality }}" name="food_quality" class="form-control" id="food_quality">
                </div>
            </div>

            <div class="row mb-3">
                <label for="personal_quality" class="col-4 col-xl-3 col-form-label">Personal keyfiyyəti</label>
                <div class="col-8 col-xl-9">
                    <input type="number" max="10"  value="{{ $comment->personal_quality }}" name="personal_quality" class="form-control" id="personal_quality">
                </div>
            </div>

            <div class="row mb-3">
                <label for="location_quality" class="col-4 col-xl-3 col-form-label">Yerləşmə yeri</label>
                <div class="col-8 col-xl-9">
                    <input type="number" max="10" value="{{ $comment->location_quality }}" name="location_quality" class="form-control" id="location_quality">
                </div>
            </div>

            <div class="row mb-3">
                <label for="positive" class="col-4 col-xl-3 col-form-label">Müsbət rəy</label>
                <div class="col-8 col-xl-9">
                    <textarea name="positive" class="form-control" id="" cols="30" rows="10">{{ $comment->positive }}</textarea>
                </div>
            </div>

            <div class="row mb-3">
                <label for="negative" class="col-4 col-xl-3 col-form-label">Mənfi rəy</label>
                <div class="col-8 col-xl-9">
                    <textarea name="negative" class="form-control" id="" cols="30" rows="10">{{ $comment->negative }}</textarea>
                </div>
            </div>


            <div class="row mb-3">
                <label for="shared_at" class="col-4 col-xl-3 col-form-label">Paylaşılma tarixi</label>
                <div class="col-8 col-xl-9">
                    <input class="form-control" value="{{ $comment->shared_at }}" id="shared_at" type="date" required="" name="shared_at">
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
