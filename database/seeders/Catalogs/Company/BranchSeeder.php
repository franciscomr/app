<?php

namespace Database\Seeders\Catalogs\Company;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Catalogs\Company\Branch;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Branch::create([
            'company_id' => 1,
            'name' => 'Mexico',
            'address' => 'Anahuac #120 Col El Mirador',
            'city' => 'Coyoacan',
            'state' => 'CDMX',
            'postalCode' => '04950',
            'createdBy' => 'Administrador',
            'updatedBy' => 'Administrador',
        ]);
        Branch::create([
            'company_id' => 1,
            'name' => 'Leon',
            'address' => 'BLVD. Hidalgo No.2722 Fraccionamiento Las Aguilas',
            'city' => 'Leon',
            'state' => 'Guanajuato',
            'postalCode' => '37218',
            'createdBy' => 'Administrador',
            'updatedBy' => 'Administrador',
        ]);

        Branch::create([
            'company_id' => 1,
            'name' => 'Puebla',
            'address' => 'AV. 25 Norte No.3642-A Col. Las Cuartillas',
            'city' => 'Puebla',
            'state' => 'Puebla',
            'postalCode' => '72050',
            'createdBy' => 'Administrador',
            'updatedBy' => 'Administrador',
        ]);

        Branch::create([
            'company_id' => 1,
            'name' => 'Oaxaca',
            'address' => 'Carretera Internacional Cristobal Colon Tramo Oaxaca-Etla km 179+000',
            'city' => 'San Sebastian Etla',
            'state' => 'Oaxaca',
            'postalCode' => '68258',
            'createdBy' => 'Administrador',
            'updatedBy' => 'Administrador',
        ]);

        Branch::create([
            'company_id' => 1,
            'name' => 'Tuxtla',
            'address' => 'Prolongacion Anillos de circunvalación No.715 Col Santa Elena',
            'city' => 'Tuxtla Gutierrez',
            'state' => 'Chiapas',
            'postalCode' => '69310',
            'createdBy' => 'Administrador',
            'updatedBy' => 'Administrador',
        ]);

        Branch::create([
            'company_id' => 1,
            'name' => 'Monterrey',
            'address' => 'Av. Texcoco #701, Colonia Chapultepec',
            'city' => 'San Nicolás de los Garza',
            'state' => 'Nuevo Leon',
            'postalCode' => '66654',
            'createdBy' => 'Administrador',
            'updatedBy' => 'Administrador'
        ]);

        Branch::create([
            'company_id' => 1,
            'name' => 'Tlalnepantla',
            'address' => 'Col. Antonio M. Rivera 26, Bodega 4 Centro',
            'city' => 'Tlalnepantla',
            'state' => 'Estado de México',
            'postalCode' => '12346',
            'createdBy' => 'Administrador',
            'updatedBy' => 'Administrador'
        ]);

        Branch::create([
            'company_id' => 1,
            'name' => 'Brenamiel',
            'address' => 'Carretera Internacional No.2612  Colonia del Maestro',
            'city' => 'Pueblo Nuevo',
            'state' => 'Oaxaca',
            'postalCode' => '68285',
            'createdBy' => 'Administrador',
            'updatedBy' => 'Administrador'
        ]);

        Branch::create([
            'company_id' => 1,
            'name' => 'Periferico',
            'address' => 'Av. Símbolos Patrios No.101 Col. Miguel Alemán',
            'city' => 'Oaxaca',
            'state' => 'Oaxaca',
            'postalCode' => '68000',
            'createdBy' => 'Administrador',
            'updatedBy' => 'Administrador'
        ]);

        Branch::create([
            'company_id' => 1,
            'name' => 'Diamante',
            'address' => 'Carretera Internacional kilómetro 2.5 No.104',
            'city' => 'San Agustin Yatareni',
            'state' => 'Oaxaca',
            'postalCode' => '71228',
            'createdBy' => 'Administrador',
            'updatedBy' => 'Administrador',
        ]);

        Branch::create([
            'company_id' => 2,
            'name' => 'Tepelmeme',
            'address' => 'Carretera Cuacnopalan Tehuacán Oaxaca km123+640',
            'city' => 'Tepelmeme de Morelos',
            'state' => 'Oaxaca',
            'postalCode' => '69310',
            'createdBy' => 'Administrador',
            'updatedBy' => 'Administrador',
        ]);
    }
}
