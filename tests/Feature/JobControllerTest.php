<?php

namespace Tests\Feature;

use App\Company;
use App\Job;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class JobControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test index page.
     *
     * @return void
     */
    public function testIndex()
    {
        $this->seed();

        $response = $this->get('/');

        $response->assertOk();
        $response->assertViewHasAll(['jobs' => Job::all()->toArray()]);
    }

    /**
     * Test index page with no available jobs.
     */
    public function testIndexNoJobs()
    {
        $response = $this->get('/');

        $response->assertOk();
        $response->assertViewHasAll(['jobs' => []]);
    }

    public function testStore()
    {
        $company = Company::factory()->create();
        $data = [
            'title' => 'Software Developer',
            'description' => 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr',
            'location' => 'Linz',
            'company_id' => $company->id
        ];
        $response = $this->postJson('/jobs', $data);

        $response->assertCreated();
        $response->assertJson($data);

        $this->assertDatabaseHas('jobs', array_merge($data, [
            'active' => true
        ]));
    }

    public function testStoreInvalidPayload()
    {
        $data = [
            'title' => 'Software Developer',
            'description' => 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr',
            'location' => 'Linz',
        ];
        $response = $this->postJson('/jobs', $data);
        $response->assertJsonValidationErrorFor('company_id');

        $this->assertDatabaseCount('jobs', 0);
    }
}
