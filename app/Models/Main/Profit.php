<?php

namespace App\Models\Main;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Profit extends Model
{
    protected $fillable = [
        'event_date',
        'title',
        'owner_id',
        'driver_id',
        'comment',
        'saldo_start'
    ];

    /**
     * saldo_start
     *
     * @return Attribute
     */
    protected function saldo_start(): Attribute
    {
        return Attribute::make(
            set: fn(string $value) => preg_replace('/[^0-9]/', '', $value),
        );
    }
}
