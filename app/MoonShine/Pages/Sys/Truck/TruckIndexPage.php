<?php

declare(strict_types=1);

namespace App\MoonShine\Pages\Sys\Truck;

use MoonShine\Fields\Text;
use MoonShine\Fields\StackFields;
use MoonShine\Pages\Crud\IndexPage;
use App\MoonShine\Resources\UserResource;
use MoonShine\Fields\Relationships\BelongsTo;

class TruckIndexPage extends IndexPage
{
    /**
     * fields
     *
     * @return array
     */
    public function fields(): array
    {
        return [
            StackFields::make(__('Reg num'))->fields([
                Text::make('reg_num_ru'),
                Text::make('reg_num_en'),
            ]),
            StackFields::make(__('Truck'))->fields([
                Text::make('name'),
                Text::make('brand.name'),
            ]),
            Text::make(__('Type'), 'type.name'),
        ];
    }
}
