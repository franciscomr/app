<?php

namespace App\Http\Controllers\Catalogs\Assets;

use App\Http\Controllers\Controller;
use App\Models\Catalogs\Assets\ContractType;
use Illuminate\Http\Request;

use App\Http\Requests\Catalogs\Assets\ContractTypeRequest;
use App\Http\Resources\Catalogs\Assets\ContractTypeResource;

class ContractTypeController extends Controller
{
  public function index()
  {
    $contract_types = ContractType::applySortAndFilter(request('sort'), request('filter'))->paginate(request('perPage'));
    return ContractTypeResource::collection($contract_types);
  }

  public function store(ContractTypeRequest $request)
  {
    $contract_type = ContractType::create($request->validated());
    $url =  route('contract_types.show', ['contract_type' => $contract_type->id]);
    return response()
      ->json([
        'data' => new ContractTypeResource($contract_type)
      ], 201)
      ->header('Location', $url);
  }

  public function show(ContractType $contract_type)
  {
    $getContractType = ContractType::findOrFail($contract_type->id);
    return new ContractTypeResource($getContractType);
  }

  public function update(ContractTypeRequest $request, ContractType $contract_type)
  {
    ContractType::where('id', $contract_type->id)->update($request->validated());
    $contract_type_updated = ContractType::findOrFail($contract_type->id);
    return new ContractTypeResource($contract_type_updated);
  }
}
