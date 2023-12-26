<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $posts=Post::all();
        return view('post.index', compact('posts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function create(){

        return view('post.create');
    }

    public function store(Request $request)
    {
        $post=$request->all();
        Post::create($post);
        return redirect()->route('post.index')->with('success', 'Post created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post=Post::find($id);
        return view('post.show', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function edit($id){
       $post=Post::find($id);
       return view('post.edit', compact('post'));
       

    }
    public function update(Request $request, string $id)
    {
       $post = Post::find($id);
       $post->update($request->all());
       return redirect()->route('post.index')->with('success', 'Post Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post=Post::find($id);
        $post->delete();
        return redirect()->route('post.index')->with('success', 'Post deleted successfully');
    }
}
