<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\DetailTag;
use App\Models\User;
use Cviebrock\EloquentSluggable\Sluggable;
use Conner\Likeable\Likeable;
class Post extends Model
{
    use HasFactory, Sluggable, Likeable;

    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'categories',
        // 'tags',
        'content',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    protected $guarded = ['id'];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function detail_tag() {
        return $this->hasMany(DetailTag::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
