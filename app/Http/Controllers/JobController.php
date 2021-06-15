<?php

namespace App\Http\Controllers;

use App\Job;
use App\Http\Resources\v1\Job as JobResource;
use App\Http\Resources\v1\JobCollection;
use Illuminate\Http\Resources\Json\ResourceCollection;


class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::all();
        return view('index', compact('jobs'));
    }


    /**
     * Get all the jobs
     * return all the jobs
     *
     * @return Job[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getAllJobs()
    {
        $jobs = Job::query();

        if($keyword = request('search')) {
            $jobs->where('title' , 'LIKE' , "%{$keyword}%")->orWhere('location' , 'LIKE' , "%{$keyword}%");
        }
        $jobs = $jobs->latest()->get();

        return new JobCollection($jobs);
    }


    /**
     * Get job detaol
     * @param Job $job
     */
    public function getJobDetail(Job $job)
    {
        return new JobResource($job);
    }


}
