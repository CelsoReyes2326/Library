@extends('admin.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Country registration</div>

                    <div class="card-body">
              <form action="{{route('admin.country.save')}}" method="post">
                            @csrf
                             <div class="form-group">
                                 <label for="usr">Country Name:</label>
                                 <input type="text" class="form-control" name="name">
                            </div>
                            <div class="form-group">
                                <label for="description">Description:</label>
                                <textarea class="form-control" rows="5" name="description"></textarea>
                            </div>
                    <p align="center"><button class="btn btn-success">Save</button></p>
              </form>
              
            </div>
        </div>
        </div> 
    </div>
</div>
@endsection
