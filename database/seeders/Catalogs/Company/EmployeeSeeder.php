<?php

namespace Database\Seeders\Catalogs\Company;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Catalogs\Company\Employee;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Employee::create(
            [
                'branch_id' => 4,
                'job_id' => 17,
                'employeeId' => 'E03583',
                'name' => 'Francisco',
                'firstSurname' => 'Martinez',
                'secondSurname' => 'Ramirez',
                'hireDate' => '2009-02-09',
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );
        Employee::create(
            [
                'branch_id' => 2,
                'job_id' => 17,
                'employeeId' => 'E04460',
                'name' => 'Marco Antonio',
                'firstSurname' => 'Panales',
                'secondSurname' => 'Nuñez',
                'hireDate' => '2012-04-16',
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );
        Employee::create(
            [
                'branch_id' => 1,
                'job_id' => 17,
                'employeeId' => 'E04951',
                'name' => 'Pedro',
                'firstSurname' => 'Barrientos',
                'secondSurname' => 'Campuzano',
                'hireDate' => '2013-10-10',
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );
        Employee::create(
            [
                'branch_id' => 1,
                'job_id' => 17,
                'employeeId' => 'E06020',
                'name' => 'Daniel',
                'firstSurname' => 'Fernandez',
                'secondSurname' => 'Gutierrez',
                'hireDate' => '2016-01-11',
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );
        Employee::create(
            [
                'branch_id' => 3,
                'job_id' => 17,
                'employeeId' => 'E07601',
                'name' => 'Francisco Javier',
                'firstSurname' => 'Quinto',
                'secondSurname' => 'Jimenez',
                'hireDate' => '2018-12-06',
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );
        Employee::create(
            [
                'branch_id' => 5,
                'job_id' => 17,
                'employeeId' => 'E08692',
                'name' => 'Juan Carlos',
                'firstSurname' => 'Avendaño',
                'secondSurname' => 'Anza',
                'hireDate' => '2021-09-28',
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );
        Employee::create(
            [
                'branch_id' => 7,
                'job_id' => 17,
                'employeeId' => 'E09738',
                'name' => 'Eduardo',
                'firstSurname' => 'Franco',
                'secondSurname' => 'Gutierrez',
                'hireDate' => '2023-01-13',
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );
    }
}
