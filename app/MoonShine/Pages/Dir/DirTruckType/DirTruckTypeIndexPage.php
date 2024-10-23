<?php

declare(strict_types=1);

namespace App\MoonShine\Pages\Dir\DirTruckType;

use MoonShine\Fields\Text;
use MoonShine\Fields\Position;
use MoonShine\Pages\Crud\IndexPage;

class DirTruckTypeIndexPage extends IndexPage
{
    /**
     * fields
     *
     * @return array
     */
    public function fields(): array
    {
        return [
            Position::make(),
            Text::make(__('Name'), 'name')->sortable(),
        ];
    }
}
