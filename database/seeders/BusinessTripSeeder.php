<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Main\BusinessTrip;

class BusinessTripSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BusinessTrip::factory()->count(33)->create();
    }
}
