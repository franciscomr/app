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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->unique(array('name', 'firstSurname', 'secondSurname'));
            $table->foreignId('branch_id')->constrained();
            $table->foreignId('job_id')->constrained();
            $table->string('employeeId')->nullable();
            $table->string('name');
            $table->string('firstSurname');
            $table->string('secondSurname');
            $table->date('hireDate');
            $table->boolean('isActive')->default(true);
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
        Schema::dropIfExists('employees');
    }
};
