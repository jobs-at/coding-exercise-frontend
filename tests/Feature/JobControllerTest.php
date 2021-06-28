<?php

namespace Tests\Feature;

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
}
