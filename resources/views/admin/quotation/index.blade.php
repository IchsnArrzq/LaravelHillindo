@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <a href="{{ url()->previous() }}" class="btn btn-sm btn-outline-info mb-2">back</a>
                        <a class="btn btn-sm btn-outline-primary mb-2" href="{{ route('client.quotation.show',$profesi->id) }}">create</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered border text-center" id="datatable">
                            <thead>
                                <tr>
                                    <th>no</th>
                                    <th>profesi id</th>
                                    <th>quot number</th>
                                    <th>tgl buat</th>
                                    <th>tgl disetujui</th>
                                    <th>total price</th>
                                    <th>is approve</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<input type="hidden" id="profesi_id" value="{{ $profesi->id }}">
@stop
@push('script')
<script>
    $('#datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: `/client/profesi/${$('#profesi_id').val()}`,
        columns: [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex'
            },
            {
                data: 'profesi_id',
                name: 'profesi_id'
            },
            {
                data: 'quot_number',
                name: 'quot_number'
            },
            {
                data: 'tgl_buat',
                name: 'tgl_buat'
            },
            {
                data: 'tgl_disetujui',
                name: 'tgl_disetujui'
            },
            {
                data: 'total_price',
                name: 'total_price'
            },
            {
                data: 'is_approve',
                name: 'is_approve'
            },
            {
                data: 'action',
                name: 'action'
            }
        ]
    })
</script>
@endpush