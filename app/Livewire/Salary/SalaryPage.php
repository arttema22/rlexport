<?php

namespace App\Livewire\Salary;

use Livewire\Component;
use App\Models\Main\Salary;
use Livewire\WithPagination;
use Livewire\Attributes\Lazy;
use Livewire\WithoutUrlPagination;

#[Lazy]
class SalaryPage extends Component
{
    use WithPagination, WithoutUrlPagination;

    public function render()
    {
        $salaries = Salary::with(['owner'])->with(['driver'])->simplePaginate(3, pageName: 'salaries');
        return view('livewire.salary.salary-page')
            ->with([
                'salaries' => $salaries,
            ]);
    }

    public function placeholder()
    {
        return view('livewire.salary.spinner');
    }
}
