<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class PostsController extends Controller
{

    public function index() {
        $posts = Post::latest()->get();
        return view('posts.index',[
            'posts' => $posts
        ]);
    }

    public function show(Post $post) {
        $post->view += 1;
        $post->save();
        return view('posts.show', [
            'post' => $post
        ]);
    }

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
        return redirect('/posts');
    }

    public function delete(Post $post) {
        Storage::disk('public')->delete('images/'.$post->image);
        $post->delete();
        return redirect('/posts');
    }
}
