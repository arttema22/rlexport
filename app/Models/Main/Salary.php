<?php

namespace App\Models\Main;

use App\Models\MainModel;

class Salary extends MainModel
{
    protected $fillable = [
        'event_date',
        'owner_id',
        'driver_id',
        'sum',
        'comment',
        'profit_id',
    ];
}
