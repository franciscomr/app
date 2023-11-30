<?php

namespace App\Http\Controllers\Catalogs\Assets;

use App\Http\Controllers\Controller;
use App\Models\Catalogs\Assets\AssetCategory;
use Illuminate\Http\Request;

use App\Http\Requests\Catalogs\Assets\AssetCategoryRequest;
use App\Http\Resources\Catalogs\Assets\AssetCategoryResource;

class AssetCategoryController extends Controller
{
  public function index()
  {
    $asset_categories = AssetCategory::applySortAndFilter(request('sort'), request('filter'))->paginate(request('perPage'));
    return AssetCategoryResource::collection($asset_categories);
  }

  public function store(AssetCategoryRequest $request)
  {
    $asset_category = AssetCategory::create($request->validated());
    $url =  route('asset_categories.show', ['asset_category' => $asset_category->id]);
    return response()
      ->json([
        'data' => new AssetCategoryResource($asset_category)
      ], 201)
      ->header('Location', $url);
  }

  public function show(AssetCategory $asset_category)
  {
    $getAssetCategory = AssetCategory::findOrFail($asset_category->id);
    return new AssetCategoryResource($getAssetCategory);
  }

  public function update(AssetCategoryRequest $request, AssetCategory $asset_category)
  {
    AssetCategory::where('id', $asset_category->id)->update($request->validated());
    $asset_category_updated = AssetCategory::findOrFail($asset_category->id);
    return new AssetCategoryResource($asset_category_updated);
  }
}
