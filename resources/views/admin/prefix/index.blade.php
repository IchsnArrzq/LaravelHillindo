@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-body d-flex justify-content-center">
                    <table class="table table-hover table-borderless border text-center">
                        <thead>
                            <tr>
                                <th>prefix</th>
                                <th>range</th>
                                <th>used</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($prefixes as $prefix)
                            <tr>
                                <td>{{ $prefix->prefix }}</td>
                                <td>{{ $prefix->range }}</td>
                                <td>used</td>
                                <td>
                                   <div class="btn-group">
                                       <a href="">edit</a>
                                       <form action="">
                                           <button class="btn btn-outline-danger">delete</button>
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
@stop