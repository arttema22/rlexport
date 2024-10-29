<?php

declare(strict_types=1);

namespace App\MoonShine\Pages\Tariff\TariffService;

use MoonShine\Fields\Text;
use MoonShine\Pages\Crud\IndexPage;

class TariffServiceIndexPage extends IndexPage
{
    /**
     * fields
     *
     * @return array
     */
    public function fields(): array
    {
        return [
            Text::make(__('Name'), 'service.name'),
            Text::make(__('Price'), 'price')->badge('primary')->sortable(),
        ];
    }
}
