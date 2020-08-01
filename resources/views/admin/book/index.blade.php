@extends('admin.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><b>Books</b> </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a class="nav-link btn btn-success" href="{{ route('admin.book.create') }}">Add new Book</a>

                   <table class="table table-striped">
                   <thead>
                   <tr>
                   <th>No</th>
                   <th>Title</th>

                   <th>ISBN</th>
                   
                   <th>Options</th>
                   </tr>
                   </thead>
                   <tbody>
                   <?php $no=1; ?>
                   @foreach($posts as $post)
                   
                   <tr>
                   <td>{{$no}}</td>
                   <td>{{$post->title}}</td>
                   <td>{{$post->isbn}}</td>
                   <td>
                   <a href="{{route('admin.book.form',$post->_id)}}" class="btn btn-warning btn-sm">Update</a>
                   <a href="{{route('admin.book.details',$post->_id)}}" class="btn btn-info btn-sm">Details</a>

                   <a href="{{route('admin.book.delete',$post->_id)}}" onclick="return confirm('Are you sure want to delete this record?')" class="btn btn-danger btn-sm">Delete</a>
                   
                   </td>
                   </tr>
                   <?php $no++; ?>
                   @endforeach
                  
                   </tbody>
                   </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

