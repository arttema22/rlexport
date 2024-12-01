<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Main\Refilling;

class WelcomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index()
    {
        // $DriversCount = User::all()->count();
        // $RefillingCount = Refilling::all()->count();

        return view('welcome', [
            //   'DriversCount' => $DriversCount,
            //   'RefillingCount' => $RefillingCount,
        ]);
    }
}
