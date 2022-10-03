@extends('admin.layouts.master')
@section('page-title', 'Uşaqlar üçün yaş limiti')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    @if(session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    <div class="float-start">
                        {{ $sanatorium->name }}
                        <input type="hidden" value="{{ $sanatorium->id }}" name="sanatorium_id" id="sanatorium_id">
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.sanatoriums.stchild.store', ['sanatorium_id'=>$sanatorium->id])}}"
                          method="POST">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                Müalicə ilə
                                <input type="hidden" name="with_treatment_or_not" value="1" id="">
                            </div>
                            <div class="card-body">
                                <div class="mt-4">
                                    <div class="form-check">
                                        <input type="radio" id="child_is_accepted"
                                               {{ (child_is_accepted($sanatorium->id)==1) ? 'checked' : '' }} value="1"
                                               name="child_is_accepted" class="form-check-input">
                                        <label class="form-check-label" for="child_is_accepted">Uşaq qəbul
                                            olunur</label>
                                    </div>
                                    <div class="form-check mt-2">
                                        <input type="radio" id="child_is_accepted"
                                               {{ (child_is_accepted($sanatorium->id)==0) ? 'checked' : '' }} value="0"
                                               name="child_is_accepted" class="form-check-input">
                                        <label class="form-check-label" for="child_is_accepted">Uşaq qəbul
                                            olunmur</label>
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <div class="align-items-center mt-4 stchild-age">
                                        <div class="col-auto">
                                            <button type="button"
                                                    class="new-stchild-age btn btn-outline-info waves-effect waves-light">
                                                <span><i class="fas fa-plus"></i></span>
                                                Yeni yaş həddi
                                            </button>
                                        </div>
                                        @foreach($sanatorium->getStchild as $child)
                                            <section>
                                                <div class="row mt-2">
                                                    <div class="col-3">
                                                        <select name="min_age[]" class="form-control" id="">
                                                            @for($i=1;$i<=18;$i++)
                                                                <option
                                                                    value="{{ $i }}" {{ $child->min_age==$i ? 'selected' : '' }}>{{ $i }}</option>
                                                            @endfor
                                                        </select>
                                                    </div>

                                                    <div class="col-3">
                                                        <select name="max_age[]" class="form-control" id="">
                                                            @for($i=1;$i<=18;$i++)
                                                                <option
                                                                    value="{{ $i }}" {{ $child->max_age==$i ? 'selected' : '' }}>{{ $i }}</option>
                                                            @endfor
                                                        </select>
                                                    </div>

                                                    <div class="col-3">
                                                        <select name="paid_or_not[]" class="form-control" id="">
                                                            <option
                                                                value="1" {{$child->paid_or_not==1 ? 'selected' : ''}}>
                                                                Ödənişli
                                                            </option>
                                                            <option
                                                                value="0" {{$child->paid_or_not==0 ? 'selected' : ''}}>
                                                                Ödənişsiz
                                                            </option>
                                                        </select>
                                                    </div>

                                                    <div class="col-auto">
                                                        <button type="button"
                                                                class="remove-stchild-age btn btn-outline-danger waves-effect waves-light">
                                                            <span><i class="fas fa-times"></i></span>
                                                            Sil
                                                        </button>
                                                    </div>
                                                </div>
                                            </section>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="justify-content-center">
                            <button type="submit" class="btn btn-sm btn-info">
                                Yadda saxla
                            </button>
                        </div>
                    </form>


                    <form action="{{route('admin.sanatoriums.stoutchild.store', ['sanatorium_id'=>$sanatorium->id])}}" method="post">
                        @csrf
                        <div class="card mt-4">
                            <div class="card-header">
                                Müalicəsiz
                                <input type="hidden" name="with_treatment_or_not" value="0" id="">
                            </div>
                            <div class="card-body">
                                <div class="mt-4">
                                    <div class="form-check">
                                        <input type="radio" id="out_child_is_accepted"
                                               {{ (out_child_is_accepted($sanatorium->id)==1) ? 'checked' : '' }} value="1"
                                               name="out_child_is_accepted" class="form-check-input">
                                        <label class="form-check-label" for="out_child_is_accepted">Uşaq qəbul
                                            olunur</label>
                                    </div>
                                    <div class="form-check mt-2">
                                        <input type="radio" id="out_child_is_accepted"
                                               {{ (out_child_is_accepted($sanatorium->id)==0) ? 'checked' : '' }} value="0"
                                               name="out_child_is_accepted" class="form-check-input">
                                        <label class="form-check-label" for="out_child_is_accepted">Uşaq qəbul
                                            olunmur</label>
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <div class="align-items-center mt-4 stoutchild-age">
                                        <div class="col-auto">
                                            <button type="button"
                                                    class="new-stoutchild-age btn btn-outline-info waves-effect waves-light">
                                                <span><i class="fas fa-plus"></i></span>
                                                Yeni yaş həddi
                                            </button>
                                        </div>

                                        @foreach($sanatorium->getStoutchild as $child)
                                            <section>
                                                <div class="row mt-2">
                                                    <div class="col-3">
                                                        <select name="min_age[]" class="form-control" id="">
                                                            @for($i=1;$i<=18;$i++)
                                                                <option value="{{ $i }}" {{$child->min_age==$i ? 'selected' : ''}}>{{ $i }}</option>
                                                            @endfor
                                                        </select>
                                                    </div>

                                                    <div class="col-3">
                                                        <select name="max_age[]" class="form-control" id="">
                                                            @for($i=1;$i<=18;$i++)
                                                                <option value="{{ $i }}" {{$child->max_age==$i ? 'selected' : ''}}>{{ $i }}</option>
                                                            @endfor
                                                        </select>
                                                    </div>

                                                    <div class="col-3">
                                                        <select name="paid_or_not[]" class="form-control" id="">
                                                            <option value="1" {{$child->paid_or_not==1 ? 'selected' : ''}}>Ödənişli</option>
                                                            <option value="0" {{$child->paid_or_not==0 ? 'selected' : ''}}>Ödənişsiz</option>
                                                        </select>
                                                    </div>

                                                    <div class="col-auto">
                                                        <button type="button"
                                                                class="remove-stoutchild-age btn btn-outline-danger waves-effect waves-light">
                                                            <span><i class="fas fa-times"></i></span>
                                                            Sil
                                                        </button>
                                                    </div>
                                                </div>
                                            </section>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="justify-content-center">
                            <button class="btn btn-sm btn-info">
                                Yadda saxla
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $('.new-stchild-age').on("click", function (e) {
            e.preventDefault();
            $('.stchild-age').append('<section class="row mt-2"><div class="col-3"> <select name="min_age[]" class="form-control" id=""> @for($i=1;$i<=18;$i++) <option value="{{ $i }}">{{ $i }}</option> @endfor </select> </div> <div class="col-3"> <select name="max_age[]" class="form-control" id=""> @for($i=1;$i<=18;$i++) <option value="{{ $i }}">{{ $i }}</option> @endfor </select> </div> <div class="col-3"> <select name="paid_or_not[]" class="form-control" id=""> <option value="1">Ödənişli</option> <option value="0">Ödənişsiz</option> </select> </div> <div class="col-auto"> <button type="button" class="remove-stchild-age btn btn-outline-danger waves-effect waves-light"> <span><i class="fas fa-times"></i></span> Sil </button> </div> </section>');
        });

        $('body').on("click", ".remove-stchild-age", function (e) {
            e.preventDefault();
            $(this).closest('section').remove();
        })

        $('.new-stoutchild-age').on("click", function (e) {
            e.preventDefault();
            $('.stoutchild-age').append('<section class="row mt-2"><div class="col-3"> <select name="min_age[]" class="form-control" id=""> @for($i=1;$i<=18;$i++) <option value="{{ $i }}">{{ $i }}</option> @endfor </select> </div> <div class="col-3"> <select name="max_age[]" class="form-control" id=""> @for($i=1;$i<=18;$i++) <option value="{{ $i }}">{{ $i }}</option> @endfor </select> </div> <div class="col-3"> <select name="paid_or_not[]" class="form-control" id=""> <option value="1">Ödənişli</option> <option value="0">Ödənişsiz</option> </select> </div> <div class="col-auto"> <button type="button" class="remove-stoutchild-age btn btn-outline-danger waves-effect waves-light"> <span><i class="fas fa-times"></i></span> Sil </button> </div> </section>');
        });

        $('body').on("click", ".remove-stoutchild-age", function (e) {
            e.preventDefault();
            $(this).closest('section').remove();
        })
    </script>
@endsection
