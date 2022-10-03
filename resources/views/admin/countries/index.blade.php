@extends('admin.layouts.master')
@section('page-title', 'Ölkələr')
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
                    <a href="{{ route('admin.countries.create') }}">
                        <button class="btn btn-sm btn-info">
                            <span>
                                <i class="fas fa-plus"></i>
                            </span>
                            Yeni ölkə
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
                            <th>Şəhərlər</th>
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
                                <a href="">
                                    {{ $country->getCities()->count() }}
                                </a>
                            </td>
                            <td>
                                <img src="{{ asset('backend/images/flags').'/'.$country->flag }}" alt="" style="height: 25px">
                            </td>
                            <td>
                                <div id="status-div">
                                    <button type="button" data-id="{{ $country->id }}" class="btn btn-sm btn-outline-{{ ($country->for_sanatorium==1 ? 'success' : 'danger') }} waves-effect waves-light">{{ ($country->for_sanatorium==1 ? 'İstifadə edilir' : 'İstifadə edilmir') }}</button>
                                </div>
                            </td>
                            <td>
                                <button type="button" data-id="{{ $country->id }}" class="btn btn-sm btn-outline-{{ ($country->status==1 ? 'success' : 'danger') }} waves-effect waves-light element-status">{{ ($country->status==1 ? 'Aktiv' : 'Deaktiv') }}</button>
                            </td>
                            <td>
                                <a href="">
                                    <button class="btn btn-sm btn-info">
                                        <span>
                                            <i class="fas fa-eye"></i>
                                        </span>
                                    </button>
                                </a>
                                <a href="{{ route('admin.countries.edit', ['id'=>$country->id]) }}">
                                    <button class="btn btn-sm btn-primary">
                                        <span>
                                            <i class="fas fa-pen"></i>
                                        </span>
                                    </button>
                                </a>
                                <a onclick="return confirm('Məlumatlar silinsin? Silinən məlumatlar yalnız *Admin* tərəfindən geri qaytarıla bilər!')" href=" {{ route('admin.countries.destroy', ['id'=>$country->id]) }}">
                                    <button class="btn btn-sm btn-danger">
                                        <span>
                                            <i class="fas fa-trash"></i>
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

@section('scripts')
<script>
    $(function() {
        $('.element-status').click(function(e) {
            e.preventDefault();
            var id = $(this).attr("data-id");
            $.ajax({
                url: "{{ url('admin/countries/check_status') }}" + "/" + id,
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "id": id
                },
                success: function(response) {
                    alert(response);
                }

            })
        })
    })
</script>
@endsection