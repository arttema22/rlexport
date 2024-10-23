<?php

declare(strict_types=1);

namespace App\MoonShine\Pages\BusinessTrip;

use MoonShine\Fields\Date;
use MoonShine\Fields\Text;
use MoonShine\Fields\Number;
use MoonShine\Decorations\Block;
use App\MoonShine\Resources\UserResource;
use App\MoonShine\Pages\Crud\FormPageCustom;
use MoonShine\Fields\Relationships\BelongsTo;

class BusinessTripFormPage extends FormPageCustom
{
    /**
     * fields
     *
     * @return array
     */
    public function fields(): array
    {
        return [
            Block::make([
                BelongsTo::make(__('Driver'), 'driver', resource: new UserResource())
                    ->searchable()->nullable()->required(),
                Date::make(__('Date'), 'b_trip_date')->required(),
                Number::make(__('Sum'), 'sum')->min(10)->max(9999999.99)->step(0.01)->required(),
                Text::make(__('comment'), 'comment'),
            ]),
        ];
    }
}
