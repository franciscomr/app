<?php

namespace App\Http\Resources\Catalogs\Company;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CompanyResource extends JsonResource
{
  /**
   * Transform the resource into an array.
   *
   * @return array<string, mixed>
   */
  public function toArray(Request $request): array
  {
    return [
      'type' => 'Companies',
      'id' => (string) $this->resource->id,
      'attributes' => [
        'name' => $this->resource->name,
        'businessName' => $this->resource->businessName,
        'address' => $this->resource->address,
        'city' => $this->resource->city,
        'state' => $this->resource->state,
        'postalCode' => (string) $this->resource->postalCode,
        'createdBy' => $this->resource->createdBy,
        'updatedBy' => $this->resource->updatedBy,
        'createdAt' => $this->resource->createdAt,
        'updatedAt' => $this->resource->updatedAt
      ],
      'links' => $this->when($request->routeIs('companies.store'), function () {
        return ['self' =>  route('companies.show', ['company' => $this->resource->id])];
      }),
    ];
  }
}
