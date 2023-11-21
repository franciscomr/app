<?php

namespace App\Http\Controllers\Catalogs\Company;

use App\Http\Controllers\Controller;
use App\Models\Catalogs\Company\Job;
use Illuminate\Http\Request;

use App\Http\Requests\Catalogs\Company\JobRequest;
use App\Http\Resources\Catalogs\Company\JobResource;
use App\Http\Resources\Catalogs\Company\JobExport;

class JobController extends Controller
{
  public function index()
  {
    $jobs = Job::applySortAndFilter(request('sort'), request('filter'))->paginate(request('perPage'));
    return JobResource::collection($jobs);
  }

  public function store(JobRequest $request)
  {
    $job = Job::create($request->validated());
    $url =  route('jobs.show', ['job' => $job->id]);
    return response()
      ->json([
        'data' => new JobResource($job)
      ], 201)
      ->header('Location', $url);
  }

  public function show(Job $job)
  {
    $getJob = Job::findOrFail($job->id);
    return new JobResource($getJob);
  }

  public function update(JobRequest $request, Job $job)
  {
    Job::where('id', $job->id)->update($request->validated());
    $job_updated = Job::findOrFail($job->id);
    return new JobResource($job_updated);
  }
}
