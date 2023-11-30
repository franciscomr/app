<?php

namespace App\Http\Resources\Catalogs\Assets;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AssetCategoryResource extends JsonResource
{
  /**
   * Transform the resource into an array.
   *
   * @return array<string, mixed>
   */
  public function toArray(Request $request): array
  {
    return [
      'type' => 'asset_categories',
      'id' => (string) $this->resource->id,
      'attributes' => [
        'name' => $this->resource->name,
        'createdBy' => $this->resource->createdBy,
        'updatedBy' => $this->resource->updatedBy,
        'createdAt' => $this->resource->createdAt,
        'updatedAt' => $this->resource->updatedAt
      ],
      'links' => $this->when($request->routeIs('asset_categories.store'), function () {
        return ['self' =>  route('asset_categories.show', ['asset_category' => $this->resource->id])];
      }),
    ];
  }
}
