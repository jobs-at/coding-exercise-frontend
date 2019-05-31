<?php

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
        $firstCompany = factory(Company::class)->create();
        $secondCompany = factory(Company::class)->create();
        $thirdCompany = factory(Company::class)->create();

        factory(Job::class, 10)->create(['company_id' => $firstCompany->id]);
        factory(Job::class, 10)->create(['company_id' => $secondCompany->id]);
        factory(Job::class, 10)->create(['company_id' => $thirdCompany->id]);
    }
}
