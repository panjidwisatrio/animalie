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
        $posts = DB::table('posts as p')
            ->select(
                'p.*',
                'u.name as name',
                'u.username as username',
                'u.avatar as avatar',
                't.name_tag as tagname',
                'c.category as categoryname',
                'llc.count as likecount'
            )
            ->join('users as u', 'p.user_id', '=', 'u.id')
            ->join('tags as t', 'p.tag_id', '=', 't.id')
            ->join('categories as c', 'p.category_id', '=', 'c.id')
            ->join('likeable_like_counters as llc', 'p.id', '=', 'llc.likeable_id')
            ->orderBy('p.created_at', 'desc')
            ->get();

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
                't.name_tag as tagname',
                'c.category as categoryname'
            )
            ->join('users as u', 'p.user_id', '=', 'u.id')
            ->join('tags as t', 'p.tag_id', '=', 't.id')
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
            'categories' => 'required',
            // 'tags' => 'required',
            'content' => 'required',
        ]);

        $posts = new Post();
        $posts->title = $request->title;
        $posts->slug = $request->slug;
        $posts->content = $request->content;
        $posts->user_id = auth()->user()->id;
        $posts->category_id = $request->categories;

        return redirect()->view('dashboard');
    }

    public function upload(Request $request)
    {
        // TODO: validate file and return error if not valid

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
