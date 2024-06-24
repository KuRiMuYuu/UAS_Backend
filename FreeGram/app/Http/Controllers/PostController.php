<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('dashboard', compact('posts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'caption' => 'required|string',
            'media' => 'required|file|mimes:jpg,jpeg,png,mp4,mov,avi|max:20480', // Max 20MB
        ]);

        $mediaPath = $request->file('media')->store('posts', 'public');

        Post::create([
            'user_id' => auth()->id(),
            'caption' => $request->caption,
            'media_path' => $mediaPath,
            'media_type' => $request->file('media')->getClientMimeType() == 'video/mp4' ? 'video' : 'image',
        ]);

        return redirect()->route('dashboard');
    }
}
