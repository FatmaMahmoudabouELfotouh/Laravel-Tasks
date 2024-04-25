<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Resources\PostResource;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    function index(){
        $posts = Post::paginate(10);
        return PostResource::collection($posts);
    }
    function store(StorePostRequest $request){
        {

            Post::create([
                "title" => $request->title,
                "body" => $request->body,
                "user_id" => $request->user_id,

            ]);

            return "post stored";
        }

    }
    function show($id)
        {
            $post = Post::find($id);
            return  new PostResource($post);
        }
    function update($id, Request $request)
        {
            $post = Post::find($id);
            $post->title = $request->title;
            $post->body = $request->body;
            $post->user_id = $request->user_id;

            $post->save();
            return "post updated";
        }
    function destroy($id)
    {
        Post::destroy($id);
        return "posts deleted";
    }

}
