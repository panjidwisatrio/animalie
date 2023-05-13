<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class ApiTagController extends Controller
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
                'tags' => $tags,
            ]);
        } else {
            $query = strtolower($request->input('query'));
            $tags = Tag::search($query)->get();

            return response()->json([
                'success' => 'Tags Found Successfully.',
                'tags' => $tags,
            ]);
        }
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
            'newTag' => $newTag,
            'csrf' => $request->session()->token()
        ]);
    }

    public function show(Tag $tag)
    {
        $posts = Post::with(['user', 'category', 'comment'])->latest()->tag($tag->slug)->get();

        return response()->json([
            'success' => 'Success',
            'posts' => $posts,
            'tag' => $tag,
        ]);
    }

    public function edit(Tag $tag)
    {
        return response()->json([
            'success' => 'Success',
            'tag' => $tag,
        ]);
    }

    public function update(Request $request, Tag $tag)
    {
        $request->validate(['name' => 'required']);
        $tag->update(['name' => $request->name]);

        return response()->json([
            'success' => 'Tag updated successfully.',
            'tag' => $tag,
            'csrf' => $request->session()->token()
        ]);
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();

        return response()->json([
            'success' => 'Tag deleted successfully.',
        ]);
    }
}
