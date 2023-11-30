<?php

namespace Database\Seeders\Catalogs\Assets;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Catalogs\Assets\Contract;

class ContractSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    Contract::create(
      [
        'contract_type_id' => 1,
        'name' => 'Activo Fijo',
        'billNumber' => 'AF-0001',
        'billDate' => '1990-12-10',
        'seller' => 'SAGAJI',
        'createdBy' => 'Administrador',
        'updatedBy' => 'Administrador',
      ]
    );

    Contract::create(
      [
        'contract_type_id' => 2,
        'name' => 'Arrendamiento Dell Oct 2023',
        'billNumber' => 'DELL-001',
        'billDate' =>  '2021-10-10',
        'seller' => 'HP',
        'contractStartDate' => '2021-10-10',
        'contractExpirationDate' => '2024-03-10',
        'warrantyExpirationDate' => '2024-03-10',
        'createdBy' => 'Administrador',
        'updatedBy' => 'Administrador',
      ]
    );
  }
}
