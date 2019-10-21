<?php

namespace App\Models;

use App\Models\Album;
use Illuminate\Database\Eloquent\Model;

class PhotoGallery extends Model
{
    protected $fillable = [
        'title', 'description', 'image'
    ];
    
    public function album()
    {
        return $this->belongsTo(Album::class);
    }
}
