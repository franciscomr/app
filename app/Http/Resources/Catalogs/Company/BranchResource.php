<?php

namespace App\Http\Resources\Catalogs\Company;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BranchResource extends JsonResource
{
	/**
	 * Transform the resource into an array.
	 *
	 * @return array<string, mixed>
	 */
	public function toArray(Request $request): array
	{
		return [
			'type' => 'branches',
			'id' => (string) $this->resource->id,
			'attributes' => [
				'id' => (string) $this->resource->id,
				'name' => $this->resource->name,
				'address' => $this->resource->address,
				'city' => $this->resource->city,
				'state' => $this->resource->state,
				'postalCode' => (string) $this->resource->postalCode,
				'createdBy' => $this->resource->createdBy,
				'updatedBy' => $this->resource->updatedBy,
				'createdAt' => $this->resource->createdAt,
				'updatedAt' => $this->resource->updatedAt
			],
			"relationships" => [
				"companies" => [
					"data" => ["id" => $this->resource->company->id, "type" => "companies"],
					'meta' => [
						'company_id' => $this->resource->company->id,
						'id' => $this->resource->company->id,
						'name' => $this->resource->company->name,
					],
				]
			],
			'links' => $this->when($request->routeIs('branches.store'), function () {
				return ['self' =>  route('branches.show', ['branch' => $this->resource->id])];
			}),
		];
	}
}
