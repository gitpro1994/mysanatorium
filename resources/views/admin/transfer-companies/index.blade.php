@extends('admin.layouts.master')
@section('page-title', 'Transfer şirkətləri')
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
                    <a href="{{ route('admin.transfer-companies.deleted') }}">
                        <button class="btn btn-sm btn-warning">
                        <span>
                            <i class="fas fa-trash"></i>
                        </span>
                            Silinmiş məlumatlar - {{ $deleted }}
                        </button>
                    </a>
                    <a href="{{ route('admin.transfer-companies.create') }}">
                        <button class="btn btn-sm btn-info">
                        <span>
                            <i class="fas fa-plus"></i>
                        </span>
                            Yeni transfer şirkəti
                        </button>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <table id="basic-datatable" class="table dt-responsive table-bordered nowrap w-100">
                    <thead>
                    <tr>
                        <th>Ölkə (Şəhər)</th>
                        <th>Ad</th>
                        <th>Çatdırılma ünvanları</th>
                        <th>Marşrut xətləri</th>
                        <th>Status</th>
                        <th>Əməliyyatlar</th>
                    </tr>
                    </thead>


                    <tbody>
                    @foreach($transfer_companies as $company)
                    <tr>
                        <td>{{$company->getCountry['title']}} ({{ $company->getCity['title'] }})</td>
                        <td>{{ $company->name }}</td>
                        <td>
                            <a href="{{ route('admin.routes', ['country_id'=>$company->country_id]) }}">
                                Ünvanlar ({{ countRoutesByCountry($company->country_id) }})
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('admin.route-lines', ['company_id'=>$company->id]) }}">
                                Marşrut xətləri ({{ countRouteLinesByCompany($company->id) }})
                            </a>
                        </td>
                        <td>
                            <button type="button" data-id="{{ $company->id }}" class="btn btn-sm btn-outline-{{ ($company->status==1 ? 'success' : 'danger') }} waves-effect waves-light element-status">{{ ($company->status==1 ? 'Aktiv' : 'Deaktiv') }}</button></td>
                        </td>
                        <td>
                            <a href="">
                                <button class="btn btn-sm btn-info">
                                    <span>
                                        <i class="fas fa-eye"></i>
                                    </span>
                                </button>
                            </a>
                            <a href="{{ route('admin.transfer-companies.edit', ['id'=>$company->id]) }}">
                                <button class="btn btn-sm btn-primary">
                                    <span>
                                        <i class="fas fa-pen"></i>
                                    </span>
                                </button>
                            </a>
                            <a href="{{ route('admin.transfer-companies.destroy', ['id'=>$company->id]) }}">
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
    $(function () {
        $('.element-status').click(function (e) {
            e.preventDefault();
            var id = $(this).attr("data-id");
            $.ajax({
                url:"{{ url('admin/transfer-companies/check_status') }}"+"/"+id,
                type:"POST",
                data:{
                    "_token": "{{ csrf_token() }}",
                    "id":id
                },
                success:function(response)
                {
                    alert(response);
                    location.reload();
                }

            })
        })
    })
</script>
@endsection

