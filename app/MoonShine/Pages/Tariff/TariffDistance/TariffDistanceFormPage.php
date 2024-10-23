<?php

declare(strict_types=1);

namespace App\MoonShine\Pages\Tariff\TariffDistance;

use MoonShine\Fields\Number;
use MoonShine\Decorations\Flex;
use MoonShine\Decorations\Block;
use App\MoonShine\Pages\Crud\FormPageCustom;

class TariffDistanceFormPage extends FormPageCustom
{
    /**
     * getAlias
     * Устанавливает алиас для ресурса.
     * @return string
     */
    public function getAlias(): ?string
    {
        return __('moonshine::tariff.resource_form');
    }

    /**
     * fields
     *
     * @return array
     */
    public function fields(): array
    {
        return [
            Block::make([
                Flex::make([
                    Number::make(__('Up to 15 km'), '0_15')->step(.01)->expansion('руб.'),
                    Number::make(__('Up to 30 km'), '16_30')->step(.01)->expansion('руб.'),
                    Number::make(__('Up to 60 km'), '31_60')->step(.01)->expansion('руб.'),
                    Number::make(__('Up to 300 km'), '60_300')->step(.01)->expansion('руб.'),
                    Number::make(__('More than 300 km'), '300_00')->step(.01)->expansion('руб.'),
                ]),
            ]),
        ];
    }
}
