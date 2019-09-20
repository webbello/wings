<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Blog\Post;

class Tag extends Model
{
    protected $fillable = ['name'];
    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
