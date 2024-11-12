<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Sys\MoonshineUser;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BusinessTrip>
 */
class BusinessTripFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'event_date' => fake()->dateTimeBetween('-2 week', '-1 day'),
            'owner_id' => MoonshineUser::all()->random(),
            'driver_id' => User::all()->random(),
            'sum' => fake()->randomFloat(2, 10000, 50000),
            'comment' => fake()->words(3, true),
        ];
    }
}
