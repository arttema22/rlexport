<?php

namespace App\Models\Main;

use App\Models\MainModel;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;

class BusinessTrip extends MainModel
{
    protected $fillable = [
        'b_trip_date',
        'owner_id',
        'driver_id',
        'sum',
        'comment',
        'profit_id',
    ];

    /**
     * bTripDate
     *
     * @return Attribute
     */
    protected function bTripDate(): Attribute
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
