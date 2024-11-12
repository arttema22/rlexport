<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Main\BusinessTrip;
use Illuminate\Support\Facades\Auth;

class BusinessTripController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $BusinessTrips = BusinessTrip::where('driver_id', Auth::user()->id)->orderByDesc('event_date')->get();
        $BusinessTripsCount = $BusinessTrips->count();
        $BusinessTripsSum = $BusinessTrips->sum('sum');
        $Archives = BusinessTrip::onlyTrashed()->where('driver_id', Auth::user()->id)->where('profit_id', '!=', 0)
            ->orderByDesc('event_date')->get();

        return view('business-trips.index', [
            'BusinessTrips' => $BusinessTrips,
            'BusinessTripsCount' => $BusinessTripsCount,
            'BusinessTripsSum' => $BusinessTripsSum,
            'Archives' => $Archives
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('business-trips.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // проверка введенных данных
        $request->validate([
            'event_date' => 'required|date|before_or_equal:today',
            'sum' => 'required|decimal:0,2|min:10|max:9999999.99',
            'comment' => 'nullable|string',
        ]);
        // создание модели данных
        $Btrip = new BusinessTrip();
        // заполнение модели данными из формы
        $Btrip->driver_id = Auth::user()->id;
        $Btrip->event_date = $request->input('event_date');
        $Btrip->sum = $request->input('sum');
        $Btrip->comment = $request->input('comment');
        // сохранение данных в базе
        if ($Btrip->save()) {
            // Перенаправление с сообщением об успешном создании
            return redirect()->route('b-trip.index')->with('success', __('Business trip created successfully!'));
        } else {
            return redirect()->route('b-trip.new')->with('error', __('Error creating record'));
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(BusinessTrip $BusinessTrip)
    {
        return view('business-trips.show', compact('BusinessTrip'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BusinessTrip $BusinessTrip)
    {
        return view('business-trips.edit', compact('BusinessTrip'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BusinessTrip $BusinessTrip)
    {
        // Валидация входящих данных
        $data = $request->validate([
            'event_date' => 'required|date|before_or_equal:today',
            'sum' => 'required|decimal:0,2|min:10|max:9999999.99',
            'comment' => 'nullable|string',
        ]);
        // Обновление данных модели
        $BusinessTrip->update($data);
        // Перенаправление с сообщением об успешном обновлении
        return redirect()->route('b-trip.index')->with('success', __('Business trip updated successfully!'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BusinessTrip $BusinessTrip)
    {
        if ($BusinessTrip) {
            $BusinessTrip->delete();
            // Перенаправление с сообщением об успешном удалении
            return redirect()->route('b-trip.index')->with('info', __('Business trip deleted!'));
        } else {
            // Перенаправление с сообщением об ошибке
            return redirect()->route('b-trip.index')->with('error', __('Business trip not found!'));
        }
    }
}
