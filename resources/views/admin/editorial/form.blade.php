@extends('admin.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editorial Update</div>

                    <div class="card-body">
                    @if($data)
                       
                        <form action="{{route('admin.editorial.update', $data->_id)}}" method="post">
                            @csrf
                            @method('PUT')
                             <div class="form-group">
                                 <label for="usr">Editorial Name:</label>
                                 <input type="text" class="form-control" name="name" value="{{$data->name}}">
                            </div>
                            <div class="form-group">
                                <label for="country">Country</label>
                                <select name="country" id="country"  class="form-control" >
                                <option value="0">Select a country...</option>
                                    @foreach($countries as $country)
                                    <option value="{{ $country->_id }}">{{$country->name}}</option>
                                    @endforeach
                                    </select>
                         </div>

                            <div class="form-group">
                                <label for="description">Description:</label>
                                <textarea class="form-control" rows="5" name="description">{{$data->description}}</textarea>
                            </div>
                    <p align="center"><button class="btn btn-success">Save Changes</button></p>
              </form>
              @endif
            </div>
        </div>
        </div> 
    </div>
</div>
@endsection
