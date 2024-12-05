<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Main\Salary;

class SalaryArchive extends Component
{
    public $salaries;

    public function render()
    {
        $this->salaries = Salary::with(['owner'])
            ->with(['driver'])->get();
        return view('livewire.salary-archive');
    }
}
