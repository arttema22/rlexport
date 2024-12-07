<?php

namespace App\Livewire\Salary;

use Livewire\Component;
use App\Models\Main\Salary;

class SalaryPage extends Component
{
    public function mount() {}

    public function render()
    {
        $salaries = Salary::all();

        return view('livewire.salary.salary-page')
            ->with([
                'salaries' => $salaries,
            ]);
    }
}
