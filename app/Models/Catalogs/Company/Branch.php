<?php

namespace App\Models\Catalogs\Company;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Traits\SortAndFilter;

class Branch extends Model
{
    use HasFactory, SortAndFilter;

    const CREATED_AT = 'createdAt';
    const UPDATED_AT = 'updatedAt';

    protected $fillable = [
        'name',
        'company_id',
        'address',
        'city',
        'state',
        'postalCode',
        'createdBy',
        'updatedBy'
    ];

    public $SortAndFilterFields = [
        'id',
        'name',
        'address',
        'createdAt',
        'updatedAt',
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
}
