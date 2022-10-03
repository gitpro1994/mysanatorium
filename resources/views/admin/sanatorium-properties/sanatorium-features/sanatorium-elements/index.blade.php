@extends('admin.layouts.master')
@section('page-title', 'Elementlər')
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
                    <h4 class="text-primary">{{ $features->name }}</h4>
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
                    <a href="{{ route('admin.sanatorium-elements.create', ['sanatorium_features_id'=>$features->id]) }}">
                        <button class="btn btn-sm btn-info">
                        <span>
                            <i class="fas fa-plus"></i>
                        </span>
                            Yeni element
                        </button>
                    </a>
                </div>


            </div>
            <div class="card-body">
                <table id="basic-datatable" class="table dt-responsive table-bordered nowrap w-100">
                    <thead>
                    <tr>
                        <th>Ad</th>
                        <th>Status</th>
                        <th>Əməliyyatlar</th>
                    </tr>
                    </thead>


                    <tbody>
                    @foreach($elements as $element)
                    <tr>
                        <td>{{$element->name}}</td>
                        <td>
                            <button type="button" data-id="{{ $element->id }}" class="btn btn-sm btn-outline-{{ ($element->status==1 ? 'success' : 'danger') }} waves-effect waves-light element-status">{{ ($element->status==1 ? 'Aktiv' : 'Deaktiv') }}</button></td>
                        </td>
                        <td>
                            <button class="btn btn-sm btn-info">
                                    <span>
                                        <i class="fas fa-eye"></i>
                                    </span>
                            </button>

                            <a href="{{ route('admin.sanatorium-elements.edit', ['id'=>$element->id]) }}">
                                <button class="btn btn-sm btn-primary">
                                    <span>
                                        <i class="fas fa-pen"></i>
                                    </span>
                                </button>
                            </a>
                            <a href="{{ route('admin.sanatorium-elements.destroy', ['id'=>$element->id]) }}">
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
                url:"{{ url('admin/elements/check_status') }}"+"/"+id,
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
