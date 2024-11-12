<?php

namespace App\Models\Main;

use App\Models\Dir\DirService;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'event_date',
        'owner_id',
        'driver_id',
        'service_id',
        'is_route',
        'route_id',
        'comment',
        'profit_id'
    ];

    /**
     * service
     *
     * @return void
     * Получить данные о тарифе
     */
    public function service()
    {
        return $this->belongsTo(DirService::class, 'service_id', 'id');
    }

    /**
     * route
     *
     * @return void
     */
    public function route()
    {
        return $this->belongsTo(Route::class, 'route_id', 'id');
    }
}
