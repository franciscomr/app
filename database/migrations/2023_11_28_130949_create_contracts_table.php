<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('contract_type_id')->constrained();
            $table->unique(array('billNumber', 'addendumNumber'));
            $table->string('name')->unique();
            $table->string('billNumber');
            $table->date('billDate');
            $table->string('addendumNumber')->nullable();
            $table->date('addendumDate')->nullable();
            $table->string('seller');
            $table->date('contractStartDate')->nullable();
            $table->date('contractExpirationDate')->nullable();
            $table->date('warrantyExpirationDate')->nullable();
            $table->string('createdBy');
            $table->string('updatedBy');
            $table->timestamp('createdAt')->useCurrent();
            $table->timestamp('updatedAt')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contracts');
    }
};
