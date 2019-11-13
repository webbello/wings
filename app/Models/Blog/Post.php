<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Model;
use App\Models\Auth\User;
use App\Models\Tag;
use App\Models\Comment;
use App\Models\Category;

class Post extends Model
{
    protected $fillable = [
        'author',
        'user_id',
        'title',
        'summary',
        'body',
        'image'     
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable')->whereNull('parent_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
