<?php

namespace Database\Seeders\Catalogs\Assets;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Catalogs\Assets\ContractType;

class ContractTypeSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    ContractType::create(
      [
        'name' => 'Compra-Venta',
        'createdBy' => 'Administrador',
        'updatedBy' => 'Administrador',
      ]
    );

    ContractType::create(
      [
        'name' => 'Arrendamiento',
        'createdBy' => 'Administrador',
        'updatedBy' => 'Administrador',
      ]
    );

    ContractType::create(
      [
        'name' => 'Prestacion de Servicios',
        'createdBy' => 'Administrador',
        'updatedBy' => 'Administrador',
      ]
    );
  }
}
