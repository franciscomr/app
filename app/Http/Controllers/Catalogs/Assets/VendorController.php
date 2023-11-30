<?php

namespace App\Http\Controllers\Catalogs\Assets;

use App\Http\Controllers\Controller;
use App\Models\Catalogs\Assets\Vendor;
use Illuminate\Http\Request;

use App\Http\Requests\Catalogs\Assets\VendorRequest;
use App\Http\Resources\Catalogs\Assets\VendorResource;

class VendorController extends Controller
{
  public function index()
  {
    $vendors = Vendor::applySortAndFilter(request('sort'), request('filter'))->paginate(request('perPage'));
    return VendorResource::collection($vendors);
  }

  public function store(VendorRequest $request)
  {
    $vendor = Vendor::create($request->validated());
    $url =  route('vendors.show', ['vendor' => $vendor->id]);
    return response()
      ->json([
        'data' => new VendorResource($vendor)
      ], 201)
      ->header('Location', $url);
  }

  public function show(Vendor $vendor)
  {
    $getVendor = Vendor::findOrFail($vendor->id);
    return new VendorResource($getVendor);
  }

  public function update(VendorRequest $request, Vendor $vendor)
  {
    Vendor::where('id', $vendor->id)->update($request->validated());
    $vendor_updated = Vendor::findOrFail($vendor->id);
    return new VendorResource($vendor_updated);
  }
}
