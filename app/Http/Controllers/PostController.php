<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        if (Auth::user()) {
            $user = Auth::user();
            $posts = $user->posts;
            return view('index', compact('posts'));
        } else {
            return redirect()->route('login');
        }
    }
    public function trashed()
    {
        // Retrieve all trashed posts
        $trashedPosts = Post::onlyTrashed()->get();

        // Pass the trashed posts to the view
        return view('trashed', compact('trashedPosts'));
    }

    public function restore($id)
    {
        // Find the post with the given ID and restore it
        Post::withTrashed()->find($id)->restore();

        // Redirect back to the previous page with a success message
        return redirect()->back()->with('success', 'Post has been restored successfully.');
    }

    public function forceDelete($id)
    {
        // Find the post with the given ID (even if it's trashed)
        $post = Post::withTrashed()->findOrFail($id);

        // Permanently delete the post
        $post->forceDelete();

        // Redirect to the posts index page with a success message
        return redirect()->route('posts.index')->with('success','Post permanently deleted successfully!');
    }


    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        $post = new Post($request->all());
        $post->user_id = Auth::user()->id; // set the user_id to the authenticated user's id
        $post->save();

        return redirect()->route('posts.index')
            ->with('success','Post created successfully.');
    }


    public function show(Post $post)
    {
        return view('show',compact('post'));
    }

    public function edit(Post $post)
    {
        return view('edit',compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        $post->update($request->all());

        return redirect()->route('posts.index')
            ->with('success','Post updated successfully');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index')
            ->with('success','Post deleted successfully');
    }
}
