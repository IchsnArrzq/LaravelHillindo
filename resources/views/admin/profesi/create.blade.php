@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.profesi.store') }}" id="form" method="post">
                        @csrf
                        @include('admin.profesi.form')
                    </form>
                </div>
                <div class="card-footer d-flex justify-content-end">
                    <button id="submit" class="btn btn-sm btn-primary">submit</button>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@push('script')
<script>
    $('#submit').click(function(e) {
        e.preventDefault()
        $('#price_low').val($('#price_low').val().replaceAll(',', ''))
        $('#price_medium').val($('#price_medium').val().replaceAll(',', ''))
        $('#price_high').val($('#price_high').val().replaceAll(',', ''))
        $('#margin').val($('#margin').val().replaceAll(',', ''))
        $('#form').submit()
    });
</script>
@endpush