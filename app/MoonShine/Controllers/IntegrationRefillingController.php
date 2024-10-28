<?php

declare(strict_types=1);

namespace App\MoonShine\Controllers;

use App\Models\Sys\Truck;
use App\Models\Dir\DirFuelType;
use App\Models\Dir\DirPetrolStation;
use App\Models\Dir\DirPetrolStationBrand;
use MoonShine\Http\Controllers\MoonShineController;

final class IntegrationRefillingController extends MoonShineController
{
    /**
     * getFuelType
     *
     * @param  mixed $fuelType
     * @return void
     */
    static function getFuelType($fuelType)
    {
        // Если в базе нет такого типа топлива, то он создается
        $Type = DirFuelType::where('name', $fuelType)->first();
        if (!$Type) {
            $Type = DirFuelType::create([
                'name' => $fuelType,
            ]);
        }
        return $Type->id;
    }

    /**
     * getFuelCategory
     *
     * @param  mixed $fuelType
     * @return void
     */
    static function getFuelCategory($fuelType)
    {
        $Type = DirFuelType::find($fuelType);
        return $Type->fuelCategory->id;
    }

    /**
     * getPetrolStationBrand
     *
     * @param  mixed $petrol_station_brand
     * @return void
     */
    static function getPetrolStationBrand($petrol_station_brand)
    {
        // Если NULL, то возвращается 1 - не определено
        if ($petrol_station_brand) {
            // Если в базе нет такого бренда, то он создается
            $Brand = DirPetrolStationBrand::where('name', $petrol_station_brand)->first();
            if (!$Brand) {
                $Brand = DirPetrolStationBrand::create([
                    'name' => $petrol_station_brand,
                ]);
            }
            return $Brand->id;
        }
        return 1;
    }

    /**
     * getPetrolStation
     *
     * @param  mixed $petrol_station
     * @param  mixed $address
     * @param  mixed $petrol_station_brand
     * @return void
     */
    static function getPetrolStation($petrol_station, $address, $petrol_station_brand)
    {
        // Если NULL, то возвращается 1 - не определено
        if ($address) {
            // Если в базе нет записи о такой АЗС, то она создается
            $Station = DirPetrolStation::where('station_num', $petrol_station)->first();
            if (!$Station) {
                $Station = DirPetrolStation::create([
                    'address' => $address,
                    'dir_petrol_station_brand_id' => $petrol_station_brand,
                    'station_num' => $petrol_station,
                ]);
            }
            return $Station->id;
        }
        return 1;
    }

    /**
     * getTruck
     *
     * @param  mixed $num
     * @return void
     */
    static function getTruck($num)
    {
        // Если в базе есть запись о машине с переданным номером, то ее ID записывается
        $Truck = Truck::where('reg_num_en', $num)
            ->orWhere('reg_num_ru', $num)->first();
        if ($Truck) {
            return $Truck->id;
        }
        return null;
    }
}
