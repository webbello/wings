<?php

namespace App\Models;

use App\Models\PhotoGallery;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $fillable = [
        'title', 'description'
    ];

    public function photos()
    {
        return $this->hasMany(PhotoGallery::class);
    }
}
