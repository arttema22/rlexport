<?php

declare(strict_types=1);

namespace App\MoonShine\Pages\Refilling;

use MoonShine\Fields\Date;
use MoonShine\Fields\Text;
use MoonShine\Fields\Fields;
use MoonShine\Fields\Textarea;
use MoonShine\Decorations\Flex;
use MoonShine\Decorations\Grid;
use MoonShine\Decorations\Block;
use MoonShine\Decorations\Column;
use App\MoonShine\Resources\UserResource;
use App\MoonShine\Pages\Crud\FormPageCustom;
use MoonShine\Fields\Relationships\BelongsTo;
use App\MoonShine\Resources\Sys\TruckResource;
use App\MoonShine\Resources\Dir\DirFuelTypeResource;
use App\MoonShine\Resources\Dir\DirFuelCategoryResource;
use App\MoonShine\Resources\Dir\DirPetrolStationResource;
use App\MoonShine\Resources\Dir\DirPetrolStationBrandResource;

class RefillingFormPage extends FormPageCustom
{
    /**
     * getAlias
     *
     * @return string
     */
    public function getAlias(): ?string
    {
        return __('moonshine::refilling.form_page');
    }

    /**
     * fields
     *
     * @return array
     */
    public function fields(): array
    {
        return [
            Grid::make([
                Column::make([
                    BelongsTo::make(
                        __('Driver'),
                        'driver',
                        resource: new UserResource()
                    )
                        ->required()
                        ->nullable()
                        ->searchable(),
                ])->columnSpan(12),

                Column::make([
                    Block::make([
                        Date::make(__('Date'), 'event_date')->required(),
                        Flex::make([
                            Text::make(__('Volume'), 'volume')->required()
                                ->reactive(
                                    function (Fields $fields, ?string $value): Fields {
                                        return tap(
                                            $fields,
                                            static fn($fields) => $fields
                                                ->findByColumn('sum')
                                                ?->setValue($value * $fields->findByColumn('price')->value())
                                        );
                                    }
                                ),

                            Text::make(__('Price'), 'price')->required()
                                ->reactive(),

                            Text::make(__('Sum'), 'sum')
                                ->reactive()
                                ->readonly(),
                        ]),
                    ]),
                ])->columnSpan(6),

                Column::make([
                    Block::make([
                        Flex::make([
                            BelongsTo::make(
                                __('Station'),
                                'petrolBrand',
                                resource: new DirPetrolStationBrandResource()
                            )
                                ->nullable()
                                ->searchable(),
                            BelongsTo::make(
                                __('Address'),
                                'petrolStation',
                                resource: new DirPetrolStationResource()
                            )
                                ->associatedWith('dir_petrol_station_brand_id')
                                ->nullable()
                                ->searchable(),
                        ]),
                        Flex::make([
                            BelongsTo::make(
                                __('Fuel Category'),
                                'fuelCategory',
                                resource: new DirFuelCategoryResource()
                            )
                                ->nullable()
                                ->searchable(),

                            BelongsTo::make(
                                __('Fuel type'),
                                'fuelType',
                                resource: new DirFuelTypeResource()
                            )
                                ->associatedWith('dir_fuel_category_id')
                                ->nullable()
                                ->searchable(),
                        ]),
                        BelongsTo::make(
                            __('Truck'),
                            'truck',
                            fn($item) => "$item->name \ $item->reg_num_ru",
                            resource: new TruckResource()
                        )
                            ->associatedWith('driver_id')
                            ->searchable()
                            ->nullable(),
                    ]),
                ])->columnSpan(6),

                Column::make([
                    Block::make([
                        Textarea::make(__('Comment'), 'comment'),
                    ]),
                ])->columnSpan(12),
            ]),
        ];
    }
}
