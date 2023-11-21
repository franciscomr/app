<?php

namespace App\Http\Controllers\Catalogs\Company;

use App\Http\Controllers\Controller;
use App\Models\Catalogs\Company\Branch;
use Illuminate\Http\Request;

use App\Http\Requests\Catalogs\Company\BranchRequest;
use App\Http\Resources\Catalogs\Company\BranchResource;


class BranchController extends Controller
{
  public function index()
  {
    $companies = Branch::applySortAndFilter(request('sort'), request('filter'))->paginate(request('perPage'));
    return BranchResource::collection($companies);
  }

  public function store(BranchRequest $request)
  {
    $branch = Branch::create($request->validated());
    $url =  route('branches.show', ['branch' => $branch->id]);
    return response()
      ->json([
        'data' => new BranchResource($branch)
      ], 201)
      ->header('Location', $url);
  }

  public function show(Branch $branch)
  {
    $getBranch = Branch::findOrFail($branch->id);
    return new BranchResource($getBranch);
  }

  public function update(BranchRequest $request, Branch $branch)
  {
    Branch::where('id', $branch->id)->update($request->validated());
    $branch_updated = Branch::findOrFail($branch->id);
    return new BranchResource($branch_updated);
  }
}
