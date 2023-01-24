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

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }

    public function tag()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    public function scopeMore($query, $page)
    {
        return $query->skip(($page-1) * 5)->take(5);
    }

    public function scopeMorePopular($query, $page)
    {
        return $query->skip(($page-1) * 5)->take(5)->popular();
    }

    public function scopeMoreUnanswerd($query, $page)
    {
        return $query->skip(($page-1) * 5)->take(5)->unanswerd();
    }

    public function scopeMoreCategory($query, $page, $category)
    {
        return $query->skip(($page-1) * 5)->take(5)->category($category);
    }

    public function scopeMoreTag($query, $page, $tag)
    {
        return $query->skip(($page-1) * 5)->take(5)->tag($tag);
    }

    public function scopeMoreSearch($query, $page, $search)
    {
        return $query->skip(($page-1) * 5)->take(5)->search($search);
    }

    public function scopeCategory($query, $category)
    {
        return $query->where('category_id', $category);
    }

    public function scopeTag($query, $tag)
    {
        return $query->whereHas('tag', function($q) use ($tag) {
            $q->where('tag_id', $tag);
        });
    }

    public function scopeSearch($query, $search)
    {
        return $query->where('title', 'like', '%' . $search . '%')
                ->orWhere('content', 'like', '%' . $search . '%');
    }

    public function scopeSearchCategory($query, $search, $category)
    {
        return $query->where('title', 'like', '%' . $search . '%')
                ->orWhere('content', 'like', '%' . $search . '%')
                ->category($category);
    }

    public function scopeSearchTag($query, $search, $tag)
    {
        return $query->where('title', 'like', '%' . $search . '%')
            ->orWhere('content', 'like', '%' . $search . '%')
            ->tag($tag);
    }

    public function scopePopular($query)
    {
        return $query->select('posts.*')
            ->leftJoin('likeable_like_counters', 'posts.id', '=', 'likeable_like_counters.post_id')
            ->orderBy('likeable_like_counters.count', 'desc');
    }

    public function scopeUnanswerd($query)
    {
        return $query->select('posts.*')
            ->leftJoin('comments', 'posts.id', '=', 'comments.post_id')
            ->whereNull('comments.post_id');
    }

    public function scopeShowCow($query) {
        return $query->where('category_id', 1)->orderBy('created_at', 'desc');
    }

    public function scopeShowPoultry($query) {
        return $query->where('category_id', 2)->orderBy('created_at', 'desc');
    }

    public function scopeShowGoat($query) {
        return $query->where('category_id', 3)->orderBy('created_at', 'desc');
    }
    
    public function scopeShowSheep($query) {
        return $query->where('category_id', 4)->orderBy('created_at', 'desc');
    }


    public function scopeShowFish($query) {
        return $query->where('category_id', 5)->orderBy('created_at', 'desc');
    }

    public function scopeShowOther($query) {
        return $query->where('category_id', 6)->orderBy('created_at', 'desc');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
