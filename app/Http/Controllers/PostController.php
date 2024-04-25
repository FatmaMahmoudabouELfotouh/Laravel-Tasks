<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\Http\Requests\StorePostRequest;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(10);
        return view("posts.index", ["posts" => $posts]);
    }

    public function create()
    {
        return view("posts.create");
    }

    public function store(StorePostRequest $request)
    {
        $imageName = time() . '.' . $request->image->extension();
        $request->image->storeAs('public/images', $imageName);

        Post::create([
            "title" => $request->title,
            "body" => $request->body,
            "user_id" => $request->user_id,
            "image" => $imageName
        ]);

        return redirect("/posts");
    }

    public function show($id)
    {
        $post = Post::find($id);
        return view("posts.show", ["post" => $post]);
    }

    public function edit($id)
    {
        $post = Post::find($id);
        return view("posts.edit", ["post" => $post]);
    }

    public function update($id, Request $request)
    {
        $post = Post::find($id);
        $post->title = $request->title;
        $post->body = $request->body;
        $post->user_id = $request->user_id;

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->storeAs('public/images', $imageName);
            $post->image = $imageName;
        }

        $post->save();
        return redirect("/posts");
    }

    public function destroy($id)
    {
        Post::destroy($id);
        return redirect("/posts");
    }

    public function storeComment(Request $request, $postId)
    {
        $request->validate([
            'body' => 'required|string|max:255',
        ]);

        $post = Post::findOrFail($postId);

        $comment = new Comment();
        $comment->body = $request->body;
        $comment->post_id = $postId;
        $comment->user_id = auth()->user()->id;
        $comment->save();

        return redirect()->route('posts.show', $postId);
    }

}

