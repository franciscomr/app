<?php

namespace App\Http\Controllers\Catalogs\Company;

use App\Http\Controllers\Controller;
use App\Models\Catalogs\Company\Company;
use Illuminate\Http\Request;

use App\Http\Requests\Catalogs\Company\CompanyRequest;
use App\Http\Resources\Catalogs\Company\CompanyResource;
use App\Http\Resources\Catalogs\Company\CompanyExport;

class CompanyController extends Controller
{
  public function index()
  {
    $companies = Company::applySortAndFilter(request('sort'), request('filter'))->paginate(request('perPage'));
    return CompanyResource::collection($companies);
  }

  public function store(CompanyRequest $request)
  {
    $company = Company::create($request->validated());
    $url =  route('companies.show', ['company' => $company->id]);
    return response()
      ->json([
        'data' => new CompanyResource($company)
      ], 201)
      ->header('Location', $url);
  }

  public function show(Company $company)
  {
    $getCompany = Company::findOrFail($company->id);
    return new CompanyResource($getCompany);
  }

  public function update(CompanyRequest $request, Company $company)
  {
    Company::where('id', $company->id)->update($request->validated());
    $company_updated = Company::findOrFail($company->id);
    return new CompanyResource($company_updated);
  }

  public function destroy(Company $company)
  {
    //
  }
}
