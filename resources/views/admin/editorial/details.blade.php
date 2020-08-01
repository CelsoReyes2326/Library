@extends('admin.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editorial details</div>

                    <div class="card-body">
                    @if($data)
                            @csrf
                            @method('PUT')
                             <div class="form-group">
                                 <label for="usr">Editorial Name:</label>
                                 <input type="text" class="form-control" name="name" value="{{$data->name}}">
                            </div>
                            <div class="form-group">
                                 <label for="usr">Description:</label>
                                 <input type="text" class="form-control" name="description" value="{{$data->description}}">
                            </div>
                            <div class="form-group">
                                <label for="country">Country:</label>
                                @foreach($countries as $country)
                                @if($data->country == $country->_id)
                                <input type="text" class="form-control" name="country" value="{{$country->name}}">
                                @endif
                                @endforeach 
                            </div>
                            <a class="nav-link btn btn-success" href="{{ route('admin.editorial.index') }}">Back to the list</a>
                            @endif
            </div>
        </div>
        </div> 
    </div>
</div>
@endsection