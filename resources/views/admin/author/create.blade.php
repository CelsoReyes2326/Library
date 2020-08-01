@extends('admin.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Author registration</div>

                    <div class="card-body">
              <form action="{{route('admin.author.save')}}" method="post">
                            @csrf
                            <div class="form-group">
                                 <label for="usr">Author Name:</label>
                                 <input type="text" class="form-control" name="name">
                            </div>

                            <div class="form-group">
                                <label for="last_name">Last Name:</label>
                                <textarea class="form-control" rows="5" name="last_name"></textarea>
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
                    <p align="center"><button class="btn btn-success">Save</button></p>
              </form>
              
            </div>
        </div>
        </div> 
    </div>
</div>
@endsection
