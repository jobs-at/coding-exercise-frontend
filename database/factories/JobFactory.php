<?php

/* @var $factory Factory */

use App\Job;
use Carbon\Carbon;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Job::class, function (Faker $faker) {
    $possibleLocations = ['Linz', 'Wien', 'Graz', 'Salzburg', 'Innsbruck'];

    return [
        'title' => $faker->jobTitle,
        'description' => $faker->text,
        'location' => $possibleLocations[array_rand($possibleLocations, 1)],
        'active' => true,
        'published_at' => Carbon::now()->subDays(rand(1, 20))
    ];
});
