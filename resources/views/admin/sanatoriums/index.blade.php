@extends('admin.layouts.master')
@section('page-title', 'Sanatoriyalar')
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
                    <a href="{{ route('admin.sanatoriums.create') }}">
                        <button class="btn btn-sm btn-info">
                            <span>
                                <i class="fas fa-plus"></i>
                            </span>
                            Yeni sanatoriya
                        </button>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <table id="basic-datatable" class="table dt-responsive table-bordered nowrap w-100">
                    <thead>
                        <tr>
                            <th>Ölkə(Şəhər)</th>
                            <th>Ad</th>
                            <th>Menu</th>
                            <th>Status</th>
                            <th>Əməliyyatlar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sanatoriums as $sanatorium)
                        <tr>

                            <td>
                                {{ $sanatorium->getCountry['title'] }} ({{ $sanatorium->getCity['title'] }})
                            </td>
                            <td>{{ $sanatorium->name }}</td>
                            <td>
                                <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#standard-modal-{{ $sanatorium->id }}">Menu</button>
                                <div id="standard-modal-{{ $sanatorium->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="standard-modalLabel">{{$sanatorium->name}}</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <a href="{{ route('admin.discount', ['sanatorium_id'=>$sanatorium->id]) }}" class="mt-2">
                                                        <button class="w-100 btn btn-outline-primary">Endirim</button>
                                                    </a>
                                                    <a href="{{ route('admin.penalty', ['sanatorium_id'=>$sanatorium->id]) }}" class="mt-2">
                                                        <button class="w-100 btn btn-outline-primary">Cərimələr</button>
                                                    </a>
                                                    <a href="{{ route('admin.sanatoriums.medical-bases', ['sanatorium_id'=>$sanatorium->id]) }}" class="mt-2">
                                                        <button class="w-100 btn btn-outline-primary">Müalicə növləri</button>
                                                    </a>
                                                    <a href="{{  route('admin.sanatoriums.room-kinds', ['sanatorium_id'=>$sanatorium->id])  }}" class="mt-2">
                                                        <button class="w-100 btn btn-outline-primary">Müalicə otaqları</button>
                                                    </a>
                                                    <a href="" class="mt-2">
                                                        <button class="w-100 btn btn-outline-primary">Müalicə istiqamətləri</button>
                                                    </a>
                                                    <a href="" class="mt-2">
                                                        <button class="w-100 btn btn-outline-primary">Otaq növləri</button>
                                                    </a>
                                                    <a href="{{ route('admin.sanatoriums.price', ['sanatorium_id'=>$sanatorium->id]) }}" class="mt-2">
                                                        <button class="w-100 btn btn-outline-primary">Qiymət</button>
                                                    </a>
                                                    <a href="{{ route('admin.sanatoriums.sanatorium-credit-cards', ['sanatorium_id'=>$sanatorium->id]) }}" class="mt-2">
                                                        <button class="w-100 btn btn-outline-primary">Kartlar</button>
                                                    </a>
                                                    <a href="{{ route('admin.sanatoriums.wizarts', ['sanatorium_id'=>$sanatorium->id]) }}" class="mt-2">
                                                        <button class="w-100 btn btn-outline-primary">Wizart</button>
                                                    </a>
                                                    <a href="{{ route('admin.sanatoriums.children', ['sanatorium_id'=>$sanatorium->id]) }}" class="mt-2">
                                                        <button class="w-100 btn btn-outline-primary">Maksimum yaş (Uşaqlar üçün)</button>
                                                    </a>
                                                    <a href="" class="mt-2">
                                                        <button class="w-100 btn btn-outline-primary">Rezerv cədvəli</button>
                                                    </a>
                                                    <a href="" class="mt-2">
                                                        <button class="w-100 btn btn-outline-primary">Sanatorium parametrləri</button>
                                                    </a>
                                                    <a href="{{ route('admin.sanatoriums.comments', ['sanatorium_id'=>$sanatorium->id]) }}" class="mt-2">
                                                        <button class="w-100 btn btn-outline-primary">Rəylər</button>
                                                    </a>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Bağla</button>
                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->

                            </td>
                            <td>
                                <div id="status-div">
                                    <button type="button" data-id="{{ $sanatorium->id }}" class="btn btn-sm btn-outline-{{ ($sanatorium->status==1 ? 'success' : 'danger') }} waves-effect waves-light element-status">{{ ($sanatorium->status==1 ? 'Aktiv' : 'Deaktiv') }}</button>
                                </div>
                            </td>
                            <td>
                                <a href="">
                                    <button class="btn btn-sm btn-info">
                                        <span>
                                            <i class="fas fa-eye"></i>
                                        </span>
                                    </button>
                                </a>
                                <a href="{{ route('admin.sanatoriums.edit', ['id'=>$sanatorium->id]) }}">
                                    <button class="btn btn-sm btn-primary">
                                        <span>
                                            <i class="fas fa-pen"></i>
                                        </span>
                                    </button>
                                </a>
                                <a href="{{ route('admin.sanatoriums.destroy', ['id'=>$sanatorium->id]) }}">
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
                url: "{{ url('admin/sanatoriums/check_status') }}" + "/" + id,
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