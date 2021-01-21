<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store(Request $request, Post $post) {
        $request->validate([
            'body' => 'required'
        ]);
        $comment = new Comment();
        $comment->body = $request->body;
        $comment->id = $post->post_id;
        $comment->save();
        return redirect("/posts/$post->post_id");
    }
}
