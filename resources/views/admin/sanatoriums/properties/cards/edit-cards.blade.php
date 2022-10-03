@extends('admin.layouts.master')
@section('page-title', 'Kredit kartı məlumatları')
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
        <form action="{{ route('admin.sanatoriums.sanatorium-credit-cards.update-sanatorium-credit-cards', ['sanatorium_id'=>$sanatorium->id,'card_id'=>$card->id]) }}" method="POST">
            @csrf
            <input type="hidden" value="{{ $sanatorium->id }}" name="sanatoriums_id" id="">
            <div class="row mb-3">
                <div class="col-xl-4 mt-2">
                    <div class="mb-3 mb-xl-0">
                        <label for="start_date" class="form-label">Başlanğıc tarixi</label>
                        <input class="form-control" value="{{ $card->start_date }}" id="start_date" type="date" required name="start_date">
                    </div>
                </div>
                <div class="col-xl-4 mt-2">
                    <div class="mb-3 mb-xl-0">
                        <label for="finish_date" class="form-label">Sonlanma tarixi</label>
                        <input class="form-control" value="{{ $card->finish_date }}" id="finish_date" type="date" required name="finish_date">
                    </div>
                </div>
            </div>

            @php 
                $item = json_decode($card->credit_cards_id);
            @endphp 


            <div class="row mt-4">
                @foreach($cards as $cardes)
                <div class="col-md-6">
                    <div class="form-check">
                        <input type="checkbox" name="credit_cards_id[]" {{ (in_array($cardes->id, $item) ? 'checked' : '') }} value="{{ $cardes->id }}" class="form-check-input" id="{{$cardes->id}}">
                        <img src="{{ asset('backend/images/cards/').'/'.$cardes->icon }}" alt="" class="img-responsive mb-2" height="25">
                        <label class="form-check-label" for="{{$cardes->id}}">{{ $cardes->name }}</label>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="form-check form-switch mt-4 mb-4">
                <input type="checkbox" {{ $card->cvv_available==1 ? 'checked' : '' }} class="form-check-input" name="cvv_available" id="cvv_available">
                <label class="form-check-label" for="cvv_available">CVV tələb olunur</label>
            </div>

            <div class="justify-content-end row">
                <div class="col-12 col-xl-12">
                    <button type="submit" class="btn btn-info waves-effect waves-light">Yadda saxla</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection