<?php

namespace App\Models\Main;

use App\Models\MainModel;
use App\Models\Scopes\OnlyUserScope;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;

#[ScopedBy([OnlyUserScope::class])]
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
