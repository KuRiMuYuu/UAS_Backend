<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    // Display all posts
    public function index()
    {
        $posts = Post::with('user', 'likes')->get();
        return view('dashboard', compact('posts'));
    }

    // Store a new post
    public function store(Request $request)
    {
        $request->validate([
            'caption' => 'required',
            'media' => 'required|mimes:jpg,jpeg,png,mp4|max:20480'
        ]);

        $path = $request->file('media')->store('media', 'public');

        $post = new Post();
        $post->user_id = Auth::id();
        $post->caption = $request->caption;
        $post->media_path = $path;

        // Determine media_type based on file extension
        $extension = $request->file('media')->getClientOriginalExtension();
        $post->media_type = in_array($extension, ['jpg', 'jpeg', 'png']) ? 'image' : 'video';

        $post->save();

        return redirect()->back()->with('success', 'Post berhasil ditambahkan.');
    }

    // Like or unlike a post
    public function like(Post $post)
    {
        $like = Like::where('user_id', Auth::id())->where('post_id', $post->id)->first();

        if ($like) {
            $like->delete();
        } else {
            Like::create([
                'user_id' => Auth::id(),
                'post_id' => $post->id,
            ]);
        }

        return redirect()->back();
    }

    // Delete a post
    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        // Pastikan hanya pengguna yang mengunggah postingan yang dapat menghapusnya
        if ($post->user_id !== Auth::id()) {
            return redirect()->back()->with('error', 'You are not authorized to delete this post.');
        }

        // Hapus file media dari storage
        if ($post->media_path) {
            Storage::delete($post->media_path);
        }

        // Hapus postingan dari database
        $post->delete();

        return redirect()->back()->with('success', 'Post deleted successfully.');
    }
}