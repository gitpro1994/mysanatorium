@extends('admin.layouts.master')
@section('page-title', 'Şəhərlər')
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
                    <a href="{{ route('admin.cities.create') }}">
                        <button class="btn btn-sm btn-info">
                            <span>
                                <i class="fas fa-plus"></i>
                            </span>
                            Yeni şəhər
                        </button>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <table id="basic-datatable" class="table dt-responsive table-bordered nowrap w-100">
                    <thead>
                        <tr>
                            <th>Ölkə</th>
                            <th>Link</th>
                            <th>Başlıq</th>
                            <th>Axtarış başlığı</th>
                            <th>Status</th>
                            <th>Əməliyyatlar</th>
                        </tr>
                    </thead>


                    <tbody>
                        @foreach($cities as $city)
                        <tr>
                            <td>
                                <a href="{{ route('admin.countries') }}">
                                    {{$city->getCountry['title']}}
                                </a>
                            </td>
                            <td>{{$city->slug}}</td>
                            <td>{{ $city->title }}</td>
                            <td>{{ $city->search_title }}</td>
                            <td>
                                <button type="button" data-id="{{ $city->id }}" class="btn btn-sm btn-outline-{{ ($city->status==1 ? 'success' : 'danger') }} waves-effect waves-light element-status">{{ ($city->status==1 ? 'Aktiv' : 'Deaktiv') }}</button>
                            </td>
                            <td>
                                <a href="">
                                    <button class="btn btn-sm btn-info">
                                        <span>
                                            <i class="fas fa-eye"></i>
                                        </span>
                                    </button>
                                </a>
                                <a href="{{ route('admin.cities.edit', ['id'=>$city->id]) }}">
                                    <button class="btn btn-sm btn-primary">
                                        <span>
                                            <i class="fas fa-pen"></i>
                                        </span>
                                    </button>
                                </a>
                                <a onclick="return confirm('Məlumatlar silinsin? Silinən məlumatlar yalnız *Admin* tərəfindən geri qaytarıla bilər!')" href="{{ route('admin.cities.destroy', ['id'=>$city->id]) }}">
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
                url: "{{ url('admin/cities/check_status') }}" + "/" + id,
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "id": id
                },
                success: function(response) {
                    alert(response);
                    location.reload();
                }

            })
        })
    })
</script>
@endsection