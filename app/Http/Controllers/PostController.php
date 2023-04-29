<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        if (Auth::user()) {
            $user = Auth::user();
            $posts = $user->posts()->paginate(10);
            return view('index', compact('posts'));
        } else {
            return redirect()->route('login');
        }
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        // validate request data
        $request->validate([
            'title' => 'required',
            'body' => 'required',
//            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // create new post instance with request data
        $post = new Post($request->all());

        // set user_id, uuid, and writer attributes
        $post->user_id = auth()->user()->id;
        $post->uuid = Str::uuid();
        $post->writer = auth()->user()->name;
        $post->image = $request->nameImage;

        // save post instance
        $post->save();

        // redirect to index page with success message
        return redirect()->route('posts.index')->with('success','Post created successfully.');
    }

    public function UploadImage(Request $request)
    {
        // validate request data
        $request->validate([
            'image' => 'image|mimes:png|max:2048',
        ]);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $path = $file->storeAs('images/' . Auth::id(), $filename, 's3');

            return response($filename);
        }

        return response()->json(['error' => 'No file uploaded'], 400);
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


    public function destroyAll(Post $post)
    {
        Post::query()->update(['deleted_at' => now()]);

        return redirect()->route('posts.index')
            ->with('success','All Posts deleted successfully');
    }

}
