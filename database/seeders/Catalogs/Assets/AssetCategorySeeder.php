<?php

namespace Database\Seeders\Catalogs\Assets;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Catalogs\Assets\AssetCategory;

class AssetCategorySeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    AssetCategory::create(
      [
        'name' => 'Accesorios de Cómputo',
        'createdBy' => 'Administrador',
        'updatedBy' => 'Administrador',
      ]
    );

    AssetCategory::create(
      [
        'name' => 'Aire Acondicionado',
        'createdBy' => 'Administrador',
        'updatedBy' => 'Administrador',
      ]
    );

    AssetCategory::create(
      [
        'name' => 'Audio',
        'createdBy' => 'Administrador',
        'updatedBy' => 'Administrador',
      ]
    );

    AssetCategory::create(
      [
        'name' => 'CCTV',
        'createdBy' => 'Administrador',
        'updatedBy' => 'Administrador',
      ]
    );


    AssetCategory::create(
      [
        'name' => 'Equipo de Cómputo',
        'createdBy' => 'Administrador',
        'updatedBy' => 'Administrador',
      ]
    );

    AssetCategory::create(
      [
        'name' => 'Impresión',
        'createdBy' => 'Administrador',
        'updatedBy' => 'Administrador',
      ]
    );

    AssetCategory::create(
      [
        'name' => 'Redes',
        'createdBy' => 'Administrador',
        'updatedBy' => 'Administrador',
      ]
    );

    AssetCategory::create(
      [
        'name' => 'Software',
        'createdBy' => 'Administrador',
        'updatedBy' => 'Administrador',
      ]
    );

    AssetCategory::create(
      [
        'name' => 'Telefonia Fija',
        'createdBy' => 'Administrador',
        'updatedBy' => 'Administrador',
      ]
    );

    AssetCategory::create(
      [
        'name' => 'Telefonia Movil',
        'createdBy' => 'Administrador',
        'updatedBy' => 'Administrador',
      ]
    );

    AssetCategory::create(
      [
        'name' => 'Video',
        'createdBy' => 'Administrador',
        'updatedBy' => 'Administrador',
      ]
    );
  }
}
