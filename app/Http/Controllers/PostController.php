<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::get();
        return response()->json([
            'message' => 'List of posts',
            'posts' => $posts,
        ],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store( StorePostRequest $request)
    {
       
        $post = Post::create($request->validated());
        
        return response()->json([
            'message' => 'New Post Creates !!',
            'posts' => $post,
        ],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return response()->json([
            'message' => 'Single Post',
            'posts' => $post,
        ],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $post->update($request->validated());

        return response()->json([
            'message' => 'Post Updated !!',
            'posts' => $post,
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        return response()->json([
            'message' => 'Post deleted !!',
            'posts' => $post->delete(),
        ],200);
    }
}
