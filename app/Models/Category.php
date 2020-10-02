<?php

namespace App\Models;

use App\Models\Blog\Post;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'parent_id'       
    ];

    public function parent(){
        return $this->belongsTo('App\Models\Category', 'parent_id');
    }

    public function subcategory(){
        return $this->hasMany('App\Models\Category', 'parent_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

}
