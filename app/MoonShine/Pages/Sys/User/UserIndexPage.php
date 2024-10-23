<?php

declare(strict_types=1);

namespace App\MoonShine\Pages\Sys\User;

use MoonShine\Fields\Text;
use MoonShine\Enums\JsEvent;
use MoonShine\Fields\Position;
use MoonShine\Support\AlpineJs;
use MoonShine\Pages\Crud\IndexPage;
use MoonShine\ActionButtons\ActionButton;

class UserIndexPage extends IndexPage
{
    /**
     * getAlias
     * Устанавливает алиас для ресурса.
     * @return string
     */
    public function getAlias(): ?string
    {
        return __('moonshine::system.resource_list');
    }

    /**
     * fields
     *
     * @return array
     */
    public function fields(): array
    {
        return [
            Position::make(),
            Text::make('name', 'name')
                ->translatable('moonshine::system.user'),
            Text::make('role', 'moonshineUserRole.name')->badge('purple')->translatable('moonshine::system.user'),
        ];
    }

    public function actions(): array
    {
        return [
            ActionButton::make('Refresh', '#')
                ->dispatchEvent(AlpineJs::event(JsEvent::TABLE_UPDATED, 'index-table'))
        ];
    }
}
