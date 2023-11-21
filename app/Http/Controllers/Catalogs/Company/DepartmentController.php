<?php

namespace App\Http\Controllers\Catalogs\Company;

use App\Http\Controllers\Controller;
use App\Models\Catalogs\Company\Department;
use Illuminate\Http\Request;

use App\Http\Requests\Catalogs\Company\DepartmentRequest;
use App\Http\Resources\Catalogs\Company\DepartmentResource;
use App\Http\Resources\Catalogs\Company\DepartmentExport;

class DepartmentController extends Controller
{
  public function index()
  {
    $departments = Department::applySortAndFilter(request('sort'), request('filter'))->paginate(request('perPage'));
    return DepartmentResource::collection($departments);
  }

  public function store(DepartmentRequest $request)
  {
    $department = Department::create($request->validated());
    $url =  route('departments.show', ['department' => $department->id]);
    return response()
      ->json([
        'data' => new DepartmentResource($department)
      ], 201)
      ->header('Location', $url);
  }

  public function show(Department $department)
  {
    $getDepartment = Department::findOrFail($department->id);
    return new DepartmentResource($getDepartment);
  }

  public function update(DepartmentRequest $request, Department $department)
  {
    Department::where('id', $department->id)->update($request->validated());
    $department_updated = Department::findOrFail($department->id);
    return new DepartmentResource($department_updated);
  }
}
