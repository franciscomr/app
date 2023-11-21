<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Catalogs\Company\CompanyController;
use App\Http\Controllers\Catalogs\Company\BranchController;
use App\Http\Controllers\Catalogs\Company\DepartmentController;
use App\Http\Controllers\Catalogs\Company\JobController;
use App\Http\Controllers\Catalogs\Company\EmployeeController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(CompanyController::class)->group(function () {
    Route::get('companies', 'index')->name('companies.index');
    Route::get('companies/{company}', 'show')->name('companies.show');
    Route::post('companies', 'store')->name('companies.store');
    Route::patch('companies/{company}', 'update')->name('companies.update');
    Route::get('companies/export', 'export')->name('companies.export');
});

Route::controller(BranchController::class)->group(function () {
    Route::get('branches', 'index')->name('branches.index');
    Route::get('branches/{branch}', 'show')->name('branches.show');
    Route::post('branches', 'store')->name('branches.store');
    Route::patch('branches/{branch}', 'update')->name('branches.update');
    Route::get('branches/export', 'export')->name('branches.export');
});

Route::controller(DepartmentController::class)->group(function () {
    Route::get('departments', 'index')->name('departments.index');
    Route::get('departments/{department}', 'show')->name('departments.show');
    Route::post('departments', 'store')->name('departments.store');
    Route::patch('departments/{department}', 'update')->name('departments.update');
    Route::get('departments/export', 'export')->name('departments.export');
});

Route::controller(JobController::class)->group(function () {
    Route::get('jobs', 'index')->name('jobs.index');
    Route::get('jobs/{job}', 'show')->name('jobs.show');
    Route::post('jobs', 'store')->name('jobs.store');
    Route::patch('jobs/{job}', 'update')->name('jobs.update');
    Route::get('jobs/export', 'export')->name('jobs.export');
});

Route::controller(EmployeeController::class)->group(function () {
    Route::get('employees', 'index')->name('employees.index');
    Route::get('employees/{employee}', 'show')->name('employees.show');
    Route::post('employees', 'store')->name('employees.store');
    Route::patch('employees/{employee}', 'update')->name('employees.update');
    Route::get('employees/export', 'export')->name('employees.export');
});
