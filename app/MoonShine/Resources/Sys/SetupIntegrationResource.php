<?php

declare(strict_types=1);

namespace App\MoonShine\Resources\Sys;

use MoonShine\Fields\Url;
use MoonShine\Fields\Json;
use MoonShine\Fields\Text;
use MoonShine\Attributes\Icon;
use MoonShine\Fields\Textarea;
use MoonShine\Decorations\Block;
use App\Models\Sys\SetupIntegration;
use MoonShine\Resources\ModelResource;
use Illuminate\Database\Eloquent\Model;
use App\MoonShine\Resources\MainResource;

/**
 * @extends ModelResource<SetupIntegration>
 */
#[Icon('heroicons.outline.wrench-screwdriver')]
class SetupIntegrationResource extends MainResource
{
    // Модель данных
    protected string $model = SetupIntegration::class;

    // Поле сортировки по умолчанию
    protected string $sortColumn = 'name';

    // Тип сортировки по умолчанию
    protected string $sortDirection = 'ASC';

    // Поле для отображения значений в связях и хлебных крошках
    public string $column = 'name';

    /**
     * title
     * Устанавливает заголовок для ресурса.
     * @return string
     */
    public function title(): string
    {
        return __('Integrations');
    }

    /**
     * indexFields
     *
     * @return array
     */
    public function indexFields(): array
    {
        return [
            Text::make(__('Name'), 'name')->sortable(),
            Url::make(__('Help'), 'help_api')->title(fn() => str(__('Link')))->blank(),
        ];
    }

    /**
     * formFields
     *
     * @return array
     */
    public function formFields(): array
    {
        return [
            Block::make([
                Text::make('name')->required()->translatable('moonshine::integration.setup'),
                Url::make('url')->expansion('url')->required()->translatable('moonshine::integration.setup'),
                Text::make('user_name')->translatable('moonshine::integration.setup'),
                Text::make('password')->eye()->translatable('moonshine::integration.setup'),
                Textarea::make('access_token')->translatable('moonshine::integration.setup'),
                Json::make('additionally')->keyValue()->removable()->translatable('moonshine::integration.setup'),
                Textarea::make('comment')->translatable('moonshine::integration.setup'),
            ]),
        ];
    }

    /**
     * rules
     * Правила проверки вводимых данных
     * @param  mixed $item
     * @return array
     */
    public function rules(Model $item): array
    {
        return [
            'name' => ['required', 'string', 'min:3'],
            'url' => ['required', 'url'],
        ];
    }
}
