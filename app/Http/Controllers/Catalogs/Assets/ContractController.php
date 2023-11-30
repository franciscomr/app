<?php

namespace App\Http\Controllers\Catalogs\Assets;

use App\Http\Controllers\Controller;
use App\Models\Catalogs\Assets\Contract;
use Illuminate\Http\Request;

use App\Http\Requests\Catalogs\Assets\ContractRequest;
use App\Http\Resources\Catalogs\Assets\ContractResource;

class ContractController extends Controller
{
  public function index()
  {
    $contracts = Contract::applySortAndFilter(request('sort'), request('filter'))->paginate(request('perPage'));
    return ContractResource::collection($contracts);
  }

  public function store(ContractRequest $request)
  {
    $contract = Contract::create($request->validated());
    $url =  route('contracts.show', ['contract' => $contract->id]);
    return response()
      ->json([
        'data' => new ContractResource($contract)
      ], 201)
      ->header('Location', $url);
  }

  public function show(Contract $contract)
  {
    $getContract = Contract::findOrFail($contract->id);
    return new ContractResource($getContract);
  }

  public function update(ContractRequest $request, Contract $contract)
  {
    Contract::where('id', $contract->id)->update($request->validated());
    $contract_updated = Contract::findOrFail($contract->id);
    return new ContractResource($contract_updated);
  }
}
