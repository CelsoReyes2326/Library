@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Author details</div>

                    <div class="card-body">
                    @if($data)
                            @csrf
                            @method('PUT')
                             <div class="form-group">
                                 <label for="usr">Title</label>
                                 <input type="text" class="form-control" name="name" value="{{$data->name}}">
                            </div>
                            <div class="form-group">
                                 <label for="usr">ISBN</label>
                                 <input type="text" class="form-control" name="last_name" value="{{$data->last_name}}">
                            </div>
                        

                            <div class="form-group">
                                <label for="country">Country:</label>
                                @foreach($countries as $country)
                                @if($data->country == $country->_id)
                                <input type="text" class="form-control" name="country" value="{{$country->name}}">
                                @endif
                                @endforeach 
                            </div>
                           
                            <a href="/authors" class="card-link btn btn-warning">Back to the list</a>
                            @endif
            </div>
        </div>
        </div> 
    </div>
</div>
@endsection