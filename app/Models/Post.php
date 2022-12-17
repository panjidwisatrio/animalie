<?php

namespace App\Models;

use Conner\Likeable\Likeable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory, Likeable;

    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'categories',
        'tags',
        // 'image',
        'body',
    ];
}
