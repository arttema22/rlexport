<?php

namespace App\Models;

use App\Models\Sys\Truck;
use Illuminate\Support\Carbon;
use App\Models\Dir\DirFuelType;
use App\Models\Dir\DirFuelCategory;
use MoonShine\Models\MoonshineUser;
use App\Models\Dir\DirPetrolStation;
use Illuminate\Database\Eloquent\Model;
use App\Models\Dir\DirPetrolStationBrand;
use Illuminate\Database\Eloquent\Builder;
use MoonShine\ChangeLog\Traits\HasChangeLog;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\MassPrunable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Refilling extends Model
{
    use HasFactory, SoftDeletes, HasChangeLog, MassPrunable;

    protected $fillable = [
        'refilling_date',
        'owner_id',
        'driver_id',
        'volume',
        'price',
        'sum',
        'dir_petrol_station_brand_id',
        'dir_petrol_station_id',
        'dir_fuel_category_id',
        'dir_fuel_type_id',
        'truck_id',
        'comment',
        'integration_id',
        'profit_id',
    ];

    protected $with = [
        'truck'
    ];

    protected $dates = ['refilling_date'];

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
     * petrolStation
     * Получить данные о АЗС.
     * @return void
     */
    public function petrolStation()
    {
        return $this->belongsTo(DirPetrolStation::class, 'dir_petrol_station_id', 'id');
    }

    /**
     * petrolBrand
     * Получить данные о бренде.
     * @return void
     */
    public function petrolBrand()
    {
        return $this->belongsTo(DirPetrolStationBrand::class, 'dir_petrol_station_brand_id', 'id');
    }

    /**
     * fuelCategory
     * Получить данные о категории топлива.
     * @return void
     */
    public function fuelCategory()
    {
        return $this->belongsTo(DirFuelCategory::class, 'dir_fuel_category_id', 'id');
    }

    /**
     * fuelTupe
     * Получить данные о типе топлива.
     * @return void
     */
    public function fuelType()
    {
        return $this->belongsTo(DirFuelType::class, 'dir_fuel_type_id', 'id');
    }

    /**
     * Получить данные об автомобиле который заправляется.
     */
    public function truck()
    {
        return $this->belongsTo(Truck::class, 'truck_id', 'id');
    }

    // public function getCreatedAtAttribute($value)
    // {
    //     return Carbon::createFromTimestamp(strtotime($value))
    //         ->format(config('app.date_full_format'));
    // }
    // public function getUpdatedAtAttribute($value)
    // {
    //     return Carbon::createFromTimestamp(strtotime($value))
    //         ->format(config('app.date_full_format'));
    // }

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
