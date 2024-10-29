<?php

declare(strict_types=1);

namespace App\MoonShine\Pages\Dir\DirPetrolStation;

use MoonShine\Fields\Text;
use MoonShine\Fields\Position;
use MoonShine\Decorations\Grid;
use MoonShine\Decorations\Block;
use MoonShine\Decorations\Column;
use MoonShine\Decorations\Heading;
use MoonShine\Pages\Crud\IndexPage;

class DirPetrolStationIndexPage extends IndexPage
{
    /**
     * fields
     *
     * @return array
     */
    public function fields(): array
    {
        return [
            Text::make(__('Address'), 'address')->sortable(),
            Text::make(__('Brand'), 'petrolStationBrand.name'),
        ];
    }
}
