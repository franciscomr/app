<?php

namespace App\Http\Resources\Catalogs\Company;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class JobExport extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return parent::toArray($request);
    }
}
