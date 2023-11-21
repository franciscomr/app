<?php

namespace App\Models\Catalogs\Company;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Traits\SortAndFilter;

class Department extends Model
{
    use HasFactory, SortAndFilter;

    const CREATED_AT = 'createdAt';
    const UPDATED_AT = 'updatedAt';

    protected $fillable = [
        'name',
        'costCenter',
        'createdBy',
        'updatedBy',
    ];

    protected $SortAndFilterFields = [
        'id',
        'name',
        'costCenter',
        'createdBy',
        'updatedBy',
        'createdAt',
        'updatedAt',
    ];

    public function jobs(): HasMany
    {
        return $this->hasMany(Job::class);
    }
}
