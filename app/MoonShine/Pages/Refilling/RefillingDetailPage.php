<?php

declare(strict_types=1);

namespace App\MoonShine\Pages\Refilling;

use MoonShine\Fields\Date;
use MoonShine\Fields\Text;
use MoonShine\Fields\Number;
use MoonShine\Pages\Crud\DetailPage;
use MoonShine\Fields\Relationships\BelongsTo;
use App\MoonShine\Resources\Sys\MoonShineUserResource;

class RefillingDetailPage extends DetailPage
{
    public function getAlias(): ?string
    {
        return __('moonshine::refilling.detail_page');
    }

    public function fields(): array
    {
        return [
            Date::make(__('Date'), 'event_date')->format('d.m.Y'),
            Text::make(__('Owner'), 'owner.name'),
            Text::make(__('Driver'), 'driver.name'),
            Text::make(__('Volume'), 'volume'),
            Text::make(__('Price'), 'price'),
            Text::make(__('Sum'), 'sum'),
            Text::make(__('Brand'), 'petrolBrand.name'),
            Text::make(__('Station'), 'petrolStation.address'),
            Text::make(__('Category'), 'fuelCategory.name'),
            Text::make(__('Type'), 'fuelType.name'),
            Text::make(__('Truck'), 'truck.name'),
            Text::make(__('Truck'), 'truck.reg_num_ru'),
            Text::make(__('Comment'), 'comment'),
            Text::make(__('Created At'), 'created_at'),
            Text::make('updated_at'),

        ];
    }
}
