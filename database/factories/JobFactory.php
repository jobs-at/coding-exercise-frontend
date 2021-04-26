<?php

namespace Database\Factories;

use App\Job;
use Illuminate\Database\Eloquent\Factories\Factory;

class JobFactory extends Factory {

    protected $model = Job::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $possibleLocations = ['Linz', 'Vienna', 'Graz', 'Salzburg', 'Innsbruck'];

        return [
            'title' => $this->faker->jobTitle,
            'description' => $this->faker->text,
            'location' => $possibleLocations[array_rand($possibleLocations, 1)],
            'active' => true,
            'published_at' => now()->subDays(rand(1, 20))
        ];
    }
}
