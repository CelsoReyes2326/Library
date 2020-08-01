@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Book details</div>

                    <div class="card-body">
                    @if($data)
                            @csrf
                            @method('PUT')
                             <div class="form-group">
                                 <label for="usr">Title</label>
                                 <input type="text" class="form-control" name="title" value="{{$data->title}}">
                            </div>
                            <div class="form-group">
                                 <label for="usr">ISBN</label>
                                 <input type="text" class="form-control" name="isbn" value="{{$data->isbn}}">
                            </div>
                            <div class="form-group">
                                <label for="description">Description:</label>
                                <textarea class="form-control" rows="5" name="description">{{$data->description}}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="country">Country:</label>
                                @foreach($countries as $country)
                                @if($data->country == $country->_id)
                                <input type="text" class="form-control" name="country" value="{{$country->name}}">
                                @endif
                                @endforeach 
                            </div>
                            <div class="form-group">
                                <label for="country">Language:</label>
                                @foreach($languages as $language)
                                @if($data->language == $language->_id)
                                <input type="text" class="form-control" name="language" value="{{$language->name}}">
                                @endif
                                @endforeach 
                            </div>
                            <div class="form-group">
                                <label for="author">Author:</label>
                                @foreach($authors as $author)
                                @if($data->author == $author->_id)
                                <input type="text" class="form-control" name="author" value="{{$author->name}}">
                                @endif
                                @endforeach 
                            </div>
                            <div class="form-group">
                                <label for="editorial">Editorial:</label>
                                @foreach($editorials as $editorial)
                                @if($data->editorial == $editorial->_id)
                                <input type="text" class="form-control" name="editorial" value="{{$editorial->name}}">
                                @endif
                                @endforeach 
                            </div>
                            <div class="form-group">
                                <label for="category">Category:</label>
                                @foreach($categories as $category)
                                @if($data->category == $category->_id)
                                <input type="text" class="form-control" name="category" value="{{$category->name}}">
                                @endif
                                @endforeach 
                            </div>
                            <a href="/books" class="card-link btn btn-warning">Back to the list</a>
                            @endif
            </div>
        </div>
        </div> 
    </div>
</div>
@endsection