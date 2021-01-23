<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get();
        return view('posts.index', compact('posts'));
    }

    public function show(Post $post)
    {
        $post->view += 1;
        $post->save();

        $comments = $post->comments;
        return view('posts.show', compact('post', 'comments'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'image' => 'nullable|mimes:jpeg,jpg,png,gif'
        ]);

        $post = new Post();
        $post->title = $request->title;
        $post->body = $request->body;

        if ($request->has('image')) {
            $filename = $request->image->getClientOriginalName();
            $request->image->storeAs('images', $filename, 'public');
            $post->image = $filename;
        }
        
        $post->save();
        return redirect('/posts');
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'image' => 'nullable|mimes:jpeg,jpg,png,gif'
        ]);

        if ($request->has('image')) {
            $filename = $request->image->getClientOriginalName();
            Storage::disk('public')->delete('images/'.$post->image);
            $request->image->storeAs('images', $filename, 'public');
            $post->image = $filename;
        }
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();
        return redirect('/posts');
    }

    public function delete(Post $post)
    {
        Storage::disk('public')->delete('images/'.$post->image);
        $post->delete();
        return redirect('/posts');
    }
}
