<?php

namespace App\Http\Controllers;

use App\Models\Dir\DirPetrolStationBrand;
use App\Models\Refilling;
use App\Models\User;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index()
    {
        $DriversCount = User::all()->count();
        $RefillingCount = Refilling::all()->count();

        return view('welcome', [
            'DriversCount' => $DriversCount,
            'RefillingCount' => $RefillingCount,
        ]);
    }
}
