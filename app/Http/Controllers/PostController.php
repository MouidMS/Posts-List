<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
{
        if(Auth::user()){
            $user =Auth::user();
            $posts=$user->posts;
            return view('index', compact('posts'));
        }else{
            return redirect()->route('login');
        }



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
