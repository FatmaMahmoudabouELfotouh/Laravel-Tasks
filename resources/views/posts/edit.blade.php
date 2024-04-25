@extends('layouts.app')

@section('title',"Edit Post")
@section('content')



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <form action="/posts/{{$post['id']}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{$post['title']}}" placeholder="Title">
        </div>
        <div class="mb-3">
            <label for="body" class="form-label">Body</label>
            <input type="text" class="form-control" id="body" name="body" value="{{$post['body']}}" placeholder="Body">
        </div>
        <div class="mb-3">
            <label for="user_name" class="form-label">Post By</label>
            <input type="text" class="form-control" id="user_name" name="user_id" value="{{$post->user_id}}" placeholder="User Name">
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>
        <button type="submit" class="btn btn-primary">Edit post</button>
    </form>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
@endsection
</body>
</html>

