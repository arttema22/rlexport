<?php

declare(strict_types=1);

namespace App\MoonShine\Pages\Refilling;

use MoonShine\Fields\Date;
use MoonShine\Fields\Text;
use MoonShine\Fields\StackFields;
use MoonShine\Pages\Crud\IndexPage;

class RefillingIndexPage extends IndexPage
{
    /**
     * fields
     *
     * @return array
     */
    public function fields(): array
    {
        return [
            Date::make(__('Date'), 'event_date')->format('d.m.Y')->sortable(),
            Text::make(__('Driver'), 'driver.name'),
            StackFields::make(__('Refilling'))->fields([
                Text::make('volume', 'volume', fn($item) => $item->volume . ' л.'),
                Text::make('price', 'price', fn($item) => $item->price . ' р./л.'),
                Text::make('sum', 'sum', fn($item) => $item->sum . ' руб.'),
            ]),

            StackFields::make(__('Petrol station'))->fields([
                Text::make('petrolBrand.name'),
                Text::make('petrolStation.address'),
                Text::make('fuelCategory.name'),
            ]),

            StackFields::make(__('Truck'))->fields([
                Text::make('truck.name'),
                Text::make('truck.reg_num_ru'),
            ]),
        ];
    }
}
