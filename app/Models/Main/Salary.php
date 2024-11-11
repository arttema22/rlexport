<?php

namespace App\Models\Main;

use App\Models\MainModel;
use Illuminate\Support\Carbon;
use MoonShine\Models\MoonshineUser;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Salary extends MainModel
{
    protected $fillable = [
        'salary_date',
        'owner_id',
        'driver_id',
        'sum',
        'comment',
        'profit_id',
    ];

    /**
     * salaryDate
     *
     * @return Attribute
     */
    protected function salaryDate(): Attribute
    {
        return Attribute::make(
            get: fn(string $value) => Carbon::createFromTimestamp(strtotime($value))
                ->format(config('app.date_format')),
        );
    }

    /**
     * sum
     *
     * @return Attribute
     */
    protected function sum(): Attribute
    {
        return Attribute::make(
            get: fn(string $value) => number_format($value, 2, ',', ' '),
        );
    }
}
