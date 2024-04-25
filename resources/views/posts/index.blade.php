@extends('layouts.app')

@section('title',"List All Posts")
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
    <button type="button" class="btn btn-success" onclick="window.location.href='/posts/create'">Create</button>

<div class="container">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Body</th>
                <th>Posted By</th>
                <th>image</th>
                <th>slug</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($posts as $post)
            <tr>
                <td>{{$post['id']}}</td>
                <td>{{$post['title']}}</td>
                <td>{{$post['body']}}</td>
                <td>{{$post->user?->name}}</td>
                {{-- <td><img src="{{$post['image']}}"></td> --}}
                <td>
                    @if($post->image)
                        <img src="{{ asset('storage/images/' . $post->image) }}" alt="post_image" style="max-width: 100px;">
                    @else
                        No image available
                    @endif
                </td>
                 <td>{{$post['slug']}}</td>
                <td><a href="/posts/{{$post['id']}}" class="btn btn-primary">View</a></td>
                <td><a href="/posts/{{$post['id']}}/edit" class="btn btn-warning">Edit</a></td>
                <td>
                    <form action="/posts/{{$post['id']}}" method="post">
                        @method("delete")
                        @csrf
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $posts->links()}}
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
@endsection
</body>

</html>

