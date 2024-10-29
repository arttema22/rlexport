<?php

declare(strict_types=1);

namespace App\MoonShine\Pages\Tariff\TariffRoute;

use MoonShine\Fields\Td;
use MoonShine\Fields\Text;
use MoonShine\Pages\Crud\IndexPage;

class TariffRouteIndexPage extends IndexPage
{
    /**
     * fields
     *
     * @return array
     */
    public function fields(): array
    {
        return [
            Text::make(__('Start'), 'start.name'),
            Text::make(__('Finish'), 'finish.name'),
            Text::make(__('Length'), 'length'),
            Text::make(__('Price'), 'price')->badge('primary'),
        ];
    }
}
