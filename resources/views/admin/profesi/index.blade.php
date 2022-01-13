@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-body">
                    <div class="d-flex justify-content-end">
                        <a class="btn btn-sm btn-primary mb-2" href="{{ route('admin.profesi.create') }}">create</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-borderless border text-center">
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
                                @foreach($profesis as $profesi)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $profesi->user_id }}</td>
                                    <td>{{ $profesi->price_low }}</td>
                                    <td>{{ $profesi->price_medium }}</td>
                                    <td>{{ $profesi->price_high }}</td>
                                    <td>{{ $profesi->margin }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a class="bt btn-warning" href=""></a>
                                            <form action="">
                                                <button class="btn btn-sm btn-danger"></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop