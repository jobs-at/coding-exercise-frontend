<?php

namespace Tests\Feature;

use App\Company;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CompanyControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test get all available companies.
     *
     * @return void
     */
    public function testIndex()
    {
        factory(Company::class)->create(['name' => 'Company1']);
        factory(Company::class)->create(['name' => 'Company2']);

        $response = $this->getJson('/companies');

        $response->assertOk();
        $response->assertJson(['companies' => Company::all()->toArray()]);
    }
}
