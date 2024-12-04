<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Main\Salary;
use Illuminate\Support\Facades\Auth;
use Laravel\Jetstream\InteractsWithBanner;

class SalaryManager extends Component
{

    use InteractsWithBanner;

    public $salaries;
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
        $this->salaries = Salary::all();
        return view('livewire.salary-manager');
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
        //dd($this->event_date->format('Y-m-d'));
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

        $this->banner(__('Successfully!'));
        $this->editForm = false;
        $this->resetInputFields();
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
        $this->dangerBanner('Record deleted.');
        $this->confirmingDeletion = false;
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
}
