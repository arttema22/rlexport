<?php

namespace App\Http\Controllers;

use App\Models\Dir\DirFuelCategory;
use App\Models\Dir\DirFuelType;
use App\Models\Sys\Truck;
use Illuminate\Http\Request;
use App\Models\Main\Refilling;
use App\Models\Dir\DirPetrolStation;
use Illuminate\Support\Facades\Auth;
use App\Models\Dir\DirPetrolStationBrand;

class RefillingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Refillings = Refilling::all();
        $RefillingsCount = $Refillings->count();
        $RefillingsSum = $Refillings->sum('sum');
        $Archives = Refilling::onlyTrashed()->where('profit_id', '!=', 0)->get();

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
        $PSBrands = DirPetrolStationBrand::all();
        $PStations = DirPetrolStation::all();
        $FuelCats = DirFuelCategory::all();
        $FuelTypes = DirFuelType::all();
        $Trucks = Truck::all();

        return view('refillings.create', [
            'PStations' => $PStations,
            'PSBrands' => $PSBrands,
            'FuelCats' => $FuelCats,
            'FuelTypes' => $FuelTypes,
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
            'truck' => 'required|numeric|gt:0'
        ]);
        // создание модели данных
        $Refilling = new Refilling();
        // заполнение модели данными из формы
        $Refilling->driver_id = Auth::user()->id;
        $Refilling->event_date = $request->input('event_date');
        $Refilling->volume = $request->input('volume');
        $Refilling->price = $request->input('price');
        $Refilling->sum = $Refilling->volume * $Refilling->price;
        $Refilling->dir_petrol_station_brand_id = $request->brand;
        $Refilling->dir_petrol_station_id = $request->pstation;
        $Refilling->dir_fuel_category_id = $request->fielcat;
        $Refilling->dir_fuel_type_id = $request->fieltype;
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
        $PSBrands = DirPetrolStationBrand::all();
        $PStations = DirPetrolStation::all();
        $FuelCats = DirFuelCategory::all();
        $FuelTypes = DirFuelType::all();
        $Trucks = Truck::all();
        return view('refillings.edit', [
            'Refilling' => $Refilling,
            'PStations' => $PStations,
            'PSBrands' => $PSBrands,
            'FuelCats' => $FuelCats,
            'FuelTypes' => $FuelTypes,
            'Trucks' => $Trucks,
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
