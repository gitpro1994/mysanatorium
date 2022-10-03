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
                        <th>Transfer şirkəti</th>
                        <th>Marşrut xətti</th>
                        <th>Qiymət</th>
                        <th>Status</th>
                        <th>Əməliyyatlar</th>
                    </tr>
                    </thead>


                    <tbody>
                    @foreach($routes as $route)
                    <tr>
                        <td>{{$route->getTransferCompany['name']}}</td>
                        <td>{{ getRouteLinesLocation($route->from) }} - {{ getRouteLinesLocation($route->to) }}</td>
                        <td>{{ $route->price }} {{ getTransferCompanyCurrencySymbol($route->getTransferCompany['id']) }}</td>
                        <td>

                        </td>
                        <td>
                            <a href="{{ route('admin.route-lines.restore', ['id'=>$route->id]) }}">
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

@section('scripts')
<script>
    $(document).ready(function() {
        $('#basic-datatable').DataTable();
    } );
</script>
@endsection
