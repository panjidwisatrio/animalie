<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Tag extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = [
        'name_tag',
        'slug',
        'color'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name_tag'
            ]
        ];
    }

    public function post() {
        return $this->belongsToMany(Post::class);
    }

    public function scopeSearch($query, $search) {
        return $query->where('name_tag', 'LIKE', "%$search%");
    }
}
