<?php

namespace Database\Seeders;

use App\Company;
use App\Job;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $companies = Company::factory()->count(3)->create();

        foreach ($companies as $company) {
            Job::factory()->count(10)->create(['company_id' => $company]);
        }
    }
}
