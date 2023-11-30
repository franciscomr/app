<?php

namespace App\Http\Controllers\Catalogs\Assets;

use App\Http\Controllers\Controller;
use App\Models\Catalogs\Assets\AssetType;
use Illuminate\Http\Request;

use App\Http\Requests\Catalogs\Assets\AssetTypeRequest;
use App\Http\Resources\Catalogs\Assets\AssetTypeResource;

class AssetTypeController extends Controller
{
  public function index()
  {
    $asset_types = AssetType::applySortAndFilter(request('sort'), request('filter'))->paginate(request('perPage'));
    return AssetTypeResource::collection($asset_types);
  }

  public function store(AssetTypeRequest $request)
  {
    $asset_type = AssetType::create($request->validated());
    $url =  route('asset_types.show', ['asset_type' => $asset_type->id]);
    return response()
      ->json([
        'data' => new AssetTypeResource($asset_type)
      ], 201)
      ->header('Location', $url);
  }

  public function show(AssetType $asset_type)
  {
    $getAssetType = AssetType::findOrFail($asset_type->id);
    return new AssetTypeResource($getAssetType);
  }

  public function update(AssetTypeRequest $request, AssetType $asset_type)
  {
    AssetType::where('id', $asset_type->id)->update($request->validated());
    $asset_type_updated = AssetType::findOrFail($asset_type->id);
    return new AssetTypeResource($asset_type_updated);
  }
}
