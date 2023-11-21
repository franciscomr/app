<?php

namespace Database\Seeders\Catalogs\Company;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Catalogs\Company\Company;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Company::create([
            'name' => 'SAGAJI',
            'businessName' => 'Distribuciones SAGAJI SA de CV',
            'address' => 'Anahuac #120 Col El Mirador',
            'city' => 'Coyoacan',
            'state' => 'CDMX',
            'postalCode' => '04950',
            'createdBy' => 'Administrador',
            'updatedBy' => 'Administrador'
        ]);

        Company::create([
            'name' => 'REGION MIXTECA',
            'businessName' => 'Region Mixteca Tierra del Sol S.A. DE C.V',
            'address' => 'Anahuac #120 Col El Mirador',
            'city' => 'Coyoacan',
            'state' => 'CDMX',
            'postalCode' => '04950',
            'createdBy' => 'Administrador',
            'updatedBy' => 'Administrador'
        ]);
    }
}
