@extends('admin.app')

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
                                 <label for="usr">Author Name:</label>
                                 <input type="text" class="form-control" name="name" value="{{$data->name}}">
                            </div>

                            <div class="form-group">
                                 <label for="usr">Last Name:</label>
                                 <input type="text" class="form-control" name="name" value="{{$data->last_name}}">
                            </div>
                            <div class="form-group">
                                <label for="country">Country:</label>
                                @foreach($countries as $country)
                                @if($data->country == $country->_id)
                                <input type="text" class="form-control" name="country" value="{{$country->name}}">
                                @endif
                                @endforeach 
                            </div>
                            <a class="nav-link btn btn-success" href="{{ route('admin.author.index') }}">Back to the list</a>
                            @endif
            </div>
        </div>
        </div> 
    </div>
</div>
@endsection