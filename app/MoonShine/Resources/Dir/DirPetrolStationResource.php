<?php

declare(strict_types=1);

namespace App\MoonShine\Resources\Dir;

use MoonShine\Attributes\Icon;
use App\Models\Dir\DirPetrolStation;
use MoonShine\Resources\ModelResource;
use Illuminate\Database\Eloquent\Model;
use App\MoonShine\Resources\MainResource;
use Illuminate\Database\Eloquent\Builder;
use App\MoonShine\Pages\Dir\DirPetrolStation\DirPetrolStationFormPage;
use App\MoonShine\Pages\Dir\DirPetrolStation\DirPetrolStationIndexPage;

/**
 * @extends ModelResource<DirPetrolStation>
 */
#[Icon('heroicons.outline.battery-50')]
class DirPetrolStationResource extends MainResource
{
    // Модель данных
    protected string $model = DirPetrolStation::class;

    // Жадная загрузка
    public array $with = ['petrolStationBrand'];

    // Поле сортировки по умолчанию
    protected string $sortColumn = 'address';

    // Тип сортировки по умолчанию
    protected string $sortDirection = 'ASC';

    // Поле для отображения значений в связях и хлебных крошках
    public string $column = 'address';

    /**
     * title
     * Устанавливает заголовок для ресурса.
     * @return string
     */
    public function title(): string
    {
        return __('Petrol station');
    }

    /**
     * pages
     *
     * @return array
     */
    public function pages(): array
    {
        return [
            DirPetrolStationIndexPage::make($this->title()),
            DirPetrolStationFormPage::make(
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
            'address' => ['required', 'string', 'min:3'],
            'dir_petrol_station_brand_id' => ['required'],
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
            'address',
            'petrolStationBrand.name'
        ];
    }
}
