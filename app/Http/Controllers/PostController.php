<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with(['user', 'category', 'comment'])->latest()->get();
        $tags = Tag::all();

        return view('dashboard', compact('posts', 'tags'));
    }

    public function show(Post $post)
    {
        $post = Post::with(['user', 'category', 'tag'])->where('id', $post->id)->first();
        $comments = Comment::with(['user'])->where('post_id', $post->id)->latest()->limit(4)->get();

        return view('post.detailpost', compact('post', 'comments'));
    }

    public function interestgroup_show()
    {
        $tags = Tag::all();
        $posts = Post::with(['user', 'category'])->latest()->get();
        return view('interestGroup', compact('tags', 'posts'));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('post.create', compact('categories', 'tags'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'category_id' => 'required',
            'content' => 'required',
        ]);

        $post = Post::create([
            'title' => $request->title,
            'slug' => $request->slug,
            'category_id' => $request->category_id,
            'user_id' => auth()->user()->id,
            'content' => $request->content,
        ]);

        if ($request->has('tags')) {
            $post->tag()->attach($request->tags);
        }

        return redirect()->route('dashboard');
    }



    public function upload(Request $request)
    {
        // TODO : Image excess issue
        $request->validate([
            'upload' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $fileName = $request->file('upload')->store('post-images');

        $url = asset('storage/' . $fileName);

        return response()->json([
            'uploaded' => 1,
            'fileName' => $fileName,
            'url' => $url,
        ]);
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title, ['unique' => true]);
        return response()->json(['slug' => $slug]);
    }

    public function likePost($id)
    {
        $post = Post::find($id);

        if ($post->liked(auth()->user()->id)) {
            $post->unlike();
            $post->save();
        } else {
            $post->like();
            $post->save();
        }

        $liked = $post->liked(auth()->user()->id);

        return response()->json([
            'likeCount' => $post->likeCount,
            'liked' => $liked
        ]);
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        $post = Post::with(['tag'])->where('id', $post->id)->first();
        return view('post.edit', compact('post', 'categories', 'tags'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'category_id' => 'required',
            'content' => 'required',
        ]);

        $post->update([
            'title' => $request->title,
            'slug' => $request->slug,
            'category_id' => $request->category_id,
            'user_id' => auth()->user()->id,
            'content' => $request->content,
        ]);

        if ($request->has('tags')) {
            $post->tag()->sync($request->tags);
        }

        return redirect()->route('profile.show');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->back();
    }
}
