<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with(['user', 'category'])->latest()->get();
        $tags = Tag::all();

        return view('dashboard', compact('posts', 'tags'));
    }

    public function show(Post $post)
    {
        $tags = Tag::all();
        return view('post.detailpost', compact('post', 'tags'));
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
}
