<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tag;
use App\Models\Post;

class DetailTag extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id',
        'tag_id',
    ];

    public function post() {
        return $this->belongsTo(Post::class);
    }

    public function tag() {
        return $this->hasMany(Tag::class);
    }
}
