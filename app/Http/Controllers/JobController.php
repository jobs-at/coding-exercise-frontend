<?php

namespace App\Http\Controllers;

use App\Job;
use App\Http\Resources\v1\Job as JobResource;
use App\Http\Resources\v1\JobCollection;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;


class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::all();

        // Add Company name to each Job
        $jobs = $jobs->map(function($item) {
            return [
                'id'           => $item->id ,
                'company_id'   => $item->company_id ,
                'title'        => $item->title ,
                'description'  => $item->description ,
                'location'     => $item->location ,
                'active'       => $item->active ,
                'published_at' => $item->published_at ,
                'datetime'     => Carbon::parse($item->created_at)->format('Y-m-d H:m:s') ,
                'company'      => $item->company->name
            ];
        });

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
            $jobs->where('title' , 'LIKE' , "%{$keyword}%");
        }
        $jobs = $jobs->take(5)->get();

        return new JobCollection($jobs);
    }


    public function searchJob($keyword)
    {

        $jobs = Job::query();

        if($keyword != '-') {
            $jobs->where('title' , 'LIKE' , "%{$keyword}%");
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
