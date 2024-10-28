<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use MoonShine\Models\MoonshineUser;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Salary>
 */
class SalaryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'salary_date' => fake()->dateTimeBetween('-2 week', '-1 day'),
            'owner_id' => MoonshineUser::all()->random(),
            'driver_id' => MoonshineUser::all()->random(),
            'sum' => fake()->randomFloat(2, 10000, 50000),
            'comment' => fake()->words(3, true),
        ];
    }
}
