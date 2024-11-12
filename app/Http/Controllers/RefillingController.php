<?php

namespace App\Http\Controllers;

use App\Models\Sys\Truck;
use Illuminate\Http\Request;
use App\Models\Main\Refilling;
use App\Models\Dir\DirPetrolStation;
use Illuminate\Support\Facades\Auth;

class RefillingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Refillings = Refilling::where('driver_id', Auth::user()->id)->orderByDesc('event_date')->get();
        $RefillingsCount = $Refillings->count();
        $RefillingsSum = $Refillings->sum('sum');
        $Archives = Refilling::onlyTrashed()->where('driver_id', Auth::user()->id)->where('profit_id', '!=', 0)
            ->orderByDesc('event_date')->get();

        return view('refillings.index', [
            'Refillings' => $Refillings,
            'RefillingsCount' => $RefillingsCount,
            'RefillingsSum' => $RefillingsSum,
            'Archives' => $Archives
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $Trucks = Truck::all();
        $PetrolStations = DirPetrolStation::all();
        return view('refillings.create', [
            'PetrolStations' => $PetrolStations,
            'Trucks' => $Trucks,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // проверка введенных данных
        $request->validate([
            'event_date' => 'required|date|before_or_equal:today',
            'volume' => 'required',
            'price' => 'required',
            'comment' => 'nullable|string',
        ]);
        // создание модели данных
        $Refilling = new Refilling();
        // заполнение модели данными из формы
        $Refilling->driver_id = Auth::user()->id;
        $Refilling->event_date = $request->input('event_date');
        $Refilling->volume = $request->input('volume');
        $Refilling->price = $request->input('price');
        $Refilling->sum = $Refilling->volume * $Refilling->price;
        $Refilling->truck_id = $request->truck;
        $Refilling->comment = $request->input('comment');
        // сохранение данных в базе
        if ($Refilling->save()) {
            // Перенаправление с сообщением об успешном создании
            return redirect()->route('refilling.index')->with('success', __('Refilling created successfully!'));
        } else {
            return redirect()->route('refilling.new')->with('error', __('Error creating record'));
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Refilling $Refilling)
    {
        return view('refillings.show', compact('Refilling'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Refilling $Refilling)
    {
        $Trucks = Truck::all();
        return view('refillings.edit', [
            'Refilling' => $Refilling,
            'Trucks' => $Trucks
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Refilling $refilling)
    {
        // Валидация входящих данных
        $data = $request->validate([
            'event_date' => 'required|date|before_or_equal:today',
            'volume' => 'required',
            'price' => 'required',
            'sum' => 'required',
            'comment' => 'nullable|string',
        ]);
        // Обновление данных модели
        $refilling->update($data);
        // Перенаправление с сообщением об успешном обновлении
        return redirect()->route('refilling.index')->with('success', __('Refilling updated successfully!'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Refilling $refilling)
    {
        if ($refilling) {
            $refilling->delete();
            // Перенаправление с сообщением об успешном удалении
            return redirect()->route('refilling.index')->with('info', __('Refilling deleted!'));
        } else {
            // Перенаправление с сообщением об ошибке
            return redirect()->route('refilling.index')->with('error', __('Refilling not found!'));
        }
    }
}
