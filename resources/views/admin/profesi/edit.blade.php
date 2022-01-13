@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.profesi.update',$profesi->id) }}" id="form" method="post">
                        @csrf
                        @method('put')
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
        $('#form').submit()
    });
</script>
@endpush