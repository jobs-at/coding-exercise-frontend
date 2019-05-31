<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    /**
     * Get the jobs of the company.
     *
     * @return HasMany
     */
    public function jobs()
    {
        return $this->hasMany('App\Job');
    }
}
