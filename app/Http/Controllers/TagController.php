<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index($id) {
        $tags = Tag::find($id);
        return view('tagsPage', compact('tags'));
    }
}
