<?php

namespace App\Http\Resources\Catalogs\Assets;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ContractResource extends JsonResource
{
  /**
   * Transform the resource into an array.
   *
   * @return array<string, mixed>
   */
  public function toArray(Request $request): array
  {
    return [
      'type' => 'contracts',
      'id' => (string) $this->resource->id,
      'attributes' => [
        'name' => $this->resource->name,
        'billNumber' => $this->resource->billNumber,
        'billDate' => $this->resource->billDate,
        'addendumNumber' => $this->resource->addendumNumber,
        'addendumDate' => $this->resource->addendumDate,
        'seller' => $this->resource->seller,
        'contractStartDate' => $this->resource->contractStartDate,
        'contractExpirationDate' => $this->resource->contractExpirationDate,
        'warrantyExpirationDate' => $this->resource->warrantyExpirationDate,
        'createdBy' => $this->resource->createdBy,
        'updatedBy' => $this->resource->updatedBy,
        'createdAt' => $this->resource->createdAt,
        'updatedAt' => $this->resource->updatedAt
      ],
      "relationships" => [
        "contract_type" => [
          "data" => ["id" => $this->resource->contract_type->id, "type" => "contract_types"],
          'meta' => [
            'contract_type_id' => $this->resource->contract_type->id,
            'id' => $this->resource->contract_type->id,
            'name' => $this->resource->contract_type->name,
          ],
        ]
      ],
      'links' => $this->when($request->routeIs('contracts.store'), function () {
        return ['self' =>  route('contracts.show', ['contract' => $this->resource->id])];
      }),
    ];
  }
}
