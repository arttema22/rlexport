<?php

declare(strict_types=1);

namespace App\MoonShine\Pages\Refilling;

use App\Models\Refilling;
use MoonShine\Fields\Date;
use MoonShine\Fields\Text;
use Illuminate\Support\Number;
use MoonShine\Components\Badge;
use MoonShine\Decorations\Flex;
use MoonShine\Fields\StackFields;
use MoonShine\Decorations\Divider;
use MoonShine\Pages\Crud\IndexPage;
use Illuminate\Support\Facades\Auth;
use MoonShine\Components\FlexibleRender;

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
            Date::make(__('Date'), 'refilling_date')->format('d.m.Y H:i')->sortable(),
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
