<?php

namespace Database\Factories\Catalogs\Company;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Catalogs\Company\Company;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Catalogs\Company\Company>
 */
class CompanyFactory extends Factory
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
            'businessname' => fake()->company(),
            'address' => fake()->address(),
            'city' => fake()->city(),
            'state' => fake()->state(),
            'postalCode' => fake()->numberBetween(10000, 99999),
            'createdBy' => fake()->name(),
            'updatedBy' => fake()->name()
        ];
    }
}
