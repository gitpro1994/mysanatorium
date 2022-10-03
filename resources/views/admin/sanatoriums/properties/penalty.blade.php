@extends('admin.layouts.master')
@section('page-title', 'Cərimələr')
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
                    <h3>{{ $sanatorium->name }}</h3>
                </div>
                <div class="float-end">
                    <a href="{{ route('admin.sanatoriums') }}">
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
                <div class="table-responsive">
                    <form action="{{ route('admin.update_penalty', ['id'=>$sanatorium->id]) }}" method="POST">
                        @csrf
                    <table class="table table-centered table-borderless mb-0">
                        <tbody>
                        <tr>
                            <td>0-2 gün əvvəl</td>
                            <td>
                                <input type="hidden" value="{{ $sanatorium->id }}" name="sanatoriums_id" id="">
                                <div class="input-group mb-3 w-25">
                                    <input type="text" class="form-control" name="before_0_2_days" value="{{ (isset($penalty->before_0_2_days)) ? $penalty->before_0_2_days : '0' }}"  aria-label="Amount (to the nearest dollar)">
                                    <span class="input-group-text" id="basic-addon1">%</span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>3-7 gün əvvəl</td>
                            <td>
                                <div class="input-group mb-3 w-25">
                                <input type="text" class="form-control  w-25" name="before_3_7_days" value="{{ (isset($penalty->before_3_7_days)) ? $penalty->before_3_7_days : '0' }}"  aria-label="Amount (to the nearest dollar)">
                                    <span class="input-group-text" id="basic-addon1">%</span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>8-15 gün əvvəl</td>
                            <td>
                                <div class="input-group mb-3 w-25">
                                <input type="text" class="form-control w-25" name="before_8_14_days" value="{{ (isset($penalty->before_8_14_days)) ? $penalty->before_8_14_days : '0' }}"  aria-label="Amount (to the nearest dollar)">
                                    <span class="input-group-text" id="basic-addon1">%</span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>16-21 gün əvvəl</td>
                            <td>
                                <div class="input-group mb-3 w-25">
                                <input type="text" class="form-control w-25" name="before_15_21_days" value="{{ (isset($penalty->before_15_21_days)) ? $penalty->before_15_21_days : '0' }}"  aria-label="Amount (to the nearest dollar)">
                                    <span class="input-group-text" id="basic-addon1">%</span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>22-28 gün əvvəl</td>
                            <td>
                                <div class="input-group mb-3 w-25">
                                <input type="text" class="form-control w-25" name="before_22_28_days" value="{{ (isset($penalty->before_22_28_days)) ? $penalty->before_22_28_days : '0' }}"  aria-label="Amount (to the nearest dollar)">
                                    <span class="input-group-text" id="basic-addon1">%</span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>29-... gün əvvəl</td>
                            <td>
                                <div class="input-group mb-3 w-25">
                                <input type="text" class="form-control w-25" name="before_29_days" value="{{ (isset($penalty->before_29_days)) ? $penalty->before_29_days : '0' }}"  aria-label="Amount (to the nearest dollar)">
                                    <span class="input-group-text" id="basic-addon1">%</span>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="6" class="float-start">
                                <button class="btn btn-sm btn-success">Yadda saxla</button>
                            </td>

                        </tr>
                        </tfoot>
                    </table>
                    </form>
                </div>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

@endsection
<!-- end row-->

