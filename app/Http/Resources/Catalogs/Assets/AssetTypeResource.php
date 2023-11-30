<?php

namespace App\Http\Resources\Catalogs\Assets;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AssetTypeResource extends JsonResource
{
  /**
   * Transform the resource into an array.
   *
   * @return array<string, mixed>
   */
  public function toArray(Request $request): array
  {
    return [
      'type' => 'asset_types',
      'id' => (string) $this->resource->id,
      'attributes' => [
        'name' => $this->resource->name,
        'createdBy' => $this->resource->createdBy,
        'updatedBy' => $this->resource->updatedBy,
        'createdAt' => $this->resource->createdAt,
        'updatedAt' => $this->resource->updatedAt
      ],
      "relationships" => [
        "asset_category" => [
          "data" => ["id" => $this->resource->asset_category->id, "type" => "asset_categories"],
          'meta' => [
            'asset_category_id' => $this->resource->asset_category->id,
            'id' => $this->resource->asset_category->id,
            'name' => $this->resource->asset_category->name,
          ],
        ]
      ],
      'links' => $this->when($request->routeIs('asset_types.store'), function () {
        return ['self' =>  route('asset_types.show', ['asset_type' => $this->resource->id])];
      }),
    ];
  }
}
