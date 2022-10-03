@extends('admin.layouts.master')
@section('page-title', 'Endirimlər')
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
                    {{ $sanatorium->name }}
                    <input type="hidden" value="{{ $sanatorium->id }}" name="sanatorium_id" id="sanatorium_id">
                </div>
                <div class="float-end">
                    <a href="{{ route('admin.sanatoriums.discount-options.create', ['sanatorium_id'=>$sanatorium->id]) }}">
                        <button class="btn btn-sm btn-info">
                            <span>
                                <i class="fas fa-plus"></i>
                            </span>
                            Yeni endirim paketi
                        </button>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <table id="basic-datatable" class="table dt-responsive nowrap table-bordered w-100">
                    <thead>
                        <tr>
                            <th>Endirim paketi adı</th>
                            <th>Başlanğıc tarixi</th>
                            <th>Bitiş tarixi</th>
                            <th>Endirim faizi</th>
                            <th>Status</th>
                            <th>Əməliyyatlar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sanatorium->getDiscountOptions as $discount)
                        <tr>
                            <td>{{ $discount->getDiscount['discount_name'] }}</td>
                            <td>
                                {{ $discount->start_date }}
                            </td>
                            <td>
                                {{ $discount->finish_date }}
                            </td>
                            <td>
                                {{ $discount->discount }} %
                            </td>
                            <td>
                                <a href="{{ route('admin.medical-base.edit', ['id'=>$discount->id]) }}">
                                    <button class="btn btn-sm btn-success">
                                        <span>
                                            <i class="fas fa-check"></i>
                                        </span>
                                    </button>
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('admin.medical-base.edit', ['id'=>$discount->id]) }}">
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
    $(function() {
        $('.element-available').click(function(e) {
            e.preventDefault();
            var element_id = $(this).attr("data-id");
            var sanatorium_id = $('#sanatorium_id').val();

            $.ajax({
                type: "GET",
                url: "{{ url('admin/sanatoriums/discounts') }}" + "/" + element_id + "/" + sanatorium_id,
                data: {
                    "element_id": element_id,
                    "sanatorium_id": sanatorium_id
                },
                success: function(data) {
                    if (data == "deleted") {
                        $('.element-icon-' + element_id).addClass('fa-times').removeClass('fa-check');
                        $('.status-color-' + element_id).addClass('text-danger').removeClass('text-success');
                    } else {
                        $('.element-icon-' + element_id).addClass('fa-check').removeClass('fa-times');
                        $('.status-color-' + element_id).addClass('text-success').removeClass('text-danger');
                    }
                }
            });

        })
    });
</script>
@endsection