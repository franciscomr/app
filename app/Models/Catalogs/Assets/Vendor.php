<?php

namespace App\Models\Catalogs\Assets;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Traits\SortAndFilter;

class Vendor extends Model
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
}
