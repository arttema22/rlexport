<?php

namespace App\Models\Main;

use App\Models\MainModel;
use App\Models\Sys\Truck;
use App\Models\Dir\DirFuelType;
use App\Models\Dir\DirFuelCategory;
use App\Models\Dir\DirPetrolStation;
use App\Models\Dir\DirPetrolStationBrand;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Refilling extends MainModel
{
    protected $fillable = [
        'event_date',
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
        'truck',
        'petrolBrand',
        'petrolStation'
    ];

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
}
