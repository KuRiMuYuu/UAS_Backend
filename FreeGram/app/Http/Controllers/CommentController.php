<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, $postId)
    {
        $request->validate([
            'body' => 'required|string|max:1000',
        ]);

        $comment = new Comment();
        $comment->body = $request->body;
        $comment->post_id = $postId;
        $comment->user_id = Auth::id();
        $comment->save();

        return back()->with('success', 'Comment added successfully');
    }
}
