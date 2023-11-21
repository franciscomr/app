<?php

namespace App\Http\Resources\Catalogs\Company;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class JobResource extends JsonResource
{
  /**
   * Transform the resource into an array.
   *
   * @return array<string, mixed>
   */
  public function toArray(Request $request): array
  {
    return [
      'type' => 'jobs',
      'id' => (string) $this->resource->id,
      'attributes' => [
        'name' => $this->resource->name,
        'createdBy' => $this->resource->createdBy,
        'updatedBy' => $this->resource->updatedBy,
        'createdAt' => $this->resource->createdAt,
        'updatedAt' => $this->resource->updatedAt
      ],
      "relationships" => [
        "department" => [
          "data" => ["id" => $this->resource->department->id, "type" => "departments"],
          'meta' => [
            'department_id' => $this->resource->department->id,
            'id' => $this->resource->department->id,
            'name' => $this->resource->department->name,
          ],
        ]
      ],
      'links' => $this->when($request->routeIs('jobs.store'), function () {
        return ['self' =>  route('jobs.show', ['job' => $this->resource->id])];
      }),
    ];
  }
}
