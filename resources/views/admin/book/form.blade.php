@extends('admin.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Book Update</div>

                    <div class="card-body">
                    @if($data)
                       
                        <form action="{{route('admin.book.update', $data->_id)}}" method="post">
                            @csrf
                            @method('PUT')
                             <div class="form-group">
                                 <label for="usr">Book Title</label>
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
            <label for="country">Country</label>
            <select name="country" id="country"  class="form-control" >
            <option value="0">Select a country...</option>
                @foreach($countries as $country)
                <option value="{{ $country->_id }}">{{$country->name}}</option>
                @endforeach
                </select>
            </div>

            <div class="form-group">
            <label for="language">Language</label>
            <select name="language" id="language"  class="form-control" >
            <option value="0">Select a language...</option>
                @foreach($languages as $language)
                <option value="{{ $language->_id }}">{{$language->name}}</option>
                @endforeach
                </select>
            </div>
            <div class="form-group">
            <label for="author">Author</label>
            <select name="author" id="author"  class="form-control" >
            <option value="0">Select a author...</option>
                @foreach($authors as $author)
                <option value="{{ $author->_id }}">{{$author->name}}</option>
                @endforeach
                </select>
            </div>

            <div class="form-group">
            <label for="editorial">Editorial</label>
            <select name="editorial" id="editorial"  class="form-control" >
            <option value="0">Select a editorial...</option>
                @foreach($editorials as $editorial)
                <option value="{{ $editorial->_id }}">{{$editorial->name}}</option>
                @endforeach
                </select>
            </div>
            <div class="form-group">
            <label for="category">Category</label>
            <select name="category" id="category"  class="form-control" >
            <option value="0">Select a category...</option>
                @foreach($categories as $category)
                <option value="{{ $category->_id }}">{{$category->name}}</option>
                @endforeach
                </select>
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
