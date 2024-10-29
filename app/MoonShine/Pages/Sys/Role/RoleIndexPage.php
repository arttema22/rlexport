<?php

declare(strict_types=1);

namespace App\MoonShine\Pages\Sys\Role;

use MoonShine\Fields\Text;
use MoonShine\Pages\Crud\IndexPage;

class RoleIndexPage extends IndexPage
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
        ];
    }
}
