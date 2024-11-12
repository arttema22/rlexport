<?php

declare(strict_types=1);

namespace App\MoonShine\Pages;

use MoonShine\Pages\Page;
use App\Models\Main\Salary;
use MoonShine\Decorations\Flex;
use MoonShine\Decorations\Grid;
use App\Models\Main\BusinessTrip;
use MoonShine\Decorations\Column;
use MoonShine\Metrics\ValueMetric;
use App\Models\Dir\DirFuelCategory;
use MoonShine\Decorations\Collapse;
use MoonShine\Metrics\DonutChartMetric;
use App\Models\Dir\DirPetrolStationBrand;

class Dashboard extends Page
{
    public function breadcrumbs(): array
    {
        return [
            '#' => $this->title()
        ];
    }

    public function title(): string
    {
        return __('Dashboard');
    }

    public function components(): array
    {
        return [
            Grid::make([
                Column::make([
                    // Заправки
                    Collapse::make(__('Refillings'), [
                        DonutChartMetric::make(__('Total'))
                            ->values(
                                function () {
                                    $petrolStationBrands = DirPetrolStationBrand::withCount('refillings')->get();
                                    $count = [];
                                    foreach ($petrolStationBrands as $petrolStationBrand) {
                                        $count[$petrolStationBrand->name] = $petrolStationBrand->refillings_count;
                                    }
                                    return $count;
                                }
                            ),
                    ]),
                ])->columnSpan(4),

                Column::make([
                    // АЗС
                    Collapse::make(__('Petrol stations'), [
                        DonutChartMetric::make(__('Total'))
                            ->values(
                                function () {
                                    $petrolStationBrands = DirPetrolStationBrand::withCount('petrolStations')->get();
                                    $count = [];
                                    foreach ($petrolStationBrands as $petrolStationBrand) {
                                        $count[$petrolStationBrand->name] = $petrolStationBrand->petrol_stations_count;
                                    }
                                    return $count;
                                }
                            ),
                    ]),
                ])->columnSpan(4),

                Column::make([
                    // Категории горючего
                    Collapse::make(__('Fuel categories'), [
                        DonutChartMetric::make(__('Total'))
                            ->values(
                                function () {
                                    $fuelCategories = DirFuelCategory::withCount('refillings')->get();
                                    $count = [];
                                    foreach ($fuelCategories as $fuelCategory) {
                                        $count[$fuelCategory->name] = $fuelCategory->refillings_count;
                                    }
                                    return $count;
                                }
                            ),
                    ]),
                ])->columnSpan(4),

                Column::make([
                    // Типы горючего
                    Collapse::make(__('Fuel types'), [
                        DonutChartMetric::make('total')
                            ->values(
                                function () {
                                    $dirFuelTypes = DirFuelCategory::withCount('fuelType')->get();
                                    $count = [];
                                    foreach ($dirFuelTypes as $fuelType) {
                                        $count[$fuelType->name] = $fuelType->fuel_type_count;
                                    }
                                    return $count;
                                }
                            ),
                    ]),
                ])->columnSpan(4),

                // Выплаты
                Column::make([
                    Collapse::make(__('Salaries'), [
                        Flex::make([
                            ValueMetric::make(__('Count'))
                                ->value(Salary::count()),
                            ValueMetric::make(__('Sum'))
                                ->value(Salary::sum('sum')),
                        ])->justifyAlign('start'),
                    ]),
                ])->columnSpan(4),

                // Командировки
                Column::make([
                    Collapse::make(
                        __('Business trips'),
                        [
                            Flex::make([
                                ValueMetric::make(__('Count'))
                                    ->value(BusinessTrip::count()),
                                ValueMetric::make(__('Sum'))
                                    ->value(BusinessTrip::sum('sum')),
                            ])->justifyAlign('start'),
                        ]
                    ),
                ])->columnSpan(4),
            ]),
        ];
    }
}
