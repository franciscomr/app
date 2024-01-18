<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Catalogs\Company\CompanyController;
use App\Http\Controllers\Catalogs\Company\BranchController;
use App\Http\Controllers\Catalogs\Company\DepartmentController;
use App\Http\Controllers\Catalogs\Company\JobController;
use App\Http\Controllers\Catalogs\Company\EmployeeController;

use App\Http\Controllers\Catalogs\Assets\ContractTypeController;
use App\Http\Controllers\Catalogs\Assets\ContractController;
use App\Http\Controllers\Catalogs\Assets\AssetCategoryController;
use App\Http\Controllers\Catalogs\Assets\AssetTypeController;
use App\Http\Controllers\Catalogs\Assets\VendorController;
use App\Http\Controllers\Catalogs\Assets\ProductController;

use App\Http\Controllers\Utils\SelectController;

use App\Http\Controllers\Auth\SessionController;

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
})->name('get.user');

//Route::post('login', [SessionController::class, 'login'])->name('login');
Route::controller(SessionController::class)->group(function () {
    Route::post('login', 'login')->name('login');
    Route::post('logout', 'logout')->name('logout');
});

Route::controller(CompanyController::class)->middleware('auth:sanctum')->group(function () {
    Route::get('companies', 'index')->name('companies.index');
    Route::get('companies/{company}', 'show')->name('companies.show');
    Route::post('companies', 'store')->name('companies.store');
    Route::patch('companies/{company}', 'update')->name('companies.update');
    Route::get('companies/export', 'export')->name('companies.export');
});

Route::controller(BranchController::class)->middleware('auth:sanctum')->group(function () {
    Route::get('branches', 'index')->name('branches.index');
    Route::get('branches/{branch}', 'show')->name('branches.show');
    Route::post('branches', 'store')->name('branches.store');
    Route::patch('branches/{branch}', 'update')->name('branches.update');
    Route::get('branches/export', 'export')->name('branches.export');
});

Route::controller(DepartmentController::class)->middleware('auth:sanctum')->group(function () {
    Route::get('departments', 'index')->name('departments.index');
    Route::get('departments/{department}', 'show')->name('departments.show');
    Route::post('departments', 'store')->name('departments.store');
    Route::patch('departments/{department}', 'update')->name('departments.update');
    Route::get('departments/export', 'export')->name('departments.export');
});

Route::controller(JobController::class)->middleware('auth:sanctum')->group(function () {
    Route::get('jobs', 'index')->name('jobs.index');
    Route::get('jobs/{job}', 'show')->name('jobs.show');
    Route::post('jobs', 'store')->name('jobs.store');
    Route::patch('jobs/{job}', 'update')->name('jobs.update');
    Route::get('jobs/export', 'export')->name('jobs.export');
});

Route::controller(EmployeeController::class)->middleware('auth:sanctum')->group(function () {
    Route::get('employees', 'index')->name('employees.index');
    Route::get('employees/{employee}', 'show')->name('employees.show');
    Route::post('employees', 'store')->name('employees.store');
    Route::patch('employees/{employee}', 'update')->name('employees.update');
    Route::get('employees/export', 'export')->name('employees.export');
});

Route::controller(ContractTypeController::class)->middleware('auth:sanctum')->group(function () {
    Route::get('contract_types', 'index')->name('contract_types.index');
    Route::get('contract_types/{contract_type}', 'show')->name('contract_types.show');
    Route::post('contract_types', 'store')->name('contract_types.store');
    Route::patch('contract_types/{contract_type}', 'update')->name('contract_types.update');
    Route::get('contract_types/export', 'export')->name('contract_types.export');
});

Route::controller(ContractController::class)->middleware('auth:sanctum')->group(function () {
    Route::get('contracts', 'index')->name('contracts.index');
    Route::get('contracts/{contract}', 'show')->name('contracts.show');
    Route::post('contracts', 'store')->name('contracts.store');
    Route::patch('contracts/{contract}', 'update')->name('contracts.update');
    Route::get('contracts/export', 'export')->name('contracts.export');
});

Route::controller(AssetCategoryController::class)->middleware('auth:sanctum')->group(function () {
    Route::get('asset_categories', 'index')->name('asset_categories.index');
    Route::get('asset_categories/{asset_category}', 'show')->name('asset_categories.show');
    Route::post('asset_categories', 'store')->name('asset_categories.store');
    Route::patch('asset_categories/{asset_category}', 'update')->name('asset_categories.update');
    Route::get('asset_categories/export', 'export')->name('asset_categories.export');
});

Route::controller(AssetTypeController::class)->middleware('auth:sanctum')->group(function () {
    Route::get('asset_types', 'index')->name('asset_types.index');
    Route::get('asset_types/{asset_type}', 'show')->name('asset_types.show');
    Route::post('asset_types', 'store')->name('asset_types.store');
    Route::patch('asset_types/{asset_type}', 'update')->name('asset_types.update');
    Route::get('asset_types/export', 'export')->name('asset_types.export');
});

Route::controller(VendorController::class)->middleware('auth:sanctum')->group(function () {
    Route::get('vendors', 'index')->name('vendors.index');
    Route::get('vendors/{vendor}', 'show')->name('vendors.show');
    Route::post('vendors', 'store')->name('vendors.store');
    Route::patch('vendors/{vendor}', 'update')->name('vendors.update');
    Route::get('vendors/export', 'export')->name('vendors.export');
});

Route::get('select', [SelectController::class, 'select'])->name('select');
