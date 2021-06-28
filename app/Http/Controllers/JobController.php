<?php

namespace App\Http\Controllers;

use App\Job;

class JobController extends Controller
{
    public function index()
    {
        return view('index', ['jobs' => Job::all()->toArray()]);
    }
}
