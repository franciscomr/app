<?php

namespace App\Http\Resources\Catalogs\Company;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DepartmentResource extends JsonResource
{
  /**
   * Transform the resource into an array.
   *
   * @return array<string, mixed>
   */
  public function toArray(Request $request): array
  {
    return [
      'type' => 'departments',
      'id' => (string) $this->resource->id,
      'attributes' => [
        'id' => (string) $this->resource->id,
        'name' => $this->resource->name,
        'costCenter' => (string) $this->resource->costCenter,
        'createdBy' => $this->resource->createdBy,
        'updatedBy' => $this->resource->updatedBy,
        'createdAt' => $this->resource->createdAt,
        'updatedAt' => $this->resource->updatedAt
      ],
      'links' => $this->when($request->routeIs('departments.store'), function () {
        return ['self' =>  route('departments.show', ['department' => $this->resource->id])];
      }),
    ];
  }
}
