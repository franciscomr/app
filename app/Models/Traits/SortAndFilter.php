<?php

namespace App\Models\Traits;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;


trait SortAndFilter
{
  public function scopeApplySortAndFilter(Builder $query, $sortRequest, $filterRequest) {
    $this->validateIfParamsExists();

    if (is_null($sortRequest) && is_null($filterRequest)) {
      return;
    } 
    else {
      $this->SortData($query, $sortRequest);
      $this->Filterdata($query, $filterRequest);
    }
  } 

  private function validateIfParamsExists()
  {
    if (!property_exists($this, 'SortAndFilterFields')) {
      abort(500, 'SortAndFilterFields Array is not defined in Model' . get_class($this));
    }
  }

  private function SortData(Builder $query, $sortRequest)
  {
    if (!is_null($sortRequest)) {
      $sortFields = Str::of($sortRequest)->explode(',');
      foreach ($sortFields as $sortField) {
        $direction = 'asc';
        if (Str::of($sortField)->startsWith('-')) {
          $direction = 'desc';
          $sortField = Str::of($sortField)->substr(1);
        }
        if (!collect($this->SortAndFilterFields)->contains($sortField)) {
          abort(400, "Sort Request {$sortField} is not allowed");
        }
        $query->orderBy($sortField, $direction);
      }
    }
    return $query;
  }

  private function Filterdata(Builder $query, $filterRequest)
  {
    if (!is_null($filterRequest)) {
      foreach ($filterRequest as $filter => $value) {
        if (!collect($this->SortAndFilterFields)->contains($filter)) {
          abort(400, "Filter parameter {$filter} is not allowed");
        } else {
          $query->where($filter, 'like', '%' . $value . '%');
        }
      }
    }
    return $query;
  }
}
