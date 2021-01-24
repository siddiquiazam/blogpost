<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use Auth;

class CommentsController extends Controller
{
    public function store(Request $request, Post $post) {
        $request->validate([
            'body' => 'required'
        ]);
        $user = Auth::user();
        $comment = new Comment();
        $comment->body = $request->body;
        $comment->post_id = $post->id;
        $comment->user_id = $user->id;
        $comment->author = $user->name;
        $comment->save();
        return redirect("/posts/$post->id");
    }

    public function delete(Post $post, Comment $comment) {
        $comment->delete();
        return redirect("/posts/$post->id");
    }
}
