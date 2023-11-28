<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create(
            [
                'employee_id' => 1,
                'name' => 'Francisco Martinez',
                'email' => 'francisco.martinez@sagaji.com.mx',
                'username' => 'francisco.martinez',
                'password' => bcrypt('Sagaji01'),
                'created_by' => 'Administrador',
                'updated_by' => 'Administrador',
            ]
        );

        User::create(
            [
                'employee_id' => 2,
                'name' => 'Marco Antonio Panales',
                'email' => 'marco.panales@sagaji.com.mx',
                'username' => 'marco.panales',
                'password' => bcrypt('Sagaji01'),
                'created_by' => 'Administrador',
                'updated_by' => 'Administrador',
            ]
        );

        User::create(
            [
                'employee_id' => 3,
                'name' => 'Pedro Barrientos',
                'email' => 'pedro.barrientos@sagaji.com.mx',
                'username' => 'pedro.barrientos',
                'password' => bcrypt('Sagaji01'),
                'created_by' => 'Administrador',
                'updated_by' => 'Administrador',
            ]
        );

        User::create(
            [
                'employee_id' => 4,
                'name' => 'Daniel Fernandez',
                'email' => 'daniel.fernandez@sagaji.com.mx',
                'username' => 'daniel.fernandez',
                'password' => bcrypt('Sagaji01'),
                'created_by' => 'Administrador',
                'updated_by' => 'Administrador',
            ]
        );
    }
}
