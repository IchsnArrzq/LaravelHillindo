@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-center">
        <div class="col-md-10">
            <div class="card shadow">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <a href="{{ url()->previous() }}" class="btn btn-sm btn-outline-info mb-2">back</a>
                        <a class="btn btn-sm btn-outline-primary mb-2" href="{{ route('client.quotation.show',$profesi->id) }}">create</a>
                    </div>
                    <form action="" method="post">
                        @include('client.quotation.form')
                    </form>
                </div>
                <div class="card-footer d-flex justify-content-end">
                    <button class="btn btn-sm btn-outline-primary">submit</button>
                </div>
            </div>
        </div>
    </div>
</div>
@stop