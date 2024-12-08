<?php

namespace App\Livewire\Salary;

use Livewire\Component;
use App\Models\Main\Salary;
use Livewire\WithPagination;
use Livewire\Attributes\Lazy;
use Livewire\WithoutUrlPagination;
use Illuminate\Support\Facades\Auth;

#[Lazy]
class SalaryManager extends Component
{
    use WithPagination, WithoutUrlPagination;

    //    public $salaries;
    public $salary_id, $event_date, $owner_id, $driver_id, $sum, $comment;
    public $editForm = false, $confirmingDeletion = false;
    public $createOrUpdate;

    /**
     * render
     *
     * @return void
     */
    public function render()
    {
        $salaries = Salary::with(['owner'])->with(['driver'])->simplePaginate(3, pageName: 'salaries');
        return view('livewire.salary.salary-manager', ['salaries' => $salaries]);
    }

    /**
     * create
     *
     * @return void
     */
    public function create()
    {
        $this->resetInputFields();
        $this->event_date = date('Y-m-d');
        $this->createOrUpdate = 0;
        $this->editForm = true;
    }

    /**
     * edit
     *
     * @param  mixed $id
     * @return void
     */
    public function edit($id)
    {
        $this->createOrUpdate = 1;

        $salary = Salary::findOrFail($id);

        $this->salary_id = $salary->id;
        $this->event_date = $salary->event_date->format('Y-m-d');
        $this->sum = $salary->sum;
        $this->comment = $salary->comment;
        $this->editForm = true;
    }

    /**
     * store
     *
     * @return void
     */
    public function store()
    {
        $this->validate([
            'event_date' => 'required|date|before_or_equal:today',
            'sum' => 'required|decimal:0,2|min:10|max:9999999.99',
            'comment' => 'nullable|string',
        ]);

        Salary::updateOrCreate(
            ['id' => $this->salary_id],
            [
                'event_date' => $this->event_date,
                'owner_id' => Auth::user()->id,
                'driver_id' => Auth::user()->id,
                'sum' => $this->sum,
                'comment' => $this->comment,
            ]
        );
        $this->editForm = false;
        $this->resetInputFields();
        $this->dispatch('salaryUpdate');
    }

    /**
     * confirmDelete
     *
     * @param  mixed $id
     * @return void
     */
    public function confirmDelete($id)
    {
        $this->salary_id = $id;
        $this->confirmingDeletion = true;
    }

    /**
     * delete
     *
     * @return void
     */
    public function delete()
    {
        Salary::find($this->salary_id)->delete();
        $this->confirmingDeletion = false;
        $this->dispatch('salaryUpdate');
    }

    /**
     * resetInputFields
     *
     * @return void
     */
    private function resetInputFields()
    {
        $this->salary_id = null;
        $this->event_date = '';
        $this->owner_id = '';
        $this->driver_id = '';
        $this->sum = '';
        $this->comment = '';
    }

    public function placeholder()
    {
        return view('livewire.salary.spinner');
    }
}
