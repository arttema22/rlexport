<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use App\Models\Sys\MoonshineUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use MoonShine\ChangeLog\Traits\HasChangeLog;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\MassPrunable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BusinessTrip extends Model
{
    use HasFactory, SoftDeletes, HasChangeLog, MassPrunable;

    protected $fillable = [
        'b_trip_date',
        'owner_id',
        'driver_id',
        'sum',
        'comment',
        'profit_id',
    ];

    protected $dates = ['b_trip_date'];

    /**
     * owner
     * Получить данные о создателе записи.
     * @return void
     */
    public function owner()
    {
        return $this->belongsTo(MoonshineUser::class, 'owner_id', 'id');
    }

    /**
     * driver
     * Получить данные о водителе.
     * @return void
     */
    public function driver()
    {
        return $this->belongsTo(User::class, 'driver_id', 'id');
    }

    /**
     * setSumAttribute
     *
     * @param  mixed $value
     * @return void
     */
    public function setSumAttribute($value)
    {
        $this->attributes['sum'] = round($value, 2);
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::createFromTimestamp(strtotime($value))
            ->format(config('app.date_full_format'));
    }
    public function getUpdatedAtAttribute($value)
    {
        return Carbon::createFromTimestamp(strtotime($value))
            ->format(config('app.date_full_format'));
    }

    /**
     * prunable
     * Запрос для удаления устаревших записей модели.
     * @return Builder
     */
    public function prunable(): Builder
    {
        return static::where('deleted_at', '<=', now()->subDay());
    }
}
