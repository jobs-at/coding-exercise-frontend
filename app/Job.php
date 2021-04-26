<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    const CREATED_AT = 'published_at';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'location', 'status',
    ];

    /**
     * Find most recent jobs.
     *
     * @return array
     */
    public static function recent(): array
    {
        return Job::where('published_at', '>=', Carbon::now()->subWeek())
            ->orderBy('published_at', 'desc')
            ->get()
            ->toArray();
    }
}
