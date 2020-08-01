@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Authors</h1>
            <div class="row">
            @foreach($authors as $author)
                <div class="card col-md-3">
                    <div class="card-body">
                    <h5 class="card-title">Name: {{$author->name}}</h5>
                    <p class="card-text">Last Name: {{$author->last_name}}</p>
                    <a href="/authors/{{$author->_id}}" class="btn btn-primary">View</a>
                     </div>
                </div>
                @endforeach
            </div>

        </div>
    </div>
</div>
@endsection
