<?php

namespace App\Http\Resources\Catalogs\Assets;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ContractTypeResource extends JsonResource
{
  /**
   * Transform the resource into an array.
   *
   * @return array<string, mixed>
   */
  public function toArray(Request $request): array
  {
    return [
      'type' => 'contract_types',
      'id' => (string) $this->resource->id,
      'attributes' => [
        'name' => $this->resource->name,
        'createdBy' => $this->resource->createdBy,
        'updatedBy' => $this->resource->updatedBy,
        'createdAt' => $this->resource->createdAt,
        'updatedAt' => $this->resource->updatedAt
      ],
      'links' => $this->when($request->routeIs('contract_types.store'), function () {
        return ['self' =>  route('contract_types.show', ['contract_type' => $this->resource->id])];
      }),
    ];
  }
}
