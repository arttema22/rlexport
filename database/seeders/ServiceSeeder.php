<?php

namespace Database\Seeders;

use App\Models\Main\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Service::factory()->count(93)->create();
    }
}
