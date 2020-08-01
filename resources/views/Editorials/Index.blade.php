@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Editorials</h1>
            <div class="row">
            @foreach($editorials as $editorial)
                <div class="card col-md-3">
                    <div class="card-body">
                    <h5 class="card-title">Name: {{$editorial->name}}</h5>
                    <p class="card-text">Description: {{$editorial->description}}</p>
                    <a href="/editorials/{{$editorial->_id}}" class="btn btn-primary">View</a>
                     </div>
                </div>
                @endforeach
            </div>

        </div>
    </div>
</div>
@endsection
