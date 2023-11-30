<?php

namespace App\Http\Resources\Catalogs\Assets;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VendorResource extends JsonResource
{
  /**
   * Transform the resource into an array.
   *
   * @return array<string, mixed>
   */
  public function toArray(Request $request): array
  {
    return [
      'type' => 'vendors',
      'id' => (string) $this->resource->id,
      'attributes' => [
        'name' => $this->resource->name,
        'costCenter' => (string) $this->resource->costCenter,
        'createdBy' => $this->resource->createdBy,
        'updatedBy' => $this->resource->updatedBy,
        'createdAt' => $this->resource->createdAt,
        'updatedAt' => $this->resource->updatedAt
      ],
      'links' => $this->when($request->routeIs('vendors.store'), function () {
        return ['self' =>  route('vendors.show', ['vendor' => $this->resource->id])];
      }),
    ];
  }
}
