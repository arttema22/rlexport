<?php

namespace App\Http\Controllers;

use App\Models\Sys\Truck;
use App\Models\Main\Route;
use App\Models\Dir\DirCargo;
use App\Models\Dir\DirRouteAddress;
use App\Models\Dir\DirService;
use Illuminate\Http\Request;
use App\Models\Tariff\TariffRoute;
use Illuminate\Support\Facades\Auth;

class RouteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Routes = Route::all();
        $RoutesCount = $Routes->count();
        $RoutesSum = $Routes->sum('sum');
        $Archives = Route::onlyTrashed()->where('profit_id', '!=', 0)->get();

        return view('routes.index', [
            'Routes' => $Routes,
            'RoutesCount' => $RoutesCount,
            'RoutesSum' => $RoutesSum,
            'Archives' => $Archives
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $Trucks = Truck::all();
        $Cargos = DirCargo::all();
        $Routes = TariffRoute::all();
        $Services = DirService::all();

        return view('routes.create', [
            'Trucks' => $Trucks,
            'Cargos' => $Cargos,
            'Routes' => $Routes,
            'Services' => $Services
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
            'truck' => 'required|numeric|gt:0',
            'cargo' => 'required|numeric|gt:0',
            'route' => 'required|numeric|gt:0',
            'unexpected_expenses' => 'nullable|decimal:0,2|min:10|max:9999999.99',
            'comment' => 'nullable|string',

        ]);
        dd($request);
        // создание модели данных
        $Route = new Route();
        // заполнение модели данными из формы
        $Route->event_date = $request->input('event_date');
        $Route->owner_id = Auth::user()->id;
        $Route->driver_id = Auth::user()->id;
        $Route->truck_id = $request->input('truck');
        $Route->cargo_id = $request->input('cargo');
        $RouteDotes = TariffRoute::find($request->input('route'));
        $Route->address_loading = $RouteDotes->start->name;
        $Route->address_unloading = $RouteDotes->finish->name;
        $Route->route_length = $RouteDotes->length;

        $Route->price_route = 22;

        $Route->number_trips = $request->input('number_trips');
        $Route->unexpected_expenses = $request->input('unexpected_expenses');
        $Route->sum = $Route->price_route * $Route->number_trips;
        $Route->comment = $request->input('comment');
        // сохранение данных в базе
        $Route->save();

        // Запись дополнительных услуг
        $ServiceId = $request->service_id;
        $NumOperations = $request->number_operations;
        if (!empty($ServiceId)) {
            for ($i = 0; $i < count($service_id); $i++) {
            }
        }

        // сохранение данных в базе
        // if ($Route->save()) {
        //     // Перенаправление с сообщением об успешном создании
        //     return redirect()->route('route.index')->with('success', __('Route created successfully!'));
        // } else {
        //     return redirect()->route('route.new')->with('error', __('Error creating record'));
        // }
    }

    /**
     * Display the specified resource.
     */
    public function show(Route $route)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Route $route)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Route $route)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Route $route)
    {
        //
    }
}
