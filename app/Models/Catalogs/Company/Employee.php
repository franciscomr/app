<?php

namespace App\Models\Catalogs\Company;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Traits\SortAndFilter;

class Employee extends Model
{
    use HasFactory, SortAndFilter;

    const CREATED_AT = 'createdAt';
    const UPDATED_AT = 'updatedAt';

    protected $fillable = [
        'branch_id',
        'job_id',
        'employeeId',
        'name',
        'firstSurname',
        'secondSurname',
        'hireDate',
        'createdBy',
        'updatedBy',
    ];

    public $SortAndFilterFields = [
        'id',
        'branch_id',
        'job_id',
        'employeeId',
        'name',
        'firstSurname',
        'secondSurname',
        'hireDate',
        'isActive',
        'createdBy',
        'updatedBy',
        'createdAt',
        'updatedAt',
    ];

    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }

    public function job(): BelongsTo
    {
        return $this->belongsTo(Job::class);
    }
}
