<?php

namespace App\Http\Controllers\Catalogs\Company;

use App\Http\Controllers\Controller;
use App\Models\Catalogs\Company\Employee;
use Illuminate\Http\Request;

use App\Http\Requests\Catalogs\Company\EmployeeRequest;
use App\Http\Resources\Catalogs\Company\EmployeeResource;

class EmployeeController extends Controller
{
  public function index()
  {
    $employees = Employee::applySortAndFilter(request('sort'), request('filter'))->paginate(request('perPage'));
    return EmployeeResource::collection($employees);
  }

  public function store(EmployeeRequest $request)
  {
    $employee = Employee::create($request->validated());
    $url =  route('employees.show', ['employee' => $employee->id]);
    return response()
      ->json([
        'data' => new EmployeeResource($employee)
      ], 201)
      ->header('Location', $url);
  }

  public function show(Employee $employee)
  {
    $getEmployee = Employee::findOrFail($employee->id);
    return new EmployeeResource($getEmployee);
  }

  public function update(EmployeeRequest $request, Employee $employee)
  {
    Employee::where('id', $employee->id)->update($request->validated());
    $employee_updated = Employee::findOrFail($employee->id);
    return new EmployeeResource($employee_updated);
  }
}
