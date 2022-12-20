<?php

namespace App\Http\Controllers;

use App\Models\DetailTag;
use Illuminate\Http\Request;

class DetailTagController extends Controller
{
    public function store(Request $request) {
        $data = $request->validate([
            'post_id' => 'required',
            'tag_id' => 'required',
        ]);

        DetailTag::create($data);
    }
}
