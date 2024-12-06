<?php

namespace App\Livewire\Salary;

use Livewire\Component;
use App\Models\Main\Salary;
use Livewire\Attributes\On;

class SalaryCard extends Component
{
    #[On('salaryUpdate')]

    public function render()
    {
        $Salaries = Salary::all();
        $SalariesCount = $Salaries->count();
        $SalariesSum = round($Salaries->sum('sum'), 2);

        return view('livewire.salary.salary-card', [
            'SalariesCount' => $SalariesCount,
            'SalariesSum' => $SalariesSum,
        ]);
    }
}
