<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        // $post = Post::all();
        $tags = Tag::all();
        return view('dashboard', compact('tags'));
    }

    public function show($id) {
        $post = Post::find($id);
        return view('post.detailpost', compact('post'));
    }

    public function interestgroup_show() {
        $tags = Tag::all();
        return view('interestGroup', compact('tags'));
    }

    public function create() {
        return view('post.create');
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'categories' => 'required',
            'tags' => 'required',
            'image' => 'required',
            'body' => 'required',
        ]);

        $post = new Post();
        $post->user_id = auth()->user()->id;
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->categories = $request->categories;
        $post->tags = $request->tags;
        $post->image = $request->image;
        $post->body = $request->body;
        $post->save();
        return redirect()->route('dashboard');
    }
}
