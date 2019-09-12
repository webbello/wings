<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'title',
        'summary',
        'description',
        'venu',
        'city',
        'country',
        'event_by'       
    ];
}
