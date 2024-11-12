<?php

namespace Database\Seeders;

use App\Models\Main\Route;
use Illuminate\Database\Seeder;

class RouteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Route::factory()->count(280)->create();
    }
}
