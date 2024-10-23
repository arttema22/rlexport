<?php

declare(strict_types=1);

namespace App\MoonShine\Pages\Dir\DirTruckType;

use MoonShine\Fields\Text;
use MoonShine\Decorations\Block;
use App\MoonShine\Pages\Crud\FormPageCustom;

class DirTruckTypeFormPage extends FormPageCustom
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
                Text::make(__('Name'), 'name')
                    ->required(),
            ]),
        ];
    }
}
