<?php

declare(strict_types=1);

namespace App\MoonShine\Pages\Sys\User;

use MoonShine\Fields\Text;
use MoonShine\Enums\JsEvent;
use MoonShine\Support\AlpineJs;
use MoonShine\Pages\Crud\IndexPage;
use MoonShine\ActionButtons\ActionButton;

class UserIndexPage extends IndexPage
{
    /**
     * fields
     *
     * @return array
     */
    public function fields(): array
    {
        return [
            Text::make(__('Name'), 'name'),
            Text::make(__('Role'), 'moonshineUserRole.name')->badge('purple'),
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
