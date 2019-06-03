<?php

/* @var $factory Factory */

use App\Job;
use Carbon\Carbon;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Job::class, function (Faker $faker) {
    return [
        'title' => $faker->jobTitle,
        'description' => $faker->text,
        'location' => $faker->city,
        'active' => true,
        'published_at' => Carbon::now()->subDays(rand(1, 20))
    ];
});
