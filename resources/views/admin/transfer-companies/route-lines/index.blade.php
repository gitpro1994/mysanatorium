@extends('admin.layouts.master')
@section('page-title', 'Marşrut xətləri')
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
                    <a href="{{ route('admin.route-lines.create') }}">
                        <button class="btn btn-sm btn-info">
                        <span>
                            <i class="fas fa-plus"></i>
                        </span>
                            Yeni marşrut xətti
                        </button>
                    </a>
                </div>


            </div>
            <div class="card-body">
                <table id="basic-datatable" class="table dt-responsive table-bordered nowrap w-100">
                    <thead>
                    <tr>
                        <th>Transfer şirkəti</th>
                        <th>Marşrut xətti</th>
                        <th>Qiymət</th>
                        <th>Status</th>
                        <th>Əməliyyatlar</th>
                    </tr>
                    </thead>


                    <tbody>
                    @foreach($route_lines as $route)
                    <tr>
                        <td>{{$route->getTransferCompany['name']}}</td>
                        <td>{{ getRouteLinesLocation($route->from) }} - {{ getRouteLinesLocation($route->to) }}</td>
                        <td>{{ $route->price }} {{ getTransferCompanyCurrencySymbol($route->getTransferCompany['id']) }}</td>
                        <td>
                            <button type="button" data-id="{{ $route->id }}" class="btn btn-sm btn-outline-{{ ($route->status==1 ? 'success' : 'danger') }} waves-effect waves-light element-status">{{ ($route->status==1 ? 'Aktiv' : 'Deaktiv') }}</button></td>
                        </td>
                        <td>
                            <a href="{{ route('admin.route-lines.edit', ['id'=>$route->id]) }}">
                                <button class="btn btn-sm btn-primary">
                                    <span>
                                        <i class="fas fa-pen"></i>
                                    </span>
                                </button>
                            </a>
                            <a href="{{ route('admin.route-lines.destroy', ['id'=>$route->id]) }}">
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

@endsection

@section('scripts')
<script>
    $(function () {
        $('.element-status').click(function (e) {
            e.preventDefault();
            var id = $(this).attr("data-id");
            $.ajax({
                url:"{{ url('admin/route-lines/check_status') }}"+"/"+id,
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
