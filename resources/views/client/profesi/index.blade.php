@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-center">
        <div class="col-md-10">
            <div class="card shadow">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered border text-center" id="datatable">
                            <thead>
                                <tr>
                                    <th>no</th>
                                    <th>user</th>
                                    <th>name</th>
                                    <th>price low</th>
                                    <th>price medium</th>
                                    <th>price high</th>
                                    <th>margin</th>
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
@stop
@push('script')
<script>
    $('#datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: '/client/profesi',
        columns: [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex'
            },
            {
                data: 'user_id',
                name: 'user_id'
            },
            {
                data: 'name',
                name: 'name'
            },
            {
                data: 'price_low',
                name: 'price_low'
            },
            {
                data: 'price_medium',
                name: 'price_medium'
            },
            {
                data: 'price_high',
                name: 'price_high'
            },
            {
                data: 'margin',
                name: 'margin'
            },
            {
                data: 'action',
                name: 'action'
            }
        ]
    })
</script>
@endpush