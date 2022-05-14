@extends('layout.master')
@section('title', 'Blog Dashboard')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Posts</h1>
    <div class="card">
        <div class="card-header">
            <h4>View Post<a class="btn btn-primary btn-sm float-end" href="{{url('admin/add-post')}}">Add Post</a></h4>
        </div>
        <div class="card-body">
            @if(session('status'))
            <div class="alert alert-success">
                {{session('status')}}
            </div>
            @endif

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Category</th>
                        <th>Post Name</th>
                        <th>Status</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td>{{$post->category->name}}</td>
                        <td>{{$post->name}}</td>
                        <td>{{$post->status == '1'? "hidden": "visible"}}</td>
                        <td>
                            <a href="{{url('admin/edit-post/'.$post->id)}}" class="btn btn-success">Edit</a>
                        </td>
                        <td>
                            <a href="{{url('admin/delete-post/'.$post->id)}}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    
</div>
@endsection

