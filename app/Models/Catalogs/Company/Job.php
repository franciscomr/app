<?php

namespace App\Models\Catalogs\Company;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Traits\SortAndFilter;

class Job extends Model
{
    use HasFactory, SortAndFilter;

    const CREATED_AT = 'createdAt';
    const UPDATED_AT = 'updatedAt';

    protected $fillable = [
        'department_id',
        'name',
        'createdBy',
        'updatedBy',
    ];

    public $SortAndFilterFields = [
        'id',
        'department_id',
        'name',
        'createdBy',
        'updatedBy',
        'createdAt',
        'updatedAt',
    ];

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }
}
