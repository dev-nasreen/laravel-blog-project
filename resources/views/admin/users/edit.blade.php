@extends('layout.master')
@section('title', 'All User info')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Users</h1>
    <div class="card">
        <div class="card-header">
            <h4>Edit Users
                <a href="{{url('admin/users')}}" class="btn btn-danger float-end">Back</a>
            </h4>
        </div>
        <div class="card-body">
            @if(session('status'))
            <div class="alert alert-success">
                {{session('status')}}
            </div>
            @endif

            
                <div class="mb-3">
                    <label>Full name</label>
                    <p class="form-control">{{$user->name}}</p>
                </div>
                <div class="mb-3">
                    <label>Email</label>
                    <p class="form-control">{{$user->email}}</p>
                </div>
                <div class="mb-3">
                    <label>Created At</label>
                    <p class="form-control">{{$user->created_at->format('d/m/Y')}}</p>
                </div>

                <form action="{{url('admin/update-user/'.$user->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                <div class="mb-3">
                    <label>Role as</label>
                    <select name="role_as" class="form-control">
                        <option value="1" {{$user->role_as == '1'? 'selected': ''}}>Admin</option>
                        <option value="0" {{$user->role_as == '0'? 'selected': ''}}>User</option>
                        <option value="2" {{$user->role_as == '2'? 'selected': ''}}>Bolgger</option>
                    </select>
                  
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Update User Role</button>
                </div>
                 </form>
        </div>
    </div>


</div>
@endsection
