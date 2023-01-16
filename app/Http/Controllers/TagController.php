<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::all();

        return response()->json([
            'tags' => $tags,
        ]);
    }

    public function search(Request $request)
    {
        $fill = $request->input('query');
        if(empty($fill)) {
            $tags = Tag::all();
            return response()->json([
                'success' => 'Tags Found Successfully.',
                'message' => 'Tags Found Successfully.',
                'tags' => $tags,
            ]);
        } else {
            $query = strtolower($request->input('query'));
            $tags = Tag::search($query)->get();

            return response()->json([
                'success' => 'Tags Found Successfully.',
                'message' => 'Tags Found Successfully.',
                'tags' => $tags,
            ]);
        }
    }

    public function create()
    {
        return view('tags.create');
    }

    public function store(Request $request)
    {
        $newTag = new Tag();
        $newTag->name_tag = $request->input('name_tag');
        $newTag->slug = SlugService::createSlug(Tag::class, 'slug', $request->input('name_tag'), ['unique' => true]);
        $newTag->color = 'blue';
        $newTag->save();

        return response()->json([
            'success' => 'New Tag Added Successfully.',
            'message' => 'New Tag Added Successfully.',
            'newTag' => $newTag,
            'csrf' => $request->session()->token()
        ]);
    }

    public function show(Tag $tag)
    {
        $posts = Post::whereHas('tag', function ($query) use ($tag) {
            $query->where('slug', $tag->slug);
        })->get();

        return view('tagsPage', compact('tag', 'posts'));
    }

    public function edit(Tag $tag)
    {
        return view('tags.edit', compact('tag'));
    }

    public function update(Request $request, Tag $tag)
    {
        $request->validate(['name' => 'required']);
        $tag->update(['name' => $request->name]);
        return to_route('tags.index')->with('status', 'Tag updated successfully.');
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();

        return back()->with('status', 'Tag deleted successfully.');
    }
}