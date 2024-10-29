<?php

declare(strict_types=1);

namespace App\MoonShine\Pages\Service;

use App\Models\Service;
use MoonShine\Fields\Date;
use MoonShine\Fields\Text;
use MoonShine\Fields\Field;
use MoonShine\Fields\Checkbox;
use MoonShine\Fields\Position;
use MoonShine\Components\Badge;
use MoonShine\Decorations\Flex;
use MoonShine\Decorations\Divider;
use MoonShine\Pages\Crud\IndexPage;
use Illuminate\Support\Facades\Auth;
use MoonShine\Components\FlexibleRender;

class ServiceIndexPage extends IndexPage
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
            Date::make('date')->format('d.m.Y')->sortable()
                ->translatable('moonshine::ui'),
            Text::make('driver.name')
                ->when(
                    Auth::user()->moonshine_user_role_id == 3,
                    fn(Field $field) => $field->hideOnIndex()
                )
                ->translatable('moonshine::ui'),
            Text::make('name', 'service.name')->translatable('moonshine::ui'),
            Text::make('price', 'service.tariff.price')->translatable('moonshine::ui'),
            Checkbox::make('is_route')->translatable('moonshine::ui'),
        ];
    }
}
