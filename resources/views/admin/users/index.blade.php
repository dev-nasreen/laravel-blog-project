@extends('layout.master')
@section('title', 'All User info')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Users</h1>
    <div class="card">
        <div class="card-header">
            <h4>View Users</h4>
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
                       
                        <th>User Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->role_as == '1'? "Admin": "user"}}</td>
                        
                        <td>
                            <a href="{{url('admin/users/'.$user->id)}}" class="btn btn-success {{$user->role_as == '1'? 'disabled': ''}}">Edit</a>
                        </td>
                        <td>
                            <a href="{{url('admin/delete-user/'.$user->id)}}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$users->links()}}
        </div>
    </div>

    
</div>
@endsection

