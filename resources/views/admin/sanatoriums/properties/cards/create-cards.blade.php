@extends('admin.layouts.master')
@section('page-title', 'Yeni kredit kartı')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="float-start">
            <h3>{{ $sanatorium->name }}</h3>
        </div>
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
        <form action="{{ route('admin.sanatoriums.sanatorium-credit-cards.store', ['sanatorium_id'=>$sanatorium->id]) }}" method="POST">
            @csrf
            <input type="hidden" value="{{ $sanatorium->id }}" name="sanatoriums_id" id="">
            <div class="row mb-3">
                <div class="col-xl-4 mt-2">
                    <div class="mb-3 mb-xl-0">
                        <label for="start_date" class="form-label">Başlanğıc tarixi</label>
                        <input class="form-control" id="start_date" type="date" required name="start_date">
                    </div>
                </div>
                <div class="col-xl-4 mt-2">
                    <div class="mb-3 mb-xl-0">
                        <label for="finish_date" class="form-label">Sonlanma tarixi</label>
                        <input class="form-control" id="finish_date" type="date" required name="finish_date">
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                @foreach($cards as $card)
                <div class="col-md-6">
                    <div class="form-check">
                        <input type="checkbox" name="credit_cards_id[]" value="{{ $card->id }}" class="form-check-input" id="{{$card->id}}">
                        <img src="{{ asset('backend/images/cards/').'/'.$card->icon }}" alt="" class="img-responsive mb-2" height="25">
                        <label class="form-check-label" for="{{$card->id}}">{{ $card->name }}</label>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="form-check form-switch mt-4 mb-4">
                <input type="checkbox" class="form-check-input" name="cvv_available" id="cvv_available">
                <label class="form-check-label" for="cvv_available">CVV tələb olunur</label>
            </div>

            <div class="justify-content-end row">
                <div class="col-12 col-xl-12">
                    <button type="submit" class="btn btn-info waves-effect waves-light">Daxil et</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection