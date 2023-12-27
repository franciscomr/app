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
        $francisco_martinez = User::create(
            [
                'employee_id' => 1,
                'name' => 'Francisco Martinez',
                'email' => 'francisco.martinez@sagaji.com.mx',
                'username' => 'francisco.martinez',
                'password' => bcrypt('Sagaji01'),
                'created_by' => 'Administrador',
                'updated_by' => 'Administrador',
            ]
        )->assignRole('admin');

        $francisco_martinez->branch()->sync([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]);

        $marco_panales = User::create(
            [
                'employee_id' => 2,
                'name' => 'Marco Antonio Panales',
                'email' => 'marco.panales@sagaji.com.mx',
                'username' => 'marco.panales',
                'password' => bcrypt('Sagaji01'),
                'created_by' => 'Administrador',
                'updated_by' => 'Administrador',
            ]
        )->assignRole('admin');

        $marco_panales->branch()->sync([2]);

        $pedro_barrientos = User::create(
            [
                'employee_id' => 3,
                'name' => 'Pedro Barrientos',
                'email' => 'pedro.barrientos@sagaji.com.mx',
                'username' => 'pedro.barrientos',
                'password' => bcrypt('Sagaji01'),
                'created_by' => 'Administrador',
                'updated_by' => 'Administrador',
            ]
        )->assignRole('admin');

        $pedro_barrientos->branch()->sync([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]);

        $daniel_fernandez = User::create(
            [
                'employee_id' => 4,
                'name' => 'Daniel Fernandez',
                'email' => 'daniel.fernandez@sagaji.com.mx',
                'username' => 'daniel.fernandez',
                'password' => bcrypt('Sagaji01'),
                'created_by' => 'Administrador',
                'updated_by' => 'Administrador',
            ]
        )->assignRole('it_support');

        $daniel_fernandez->branch()->sync([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]);

        $francisco_quinto = User::create(
            [
                'employee_id' => 5,
                'name' => 'Francisco Quinto',
                'email' => 'francisco.quinto@sagaji.com.mx',
                'username' => 'francisco.quinto',
                'password' => bcrypt('Sagaji01'),
                'created_by' => 'Administrador',
                'updated_by' => 'Administrador',
            ]
        )->assignRole('auditor');;

        $francisco_quinto->branch()->sync([3]);
    }
}
