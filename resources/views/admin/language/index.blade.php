@extends('admin.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Languages </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a class="nav-link btn btn-success" href="{{ route('admin.language.create') }}">Add new language</a>

                   <table class="table table-striped">
                   <thead>
                   <tr>
                   <th>No</th>
                   <th>Language Name</th>
                   <th>Description</th>
                   <th>Options</th>
                   </tr>
                   </thead>
                   <tbody>
                   <?php $no=1; ?>
                   @foreach($posts as $post)
                   
                   <tr>
                   <td>{{$no}}</td>
                   <td>{{$post->name}}</td>
                   <td>{{$post->description}}</td>
                   <td>
                   <a href="{{route('admin.language.form',$post->_id)}}" class="btn btn-warning btn-sm">Update</a>
                   <a href="{{route('admin.language.details',$post->_id)}}" class="btn btn-info btn-sm">Details</a>

                   <a href="{{route('admin.language.delete',$post->_id)}}" onclick="return confirm('Are you sure want to delete this record?')" class="btn btn-danger btn-sm">Delete</a>
                   
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

