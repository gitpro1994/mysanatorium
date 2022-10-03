@extends('admin.layouts.master')
@section('page-title', 'Kredit kartları')
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
                    <a href="{{ route('admin.sanatoriums.sanatorium-credit-cards.create', ['sanatorium_id'=>$sanatorium->id]) }}">
                        <button class="btn btn-sm btn-info">
                            <span>
                                <i class="fas fa-plus"></i>
                            </span>
                            Yeni kredit kartı
                        </button>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <table id="basic-datatable" class="table dt-responsive nowrap table-bordered w-100">
                    <thead>
                        <tr>
                            <th>Endirim kartı</th>
                            <th>Başlanğıc tarixi</th>
                            <th>Bitiş tarixi</th>
                            <th>CVV</th>
                            <th>Status</th>
                            <th>Əməliyyatlar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sanatorium->getSccs as $card)
                       
                        <tr>
                            <td>
                            <ul>
                            @foreach(json_decode($card->credit_cards_id) as $data)
                                 <li> {{ getCreditCardInfo($data) }}        </li>             
                            @endforeach
                            </ul>
                            </td>
                            <td>
                                {{ $card->start_date }}
                            </td>
                            <td>
                                {{ $card->finish_date }}
                            </td>
                            <td>
                                <p class="text-{{ ($card->cvv_available==1) ? 'success' : 'danger' }}">
                                    @if($card->cvv_available==1)
                                    CVV tələb olunur
                                    @else
                                    CVV tələb olunmur
                                    @endif
                                </p>
                            </td>
                            <td class="text-center">
                            <button type="button" data-id="{{ $card->id }}" class="btn btn-sm btn-outline-{{ ($card->status==1 ? 'success' : 'danger') }} waves-effect waves-light element-status">{{ ($card->status==1 ? 'Aktiv' : 'Deaktiv') }}</button></td>
                            </td>
                            <td>
                                <a href="{{ route('admin.sanatoriums.sanatorium-credit-cards.edit-sanatorium-credit-cards', ['sanatorium_id'=>$sanatorium->id, 'card_id'=>$card->id]) }}">
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
                url:"{{ url('admin/sanatoriums/sanatorium-credit-cards/check_status') }}"+"/"+id,
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