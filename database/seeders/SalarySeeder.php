<?php

namespace Database\Seeders;

use App\Models\Main\Salary;
use Illuminate\Database\Seeder;

class SalarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Salary::factory()->count(65)->create();
    }
}
