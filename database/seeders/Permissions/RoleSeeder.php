<?php

namespace Database\Seeders\Permissions;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Role::create(['name' => 'admin']);
        $it_support = Role::create(['name' => 'it_support']);
        $auditor = Role::create(['name' => 'auditor']);

        Permission::create(['name' => 'companies.index'])->syncRoles([$admin, $it_support, $auditor]);
        Permission::create(['name' => 'companies.show'])->syncRoles([$admin, $it_support, $auditor]);
        Permission::create(['name' => 'companies.store'])->syncRoles([$admin]);
        Permission::create(['name' => 'companies.update'])->syncRoles([$admin]);
        Permission::create(['name' => 'companies.export'])->syncRoles([$admin, $it_support, $auditor]);

        Permission::create(['name' => 'branches.index'])->syncRoles([$admin, $it_support, $auditor]);
        Permission::create(['name' => 'branches.show'])->syncRoles([$admin, $it_support, $auditor]);
        Permission::create(['name' => 'branches.store'])->syncRoles([$admin]);
        Permission::create(['name' => 'branches.update'])->syncRoles([$admin]);
        Permission::create(['name' => 'branches.export'])->syncRoles([$admin, $it_support, $auditor]);

        Permission::create(['name' => 'departments.index'])->syncRoles([$admin, $it_support, $auditor]);
        Permission::create(['name' => 'departments.show'])->syncRoles([$admin, $it_support, $auditor]);
        Permission::create(['name' => 'departments.store'])->syncRoles([$admin]);
        Permission::create(['name' => 'departments.update'])->syncRoles([$admin]);
        Permission::create(['name' => 'departments.export'])->syncRoles([$admin, $it_support, $auditor]);

        Permission::create(['name' => 'jobs.index'])->syncRoles([$admin, $it_support, $auditor]);
        Permission::create(['name' => 'jobs.show'])->syncRoles([$admin, $it_support, $auditor]);
        Permission::create(['name' => 'jobs.store'])->syncRoles([$admin, $it_support]);
        Permission::create(['name' => 'jobs.update'])->syncRoles([$admin]);
        Permission::create(['name' => 'jobs.export'])->syncRoles([$admin, $it_support, $auditor]);

        Permission::create(['name' => 'employees.index'])->syncRoles([$admin, $it_support, $auditor]);
        Permission::create(['name' => 'employees.show'])->syncRoles([$admin, $it_support, $auditor]);
        Permission::create(['name' => 'employees.store'])->syncRoles([$admin, $it_support]);
        Permission::create(['name' => 'employees.update'])->syncRoles([$admin]);
        Permission::create(['name' => 'employees.export'])->syncRoles([$admin, $it_support, $auditor]);

        Permission::create(['name' => 'contract_types.index'])->syncRoles([$admin, $it_support, $auditor]);
        Permission::create(['name' => 'contract_types.show'])->syncRoles([$admin, $it_support, $auditor]);
        Permission::create(['name' => 'contract_types.store'])->syncRoles([$admin]);
        Permission::create(['name' => 'contract_types.update'])->syncRoles([$admin]);
        Permission::create(['name' => 'contract_types.export'])->syncRoles([$admin, $it_support, $auditor]);

        Permission::create(['name' => 'contracts.index'])->syncRoles([$admin, $it_support, $auditor]);
        Permission::create(['name' => 'contracts.show'])->syncRoles([$admin, $it_support, $auditor]);
        Permission::create(['name' => 'contracts.store'])->syncRoles([$admin]);
        Permission::create(['name' => 'contracts.update'])->syncRoles([$admin]);
        Permission::create(['name' => 'contracts.export'])->syncRoles([$admin, $it_support, $auditor]);

        Permission::create(['name' => 'asset_categories.index'])->syncRoles([$admin, $it_support, $auditor]);
        Permission::create(['name' => 'asset_categories.show'])->syncRoles([$admin, $it_support, $auditor]);
        Permission::create(['name' => 'asset_categories.store'])->syncRoles([$admin]);
        Permission::create(['name' => 'asset_categories.update'])->syncRoles([$admin]);
        Permission::create(['name' => 'asset_categories.export'])->syncRoles([$admin, $it_support, $auditor]);

        Permission::create(['name' => 'asset_types.index'])->syncRoles([$admin, $it_support, $auditor]);
        Permission::create(['name' => 'asset_types.show'])->syncRoles([$admin, $it_support, $auditor]);
        Permission::create(['name' => 'asset_types.store'])->syncRoles([$admin]);
        Permission::create(['name' => 'asset_types.update'])->syncRoles([$admin]);
        Permission::create(['name' => 'asset_types.export'])->syncRoles([$admin, $it_support, $auditor]);

        Permission::create(['name' => 'vendors.index'])->syncRoles([$admin, $it_support, $auditor]);
        Permission::create(['name' => 'vendors.show'])->syncRoles([$admin, $it_support, $auditor]);
        Permission::create(['name' => 'vendors.store'])->syncRoles([$admin]);
        Permission::create(['name' => 'vendors.update'])->syncRoles([$admin]);
        Permission::create(['name' => 'vendors.export'])->syncRoles([$admin, $it_support, $auditor]);
    }
}
