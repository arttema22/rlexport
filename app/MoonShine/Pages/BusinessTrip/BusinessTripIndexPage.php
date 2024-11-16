<?php

declare(strict_types=1);

namespace App\MoonShine\Pages\BusinessTrip;

use MoonShine\Fields\Date;
use MoonShine\Fields\Text;
use MoonShine\Pages\Crud\IndexPage;

class BusinessTripIndexPage extends IndexPage
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
            Text::make(__('Sum'), 'sum')->sortable(),
            Text::make(__('Comment'), 'comment'),
        ];
    }
}
