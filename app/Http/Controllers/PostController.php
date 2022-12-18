<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $posts = DB::table('posts as p')
            ->select(
                'p.*',
                'u.name as name',
                'u.username as username',
                'u.avatar as avatar',
                'c.category as categoryname'
            )
            ->join('users as u', 'p.user_id', '=', 'u.id')
            ->join('categories as c', 'p.category_id', '=', 'c.id')
            ->orderBy('p.created_at', 'desc')
            ->get();
        return view('interestGroup', compact('tags', 'posts'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('post.create', compact('categories'));
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

        $post->save();

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
        $post->like();
        $post->save();

        return redirect()->route('dashboard')->with('message', 'Post Like successfully!');
    }

    public function unlikePost($id)
    {
        $post = Post::find($id);
        $post->unlike();
        $post->save();

        return redirect()->route('dashboard')->with('message', 'Post Like undo successfully!');
    }
}
