@extends('admin.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Category details</div>

                    <div class="card-body">
                    @if($data)
                            @csrf
                            @method('PUT')
                             <div class="form-group">
                                 <label for="usr">Category Name:</label>
                                 <input type="text" class="form-control" name="name" value="{{$data->name}}">
                            </div>
                            <div class="form-group">
                                <label for="description">Description:</label>
                                <textarea class="form-control" rows="5" name="description">{{$data->description}}</textarea>
                            </div>
                            <a class="nav-link btn btn-success" href="{{ route('admin.category.index') }}">Back to the list</a>
                            @endif
            </div>
        </div>
        </div> 
    </div>
</div>
@endsection