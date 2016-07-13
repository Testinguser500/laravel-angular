<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class StaticContent extends Authenticatable
{
    protected $table = 'static_content';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title','alias', 'short_description', 'description'
    ];

    
}
