<?php

namespace Database\Seeders\Catalogs\Company;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Catalogs\Company\Department;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Department::create(
            [
                'name' => 'Administracion de Inventarios',
                'costCenter' => 1000,
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );
        Department::create(
            [
                'name' => 'Administracion y Finanzas',
                'costCenter' => 1001,
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );
        Department::create(
            [
                'name' => 'Almacen',
                'costCenter' => 1002,
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );
        Department::create(
            [
                'name' => 'Archivo',
                'costCenter' => 1003,
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );
        Department::create(
            [
                'name' => 'Auditoria Interna',
                'costCenter' => 1004,
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );
        Department::create(
            [
                'name' => 'Capital Humano',
                'costCenter' => 1005,
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );
        Department::create(
            [
                'name' => 'Centro de Soluciones',
                'costCenter' => 1006,
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );
        Department::create(
            [
                'name' => 'Cielo Mixteco',
                'costCenter' => 1007,
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );
        Department::create(
            [
                'name' => 'Compras',
                'costCenter' => 1008,
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );
        Department::create(
            [
                'name' => 'Contabilidad',
                'costCenter' => 1009,
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );
        Department::create(
            [
                'name' => 'Contraloria Cedis',
                'costCenter' => 1010,
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );
        Department::create(
            [
                'name' => 'Credito y Cobranza',
                'costCenter' => 1011,
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );
        Department::create(
            [
                'name' => 'Cuentas por Pagar',
                'costCenter' => 1012,
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );
        Department::create(
            [
                'name' => 'Direccion General',
                'costCenter' => 1013,
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );
        Department::create(
            [
                'name' => 'Informacion Comercial',
                'costCenter' => 1014,
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );
        Department::create(
            [
                'name' => 'Ingenieria de Producto',
                'costCenter' => 1015,
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );
        Department::create(
            [
                'name' => 'Juridico',
                'costCenter' => 1016,
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );
        Department::create(
            [
                'name' => 'Limpieza',
                'costCenter' => 1017,
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );
        Department::create(
            [
                'name' => 'Logistica y Distribucion',
                'costCenter' => 1018,
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );
        Department::create(
            [
                'name' => 'Mantenimiento',
                'costCenter' => 1019,
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );
        Department::create(
            [
                'name' => 'Mercadotecnia',
                'costCenter' => 1020,
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );
        Department::create(
            [
                'name' => 'Seguridad Patrimonial',
                'costCenter' => 1021,
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );
        Department::create(
            [
                'name' => 'Soporte Técnico y Desarrollo',
                'costCenter' => 1022,
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );
        Department::create(
            [
                'name' => 'Telemarketing',
                'costCenter' => 1023,
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );
        Department::create(
            [
                'name' => 'Tesoreria',
                'costCenter' => 1024,
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );
        Department::create(
            [
                'name' => 'Union',
                'costCenter' => 1025,
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );
        Department::create(
            [
                'name' => 'Ventas',
                'costCenter' => 1026,
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );
    }
}
