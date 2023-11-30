<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Database\Seeders\Catalogs\Company\CompanySeeder;
use Database\Seeders\Catalogs\Company\BranchSeeder;
use Database\Seeders\Catalogs\Company\DepartmentSeeder;
use Database\Seeders\Catalogs\Company\JobSeeder;
use Database\Seeders\Catalogs\Company\EmployeeSeeder;

use Database\Seeders\Catalogs\Assets\ContractTypeSeeder;
use Database\Seeders\Catalogs\Assets\ContractSeeder;
use Database\Seeders\Catalogs\Assets\AssetCategorySeeder;
use Database\Seeders\Catalogs\Assets\AssetTypeSeeder;
use Database\Seeders\Catalogs\Assets\VendorSeeder;
use Database\Seeders\Catalogs\Assets\ProductSeeder;

use Database\Seeders\UserSeeder;

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
            EmployeeSeeder::class,
            UserSeeder::class,
            ContractTypeSeeder::class,
            ContractSeeder::class,
            AssetCategorySeeder::class,
            AssetTypeSeeder::class,
            VendorSeeder::class,
            //   ProductSeeder::class
        ]);
    }
}
