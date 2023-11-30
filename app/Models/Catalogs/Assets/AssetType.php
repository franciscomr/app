<?php

namespace App\Models\Catalogs\Assets;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Traits\SortAndFilter;

class AssetType extends Model
{
    use HasFactory, SortAndFilter;

    const CREATED_AT = 'createdAt';
    const UPDATED_AT = 'updatedAt';

    protected $fillable = [
        'asset_category_id',
        'name',
        'createdBy',
        'updatedBy',
    ];

    protected $SortAndFilterFields = [
        'id',
        'asset_category_id',
        'name',
        'createdBy',
        'updatedBy',
        'createdAt',
        'updatedAt',
    ];


    public function asset_category(): BelongsTo
    {
        return $this->belongsTo(AssetCategory::class);
    }
}
