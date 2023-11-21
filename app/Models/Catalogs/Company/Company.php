<?php

namespace App\Models\Catalogs\Company;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Traits\SortAndFilter;

class Company extends Model
{
    use HasFactory, SortAndFilter;

    const CREATED_AT = 'createdAt';
    const UPDATED_AT = 'updatedAt';

    protected $fillable = [
        'name',
        'businessName',
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
        'businessName',
        'address',
        'city',
        'state',
        'postalCode',
        'createdBy',
        'updatedBy',
        'createdAt',
        'updatedAt',
    ];

    public function branches(): HasMany
    {
        return $this->hasMany(Branch::class);
    }
}
