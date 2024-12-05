<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Main\BusinessTrip;
use Illuminate\Support\Facades\Auth;

class BusinessTripManager extends Component
{

    public $btrips;
    public $trip_id, $event_date, $owner_id, $driver_id, $sum, $comment;
    public $editForm = false, $confirmingDeletion = false;
    public $createOrUpdate;

    /**
     * render
     *
     * @return void
     */
    public function render()
    {
        $this->btrips = BusinessTrip::with(['owner'])
            ->with(['driver'])->get();
        return view('livewire.business-trip-manager');
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

        $salary = BusinessTrip::findOrFail($id);

        $this->trip_id = $salary->id;
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

        BusinessTrip::updateOrCreate(
            ['id' => $this->trip_id],
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
    }

    /**
     * confirmDelete
     *
     * @param  mixed $id
     * @return void
     */
    public function confirmDelete($id)
    {
        $this->trip_id = $id;
        $this->confirmingDeletion = true;
    }

    /**
     * delete
     *
     * @return void
     */
    public function delete()
    {
        BusinessTrip::find($this->salary_id)->delete();
        $this->confirmingDeletion = false;
    }

    /**
     * resetInputFields
     *
     * @return void
     */
    private function resetInputFields()
    {
        $this->trip_id = null;
        $this->event_date = '';
        $this->owner_id = '';
        $this->driver_id = '';
        $this->sum = '';
        $this->comment = '';
    }
}
