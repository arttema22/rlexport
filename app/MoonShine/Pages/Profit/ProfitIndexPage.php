<?php

declare(strict_types=1);

namespace App\MoonShine\Pages\Profit;

use MoonShine\Fields\Date;
use MoonShine\Fields\Text;
use MoonShine\Fields\Field;
use MoonShine\Fields\Position;
use MoonShine\Pages\Crud\IndexPage;
use Illuminate\Support\Facades\Auth;

class ProfitIndexPage extends IndexPage
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
            Date::make(__('Date'), 'date')->format('d.m.Y')->sortable(),
            Text::make(__('Driver'), 'driver.name'),
            Text::make(__('Title'), 'title')->sortable(),
            Text::make(__('Comment'), 'comment'),
        ];
    }
}
