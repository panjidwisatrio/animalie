<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        // $post = Post::all();
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

        return view('dashboard', compact('posts', 'tags'));
    }

    public function show($id)
    {
        $tags = Tag::all();
        $post = DB::table('posts as p')
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
            ->where('p.id', $id)
            ->first();

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
        dd($request->all());
        $posts = $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'categories' => 'required',
            'tags' => 'required',
            // 'image' => 'required',
            'body' => 'required',
        ]);

        Post::create($posts);

        return redirect()->route('dashboard');
    }

    public function upload(Request $request)
    {
        // TODO: validate file and return error if not valid

        $request->validate([
            'upload' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $fileName = $request->file('upload')->store('post-images');

        $url = asset('storage/'. $fileName);

        return response()->json([
            'uploaded' => 1,
            'fileName' => $fileName,
            'url' => $url,
        ]);
    }
}
