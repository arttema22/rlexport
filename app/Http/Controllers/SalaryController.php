<?php

namespace App\Http\Controllers;

use App\Models\Salary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class SalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Salaries = Salary::where('driver_id', Auth::user()->id)->get();

        return view('salaries.index', ['Salaries' => $Salaries]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('salaries.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // проверка введенных данных
        $valid = $request->validate([
            'date' => 'required|data',
            'sum' => 'required',
            'comment' => 'string',
        ]);
        // создание модели данных
        $Salary = new Salary();
        // заполнение модели данными из формы
        $Salary->driver_id = Auth::user()->id;
        $Salary->date = $request->input('date');
        $Salary->sum = $request->input('sum');
        $Salary->comment = $request->input('comment');
        // сохранение данных в базе
        $Salary->save();
        // переход к странице списка
        return redirect()->route('salary');
    }

    /**
     * Display the specified resource.
     */
    public function show(Salary $Salary)
    {
        return view('salaries.show', compact('Salary'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Salary $salary)
    {
        return view('salaries.edit', compact('salary'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Salary $salary)
    {
        // Валидация входящих данных
        $validatedData = $request->validate([
            'data' => 'required|data',
            'sum' => 'required',
            'comment' => 'string',
        ]);

        // Обновление данных модели
        $salary->update($validatedData);

        // Перенаправление с сообщением об успешном обновлении
        return redirect()->route('salary')->with('success', __('Saiary updated successfully!'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Salary $salary)
    {

        dd($salary);

        // Находим модель по ID
        //        $model = Salary::find($salary->id);

        // Проверяем, существует ли модель
        if (!$salary) {
            return Response::json(['message' => 'Post not found'], 404);
        }

        // Удаляем модель
        $salary->delete();

        // Возвращаем ответ с статусом 200 и сообщением о успехе
        return Response::json(['message' => 'Post deleted successfully'], 200);
    }
}
