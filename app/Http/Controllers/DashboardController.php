<?php

namespace App\Http\Controllers;

use App\Models\Salary;
use App\Models\Refilling;
use App\Models\BusinessTrip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $SalariesCount = Salary::where('driver_id', Auth::user()->id)->count();
        $SalariesSum = round(Salary::where('driver_id', Auth::user()->id)->sum('sum'), 2);
        $RefillingsCount = Refilling::where('driver_id', Auth::user()->id)->count();
        $RefillingsSum = round(Refilling::where('driver_id', Auth::user()->id)->sum('sum'), 2);
        $BtripsCount = BusinessTrip::where('driver_id', Auth::user()->id)->count();
        $BtripsSum = round(BusinessTrip::where('driver_id', Auth::user()->id)->sum('sum'), 2);

        return view('dashboard', [
            'SalariesCount' => $SalariesCount,
            'SalariesSum' => $SalariesSum,
            'RefillingsCount' => $RefillingsCount,
            'RefillingsSum' => $RefillingsSum,
            'BtripsCount' => $BtripsCount,
            'BtripsSum' => $BtripsSum,
        ]);
    }
}
