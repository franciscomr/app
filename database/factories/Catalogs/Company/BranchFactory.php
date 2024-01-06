<?php

namespace Database\Factories\Catalogs\Company;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Catalogs\Company\Branch;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Catalogs\Company\Branch>
 */
class BranchFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->company(),
            'company_id' =>  fake()->numberBetween(1, 2),
            'address' => fake()->address(),
            'city' => fake()->city(),
            'state' => fake()->state(),
            'postalCode' => fake()->numberBetween(10000, 99999),
            'createdBy' => fake()->name(),
            'updatedBy' => fake()->name()
        ];
    }
}
