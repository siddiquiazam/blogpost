<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function create() {
        return view('posts.create');
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png,gif'
        ]);
        $filename = $request->image->getClientOriginalName();
        $request->image->storeAs('images',$filename,'public');
        $post = new Post();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->image = $filename;
        $post->save();
        return redirect('/posts/create');
    }
}
