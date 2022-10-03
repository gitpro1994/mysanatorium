@extends('admin.layouts.master')
@section('page-title', 'Otaq şəraiti')
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
                    <a href="{{ route('admin.sanatorium-features.create') }}">
                        <button class="btn btn-sm btn-info">
                        <span>
                            <i class="fas fa-plus"></i>
                        </span>
                            Yeni sanatoriya özəlliyi
                        </button>
                    </a>
                </div>


            </div>
            <div class="card-body">
                <table id="basic-datatable" class="table dt-responsive table-bordered nowrap w-100">
                    <thead>
                    <tr>
                        <th>Ad</th>
                        <th>Elementlər</th>
                        <th>Status</th>
                        <th>Əməliyyatlar</th>
                    </tr>
                    </thead>


                    <tbody>
                    @foreach($features as $feature)
                    <tr>
                        <td>{{$feature->name}}</td>
                        <td>
                            <a href="{{ route('admin.sanatorium-elements', ['sanatorium_features_id'=>$feature->id]) }}">
                                Elementlər: ({{ $feature->getSanatoriumFeaturesElements()->count() }})
                            </a>
                        </td>
                        <td>
                            <button type="button" data-id="{{ $feature->id }}" class="btn btn-sm btn-outline-{{ ($feature->status==1 ? 'success' : 'danger') }} waves-effect waves-light element-status">{{ ($feature->status==1 ? 'Aktiv' : 'Deaktiv') }}</button></td>
                        </td>
                        <td>
                            <button type="button" data-id="{{ $feature->id }}" class="btn btn-sm btn-info modal-show">
                                <span><i class="fas fa-eye"></i></span>
                            </button>

                            <a href="{{ route('admin.sanatorium-features.edit', ['id'=>$feature->id]) }}">
                                <button class="btn btn-sm btn-primary">
                                    <span>
                                        <i class="fas fa-pen"></i>
                                    </span>
                                </button>
                            </a>
                            <a href="{{ route('admin.sanatorium-features.destroy', ['id'=>$feature->id]) }}">
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
                url:"{{ url('admin/sanatorium-properties/sanatorium-features/check_status') }}"+"/"+id,
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
