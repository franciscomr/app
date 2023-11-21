<?php

namespace App\Http\Resources\Catalogs\Company;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type' => 'employees',
            'id' => (string) $this->resource->id,
            'attributes' => [
                'employeeId' => $this->resource->employeeId,
                'name' => $this->resource->name,
                'firstSurname' => $this->resource->firstSurname,
                'secondSurname' => $this->resource->secondSurname,
                'hireDate' => (string) $this->resource->hireDate,
                'isActive' => (string) $this->resource->isActive,
                'createdBy' => $this->resource->createdBy,
                'updatedBy' => $this->resource->updatedBy,
                'createdAt' => $this->resource->createdAt,
                'updatedAt' => $this->resource->updatedAt
            ],
            "relationships" => [
                "branch" => [
                    "data" => ["id" => $this->resource->branch->id, "type" => "branches"],
                    'meta' => [
                        'branch_id' => $this->resource->branch->id,
                        'id' => $this->resource->branch->id,
                        'name' => $this->resource->branch->name,
                    ],
                ],
                "job" => [
                    "data" => ["id" => $this->resource->job->id, "type" => "jobs"],
                    'meta' => [
                        'job_id' => $this->resource->job->id,
                        'id' => $this->resource->job->id,
                        'name' => $this->resource->job->name,
                    ],
                ],
            ],
            'links' => $this->when($request->routeIs('employees.store'), function () {
                return ['self' =>  route('employees.show', ['employee' => $this->resource->id])];
            }),
        ];
    }
}
