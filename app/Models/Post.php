<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\User;
use Cviebrock\EloquentSluggable\Sluggable;
use Conner\Likeable\Likeable;
class Post extends Model
{
    use HasFactory, Sluggable, Likeable;

    protected $fillable = [
        'title',
        'content',
        'slug',
        'user_id',
        'category_id',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tag() {
        return $this->belongsToMany(Tag::class)->as('tags');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
