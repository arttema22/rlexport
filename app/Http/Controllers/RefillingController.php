<?php

namespace App\Http\Controllers;

use App\Models\Refilling;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RefillingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Refillings = Refilling::where('driver_id', Auth::user()->id)->orderByDesc('refilling_date')->get();
        return view('refillings.index', ['Refillings' => $Refillings]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('refillings.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // проверка введенных данных
        $valid = $request->validate([
            'date' => 'required',
            'volume' => 'required',
            'price' => 'required',
        ]);
        // создание модели данных
        $Refilling = new Refilling();
        // заполнение модели данными из формы
        $Refilling->driver_id = Auth::user()->id;
        $Refilling->date = $request->input('date');
        $Refilling->volume = $request->input('volume');
        $Refilling->price = $request->input('price');
        $Refilling->sum = $request->input('sum');
        $Refilling->comment = $request->input('comment');
        // сохранение данных в базе
        $Refilling->save();
        // переход к странице списка
        return redirect()->route('refillings');
    }

    /**
     * Display the specified resource.
     */
    public function show(Refilling $refilling)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Refilling $refilling)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Refilling $refilling)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Refilling $refilling)
    {
        //
    }
}
