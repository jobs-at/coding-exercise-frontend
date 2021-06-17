<?php

namespace App\Http\Controllers;

use App\Company;
use App\Job;
use App\Http\Resources\v1\Job as JobResource;
use App\Http\Resources\v1\JobCollection;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;


class JobController extends Controller
{

    /**
     * Job Overview
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
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
                'published_at' => Carbon::parse($item->published_at)->format('Y-m-d H:m:s') ,
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
        $jobs = Job::all();

        return new JobCollection($jobs);
    }


    /**
     * Search job
     * We search only title here
     *
     * @param $keyword
     * @return JobCollection
     */
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
     *
     * @param Job $job
     */
    public function getJobDetail(Job $job)
    {
        // Resource Using
        return new JobResource($job);
    }


    /**
     * Show Create job Page
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(){

        // Select all the location
        $locations = Job::select('location')->distinct('location')->get();

        // Select all the companies
        $companies = Company::all();

        return view('job-register',compact('locations','companies'));
    }


    /**
     * Save Job in the Database
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        // Form Validation
        $validData = $request->validate([
            'title'           => 'required|min:5|max:50',
            'company'         => 'required',
            'active'          => 'required',
            'location'        => 'required',
            'description'     => 'required',
            'published_at'    => 'required'
        ]);

        // Find Company
        $company = Company::find($validData['company']);

        // Add the Job to the Company
        $company->jobs()->create($validData);

        return redirect(route('jobs'));
    }
}
