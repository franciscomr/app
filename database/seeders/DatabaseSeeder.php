<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Database\Seeders\Catalogs\Company\CompanySeeder;
use Database\Seeders\Catalogs\Company\BranchSeeder;
use Database\Seeders\Catalogs\Company\DepartmentSeeder;
use Database\Seeders\Catalogs\Company\JobSeeder;
use Database\Seeders\Catalogs\Company\EmployeeSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CompanySeeder::class,
            BranchSeeder::class,
            DepartmentSeeder::class,
            JobSeeder::class,
            EmployeeSeeder::class
        ]);
    }
}
