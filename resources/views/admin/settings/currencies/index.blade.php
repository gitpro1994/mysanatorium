@extends('admin.layouts.master')
@section('page-title', 'Valyuta')
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
                    <a href="{{ route('admin.currencies.deleted') }}">
                        <button class="btn btn-sm btn-warning">
                        <span>
                            <i class="fas fa-trash"></i>
                        </span>
                            Silinmiş məlumatlar - {{ $deleted }}
                        </button>
                    </a>
                    <a href="{{ route('admin.currencies.create') }}">
                        <button class="btn btn-sm btn-info">
                        <span>
                            <i class="fas fa-plus"></i>
                        </span>
                            Yeni valyuta
                        </button>
                    </a>
                </div>


            </div>
            <div class="card-body">
                <table id="basic-datatable" class="table dt-responsive table-bordered nowrap w-100">
                    <thead>
                    <tr>
                        <th>Link</th>
                        <th>Kod</th>
                        <th>Başlıq</th>
                        <th>Mövcud kurs</th>
                        <th>Simvol</th>
                        <th>Status</th>
                        <th>Əməliyyatlar</th>
                    </tr>
                    </thead>


                    <tbody>
                    @foreach($currencies as $currency)
                    <tr>
                        <td>{{$currency->slug}}</td>
                        <td>{{ $currency->code }}</td>
                        <td>{{ $currency->title }}</td>
                        <td>{{ $currency->currency }}</td>
                        <td>{{ $currency->symbol }}</td>
                        <td>
                            <button type="button" data-id="{{ $currency->id }}" class="btn btn-sm btn-outline-{{ ($currency->status==1 ? 'success' : 'danger') }} waves-effect waves-light element-status">{{ ($currency->status==1 ? 'Aktiv' : 'Deaktiv') }}</button>
                        </td>
                        <td>
                            <button type="button" data-id="{{ $currency->id }}" class="btn btn-sm btn-info modal-show">
                                <span><i class="fas fa-eye"></i></span>
                            </button>

                            <a href="{{ route('admin.currencies.edit', ['id'=>$currency->id]) }}">
                                <button class="btn btn-sm btn-primary">
                                    <span>
                                        <i class="fas fa-pen"></i>
                                    </span>
                                </button>
                            </a>
                            <a href="{{ route('admin.currencies.destroy', ['id'=>$currency->id]) }}">
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


<!-- Info Alert Modal -->
<div id="info-alert-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-body p-4"></div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endsection

@section('scripts')
<script>
    $(function () {
        $('.element-status').click(function (e) {
            e.preventDefault();
            var id = $(this).attr("data-id");
            $.ajax({
                url:"{{ url('admin/currencies/check_status') }}"+"/"+id,
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
