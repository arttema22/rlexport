<?php

declare(strict_types=1);

namespace App\MoonShine\Resources\Sys;

use App\Models\Sys\Truck;
use MoonShine\Fields\Text;
use MoonShine\Attributes\Icon;
use MoonShine\QueryTags\QueryTag;
use MoonShine\Resources\ModelResource;
use Illuminate\Database\Eloquent\Model;
use App\MoonShine\Resources\MainResource;
use Illuminate\Database\Eloquent\Builder;
use MoonShine\Fields\Relationships\BelongsTo;
use App\MoonShine\Pages\Sys\Truck\TruckFormPage;
use App\MoonShine\Pages\Sys\Truck\TruckIndexPage;
use App\MoonShine\Resources\Dir\DirTruckTypeResource;
use App\MoonShine\Resources\Dir\DirTruckBrandResource;

/**
 * @extends ModelResource<Truck>
 */
#[Icon('heroicons.outline.truck')]
class TruckResource extends MainResource
{
    // Модель данных
    protected string $model = Truck::class;

    // Жадная загрузка
    public array $with = ['brand', 'type', 'driver'];

    // Поле сортировки по умолчанию
    protected string $sortColumn = 'name';

    // Тип сортировки по умолчанию
    protected string $sortDirection = 'ASC';

    // Поле для отображения значений в связях и хлебных крошках
    public string $column = 'reg_num_ru';

    /**
     * title
     * Устанавливает заголовок для ресурса.
     * @return string
     */
    public function title(): string
    {
        return __('Trucks');
    }

    /**
     * pages
     *
     * @return array
     */
    public function pages(): array
    {
        return [
            TruckIndexPage::make($this->title()),
            TruckFormPage::make(
                $this->getItemID()
                    ? __('moonshine::ui.edit')
                    : __('moonshine::ui.add')
            ),
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
            'reg_num_ru' => ['required'],
            'reg_num_en' => ['required'],
        ];
    }

    /**
     * search
     * Поля для поиска
     * @return array
     */
    public function search(): array
    {
        return [
            'name',
            'reg_num_ru',
            'reg_num_en',
            'brand.name',
            'type.name',
            'users.name'
        ];
    }
}
