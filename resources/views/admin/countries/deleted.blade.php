@extends('admin.layouts.master')
@section('page-title', 'Silinmiş məlumatlar')
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
                <table id="basic-datatable" class="table dt-responsive table-bordered nowrap w-100">
                    <thead>
                    <tr>
                        <th>Link</th>
                        <th>Başlıq</th>
                        <th>Qısa ad</th>
                        <th>Bayraq</th>
                        <th>Sanatoriumda istifadə</th>
                        <th>Status</th>
                        <th>Əməliyyatlar</th>
                    </tr>
                    </thead>


                    <tbody>
                    @foreach($countries as $country)
                    <tr>
                        <td>{{$country->slug}}</td>
                        <td>{{ $country->title }}</td>
                        <td>{{ $country->shortened }}</td>
                        <td>
                            <img src="{{ asset('backend/images/flags').'/'.$country->flag }}" alt="" style="height: 25px">
                        </td>
                        <td>
                            <button type="button" class="btn btn-sm btn-outline-{{ ($country->for_sanatorium==1 ? 'success' : 'danger') }} waves-effect waves-light">{{ ($country->for_sanatorium==1 ? 'İstifadə edilir' : 'İstifadə edilmir') }}</button>
                        </td>
                        <td>

                        </td>
                        <td>
                            <a href="">
                                <button class="btn btn-sm btn-info">
                                    <span>
                                        <i class="fas fa-eye"></i>
                                    </span>
                                </button>
                            </a>
                            <a href="{{ route('admin.countries.restore', ['id'=>$country->id]) }}">
                                <button class="btn btn-sm btn-warning">
                                    <span>
                                        <i class="fa fa-undo"></i>
                                    </span>
                                </button>
                            </a>

                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>

            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<!-- end row-->
@endsection

