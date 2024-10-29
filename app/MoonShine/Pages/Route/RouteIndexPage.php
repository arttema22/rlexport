<?php

declare(strict_types=1);

namespace App\MoonShine\Pages\Route;

use App\Models\Route;
use MoonShine\Fields\Date;
use MoonShine\Fields\Text;
use MoonShine\Fields\Field;
use MoonShine\Fields\Position;
use MoonShine\Components\Badge;
use MoonShine\Decorations\Flex;
use MoonShine\Fields\StackFields;
use MoonShine\Decorations\Divider;
use MoonShine\Pages\Crud\IndexPage;
use Illuminate\Support\Facades\Auth;
use MoonShine\Components\FlexibleRender;

class RouteIndexPage extends IndexPage
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
                ->translatable('moonshine::route'),
            Text::make('driver.name')
                ->when(
                    Auth::user()->moonshine_user_role_id == 3,
                    fn(Field $field) => $field->hideOnIndex()
                )
                ->translatable('moonshine::route'),

            StackFields::make('route')->fields([
                Text::make('address_loading')->translatable('moonshine::route'),
                Text::make('address_unloading')->translatable('moonshine::route'),
            ])->translatable('moonshine::route'),

            Text::make('cargo.name')->translatable('moonshine::route'),

            Text::make('number_trips')->translatable('moonshine::route'),
        ];
    }
}
