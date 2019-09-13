<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Model;
use App\Models\Auth\User;

class Post extends Model
{
    protected $fillable = [
        'author',
        'title',
        'summary',
        'body',
        'image'     
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
