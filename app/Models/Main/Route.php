<?php

namespace App\Models\Main;

use App\Models\Dir\DirCargo;
use App\Models\MainModel;

class Route extends MainModel
{
    protected $fillable = [
        'event_date',
        'owner_id',
        'driver_id',
        'unexpected_expenses',
        'comment',
        'profit_id',
    ];

    public function cargo()
    {
        return $this->belongsTo(DirCargo::class, 'cargo_id', 'id');
    }
}
