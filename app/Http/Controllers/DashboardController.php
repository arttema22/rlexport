<?php

namespace App\Http\Controllers;

use App\Models\Main\Route;
use App\Models\Main\Salary;
use App\Models\Main\Refilling;
use App\Models\Main\BusinessTrip;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Routes = Route::all();
        $Salaries = Salary::all();
        $Refillings = Refilling::all();
        $Btrips = BusinessTrip::all();

        $RoutesCount = $Routes->count();
        $RoutesSum = round($Routes->sum('sum'), 2);
        $SalariesCount = $Salaries->count();
        $SalariesSum = round($Salaries->sum('sum'), 2);
        $RefillingsCount = $Refillings->count();
        $RefillingsSum = round($Refillings->sum('sum'), 2);
        $BtripsCount = $Btrips->count();
        $BtripsSum = round($Btrips->sum('sum'), 2);

        $Total = $RoutesSum + $SalariesSum + $RefillingsSum + $BtripsSum;

        return view('dashboard', [
            'RoutesCount' => $RoutesCount,
            'RoutesSum' => $RoutesSum,
            'SalariesCount' => $SalariesCount,
            'SalariesSum' => $SalariesSum,
            'RefillingsCount' => $RefillingsCount,
            'RefillingsSum' => $RefillingsSum,
            'BtripsCount' => $BtripsCount,
            'BtripsSum' => $BtripsSum,
            'Total' => $Total,

        ]);
    }
}
