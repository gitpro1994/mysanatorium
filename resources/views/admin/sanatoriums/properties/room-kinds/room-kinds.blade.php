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
                    <a href="{{ route('admin.sanatoriums.room-kinds.create', ['sanatorium_id'=>$sanatorium->id]) }}">
                        <button class="btn btn-sm btn-info">
                        <span>
                            <i class="fas fa-plus"></i>
                        </span>
                            Yeni otaq növü
                        </button>
                    </a>
                </div>


            </div>
            <div class="card-body">
                <table id="basic-datatable" class="table dt-responsive nowrap table-bordered w-100">
                    <thead>
                    <tr>
                        <th>Otaq növü</th>
                        <th>Status</th>
                        <th>Əməliyyatlar</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($sanatorium_room_kinds as $kind)
                    <tr>
                        <td>{{ $kind->getRoomKind['name'] }}</td>
                        
                        <td class="text-center">
                         <button type="button" data-id="{{ $kind->id }}" class="btn btn-sm btn-outline-{{ ($kind->status==1 ? 'success' : 'danger') }} waves-effect waves-light element-status">{{ ($kind->status==1 ? 'Aktiv' : 'Deaktiv') }}</button></td>
                        </td>
                        <td>
                            <a href="{{ route('admin.sanatoriums.room-kinds.edit-room-kind', ['id'=>$kind->id]) }}">
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
                url:"{{ url('admin/sanatoriums/room-kinds/check_room_kinds_status') }}"+"/"+id,
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
