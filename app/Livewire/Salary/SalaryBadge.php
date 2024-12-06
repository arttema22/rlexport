<?php

namespace App\Livewire\Salary;

use Livewire\Component;
use App\Models\Main\Salary;
use Livewire\Attributes\On;

class SalaryBadge extends Component
{
    #[On('salaryUpdate')]

    public function render()
    {
        $Salaries = Salary::all();
        $SalariesSum = round($Salaries->sum('sum'), 2);
        return view('livewire.salary.salary-badge', [
            'SalariesSum' => $SalariesSum,
        ]);
    }
}
