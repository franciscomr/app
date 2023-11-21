<?php

namespace App\Http\Resources\Catalogs\Company;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CompanyExport extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
      return [
        'meta'=>[
          'export'=>[
            'id' =>  $this->resource->id,
            'Empresa' => $this->resource->name,
            'Razon Social' => $this->resource->businessName,
            'Dirección' => $this->resource->address,
            'Ciudad/Población' => $this->resource->city,
            'Estado' => $this->resource->state,
            'Codigo Postal' => $this->resource->postalCode,
            'Creado Por' => $this->resource->createdBy,
            'Actualizado Por' => $this->resource->updatedBy,
            'Creado a las' => $this->resource->createdAt,
            'Actualizado a las' => $this->resource->updatedAt
            ]
          ]
        ];
    }
}
