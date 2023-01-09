<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Post;
use Conner\Likeable\Likeable;

class Comment extends Model
{
    use HasFactory, Likeable;

    protected $fillable = [
        'user_id',
        'post_id',
        'comment',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function post() {
        return $this->belongsTo(Post::class);
    }
}
