<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    const CREATED_AT = 'published_at';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'location', 'status',
    ];
}
