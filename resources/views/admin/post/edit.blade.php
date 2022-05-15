@extends('layout.master')
@section('title', 'Blog Dashboard')
@section('content')
<div class="container-fluid px-4">


    <div class="card mt-4">
        @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
            <div>
                {{$error}}
            </div>
            @endforeach
        </div>
        @endif
        <div class="card-header">
            <h4>Edit Post<a class="btn btn-danger btn-sm float-end" href="{{url('admin/posts')}}">Back</a></h4>

        </div>
        <div class="card-body">
            <form action="{{url('admin/update-post/'.$post->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="">Category</label>
                    <select name="category_id" class="form-control">
                        @foreach ($category as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label>Post Name</label>
                    <input type="text" name="name" class="form-control" value="{{$post->name}}" />
                </div>
                <div class="mb-3">
                    <label>slug</label>
                    <input type="text" name="slug" class="form-control" value="{{$post->slug}}"/>
                </div>
                <div class="mb-3">
                    <label>Description</label>
                    <textarea name="description" id="my_summernote" class="form-control" rows="4">{!! $post->description !!}</textarea>
                </div>
                <div class="mb-3">
                    <label>Youtube Iframe link</label>
                    <input type="text" name="yt_iframe" class="form-control" value="{{$post->yt_iframe}}"/>
                </div>
                <h4>SEO Tags</h4>
                <div class="mb-3">
                    <label>Meta Title</label>
                    <input type="text" name="meta_title" class="form-control" value="{{$post->meta_title}}" />
                </div>
                <div class="mb-3">
                    <label>Meta Description</label>
                    <textarea name="meta_description" class="form-control" rows="3">{!! $post->meta_description !!}</textarea>
                </div>
                <div class="mb-3">
                    <label>Meta Keyword</label>
                    <textarea name="meta_keyword" class="form-control" rows="3">{!! $post->meta_keyword !!}</textarea>
                </div>

                <h4>Status</h4>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for=""> Status</label>
                        <input type="checkbox" name="status" {{$post->status == '1' ? 'checked': ''}}/>
                    </div>

                    <div class="col-md-8">
                        <button type="submit" class="btn btn-primary">Update Post</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @endsection
