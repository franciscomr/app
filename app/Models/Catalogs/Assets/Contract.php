<?php

namespace App\Models\Catalogs\Assets;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Traits\SortAndFilter;

class Contract extends Model
{
    use HasFactory, SortAndFilter;

    const CREATED_AT = 'createdAt';
    const UPDATED_AT = 'updatedAt';

    protected $fillable = [
        'contract_type_id',
        'name',
        'billNumber',
        'billDate',
        'addendumNumber',
        'addendumDate',
        'seller',
        'contractStartDate',
        'contractExpirationDate',
        'warrantyExpirationDate',
        'createdBy',
        'updatedBy',
    ];

    public $SortAndFilterFields = [
        'id',
        'contract_type_id',
        'name',
        'billNumber',
        'billDate',
        'addendumNumber',
        'addendumDate',
        'seller',
        'contractStartDate',
        'contractExpirationDate',
        'warrantyExpirationDate',
        'createdBy',
        'updatedBy',
        'createdAt',
        'updatedAt',
    ];

    public function contract_type(): BelongsTo
    {
        return $this->belongsTo(ContractType::class);
    }
}
