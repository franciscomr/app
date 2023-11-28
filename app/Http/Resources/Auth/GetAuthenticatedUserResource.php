<?php

namespace App\Http\Resources\Auth;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GetAuthenticatedUserResource extends JsonResource
{
  /**
   * Transform the resource into an array.
   *
   * @return array<string, mixed>
   */
  public function toArray(Request $request): array
  {
    return [
      'type' => 'users',
      'id' => (string) $this->resource->id,
      'attributes' => [
        'username' => $this->resource->username,
        'email' => $this->resource->email,
      ],
      "relationships" => [
        "employee" => [
          "data" => ["id" => $this->resource->employee->id, "type" => "employees"],
          'meta' => [
            'employee_id' => $this->resource->employee->id,
            'id' => $this->resource->employee->id,
            'name' => $this->resource->employee->name,
          ],
        ]
      ]
    ];
  }
}
