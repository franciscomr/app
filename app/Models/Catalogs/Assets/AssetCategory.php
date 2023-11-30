<?php

namespace App\Models\Catalogs\Assets;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Traits\SortAndFilter;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AssetCategory extends Model
{
    use HasFactory, SortAndFilter;

    const CREATED_AT = 'createdAt';
    const UPDATED_AT = 'updatedAt';

    protected $fillable = [
        'name',
        'createdBy',
        'updatedBy',
    ];

    protected $SortAndFilterFields = [
        'id',
        'name',
        'createdBy',
        'updatedBy',
        'createdAt',
        'updatedAt',
    ];
}
