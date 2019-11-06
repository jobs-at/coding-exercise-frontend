<?php

namespace App\Http\Controllers;

use App\Job;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::recent();
        return view('index', compact('jobs'));
    }
}
