<?php

namespace App\Http\Controllers;

use App\Models\BusinessTrip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BusinessTripController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Btrips = BusinessTrip::where('driver_id', Auth::user()->id)->get();

        return view('business-trips.index', ['Btrips' => $Btrips]);
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(BusinessTrip $businessTrip)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BusinessTrip $businessTrip)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BusinessTrip $businessTrip)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BusinessTrip $businessTrip)
    {
        //
    }
}
