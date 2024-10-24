<?php

namespace App\Http\Controllers;

use App\Models\Salary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Salaries = Salary::where('driver_id', Auth::user()->id)->orderByDesc('salary_date')->get();
        $Archives = Salary::onlyTrashed()->where('driver_id', Auth::user()->id)->where('profit_id', '!=', 0)
            ->orderByDesc('salary_date')->get();

        return view('salaries.index', [
            'Salaries' => $Salaries,
            'Archives' => $Archives
        ]);
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
        $request->validate([
            'salary_date' => 'required|date|before_or_equal:today',
            'sum' => 'required|decimal:0,2|min:10|max:9999999.99',
            'comment' => 'nullable|string',
        ]);
        // создание модели данных
        $Salary = new Salary();
        // заполнение модели данными из формы
        $Salary->driver_id = Auth::user()->id;
        $Salary->salary_date = $request->input('salary_date');
        $Salary->sum = $request->input('sum');
        $Salary->comment = $request->input('comment');
        // сохранение данных в базе
        $Salary->save();
        // Перенаправление с сообщением об успешном создании
        return redirect()->route('salary.index')->with('success', __('Saiary created successfully!'));
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
        $data = $request->validate([
            'salary_date' => 'required|date|before_or_equal:today',
            'sum' => 'required|decimal:0,2|min:10|max:9999999.99',
            'comment' => 'nullable|string',
        ]);
        // Обновление данных модели
        $salary->update($data);
        // Перенаправление с сообщением об успешном обновлении
        return redirect()->route('salary.index')->with('success', __('Saiary updated successfully!'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Salary $salary)
    {
        if ($salary) {
            $salary->delete();
            // Перенаправление с сообщением об успешном удалении
            return redirect()->route('salary.index')->with('success', __('Saiary deleted!'));
        } else {
            // Перенаправление с сообщением об ошибке
            return redirect()->route('salary.index')->with('error', __('Saiary not found!'));
        }
    }
}
