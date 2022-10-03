@extends('admin.layouts.master')
@section('page-title', 'Müalicə növləri')
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
                    {{ $sanatorium['name'] }}
                    <input type="hidden" value="{{ $sanatorium['id'] }}" name="sanatorium_id" id="sanatorium_id">
                </div>
                <div class="float-end">
                    <a href="{{ route('admin.medical-base.create') }}">
                        <button class="btn btn-sm btn-info">
                        <span>
                            <i class="fas fa-plus"></i>
                        </span>
                            Yeni müalicə növü
                        </button>
                    </a>
                </div>


            </div>
            <div class="card-body">
                <table id="basic-datatable" class="table dt-responsive nowrap table-bordered w-100">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Müalicə bazası</th>
                        <th>Elementlər</th>
                        <th>Sanatoriumda istifadə</th>
                        <th>Əməliyyatlar</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($medical_bases_elements as $key => $medical)
                    <tr>
                        <td>{{ $medical->id }}</td>
                        <td>{{ $medical->getMedicalBase['name'] }}</td>
                        <td>{{ $medical->name }}</td>
                        <td class="text-center">
                        <button class="btn element-available" data-id="{{ $medical->id }}">
                            <span  class="status-color-{{ $medical->id }} text-{{ (check_available($sanatorium->id, $medical->id)=='yes' ? 'success' : 'danger') }}">
                            <i class="element-icon-{{ $medical->id }} fas fa-{{ (check_available($sanatorium->id, $medical->id)=='yes' ? 'check' : 'times')  }}"></i>
                        </span>
                        </button>
                        </td>
                        <td>
                            <a href="{{ route('admin.medical-base.edit', ['id'=>$medical->id]) }}">
                                <button class="btn btn-sm btn-primary">
                                                    <span>
                                                        <i class="fas fa-pen"></i>
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
                url:"{{ url('admin/sanatorium-properties/medical-base/check_status') }}"+"/"+id,
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

    $(document).ready({
        // $('.element-available').click(function (e) {
        //     e.preventDefault();
        //     var element_id = $(this).attr('data-id');
        //     var sanatorium_id = $('#sanatorium_id').val());
        //     alert(element_id);
        //        // url:"{{ url('admin/sanatoriums/medical-bases') }}"+"/"+element_id+"/"+sanatorium_id,
        // })
    })

    $(function() {
        $('.element-available').click(function(e){
            e.preventDefault();
            var element_id = $(this).attr("data-id");
            var sanatorium_id = $('#sanatorium_id').val();
            
            $.ajax({
            type: "GET",
            url:"{{ url('admin/sanatoriums/medical-bases') }}"+"/"+element_id+"/"+sanatorium_id,
            data: {
                "element_id":element_id,
                "sanatorium_id":sanatorium_id
            },
            success: function(data){
                if(data=="deleted")
                {
                    $('.element-icon-'+element_id).addClass('fa-times').removeClass('fa-check');
                    $('.status-color-'+element_id).addClass('text-danger').removeClass('text-success');
                }
                else
                {
                    $('.element-icon-'+element_id).addClass('fa-check').removeClass('fa-times');
                    $('.status-color-'+element_id).addClass('text-success').removeClass('text-danger');
                }
            }
            });
            
        })
    });

    

</script>
@endsection
