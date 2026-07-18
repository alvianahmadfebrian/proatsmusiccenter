<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{
    protected $fillable = [

        'subtitle',
        'tagline',
        'title',
        'description',
        'button1',
        'button2',
        'image',
        'stat1',
        'stat2',
        'stat3'

    ];
}
