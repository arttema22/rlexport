<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\Profit;
use MoonShine\Attributes\Icon;
use MoonShine\Resources\ModelResource;
use Illuminate\Database\Eloquent\Model;
use App\MoonShine\Pages\Profit\ProfitFormPage;
use App\MoonShine\Pages\Profit\ProfitIndexPage;
use App\MoonShine\Pages\Profit\ProfitDetailPage;

/**
 * @extends ModelResource<Profit>
 */
#[Icon('heroicons.outline.banknotes')]
class ProfitResource extends MainResource
{
    // Модель данных
    protected string $model = Profit::class;

    // Жадная загрузка
    public array $with = ['driver'];

    // Поле сортировки по умолчанию
    protected string $sortColumn = '';

    // Тип сортировки по умолчанию
    protected string $sortDirection = 'DESC';

    // Поле для отображения значений в связях и хлебных крошках
    public string $column = '';

    /**
     * title
     * Устанавливает заголовок для ресурса.
     * @return string
     */
    public function title(): string
    {
        return __('Profits');
    }

    /**
     * pages
     *
     * @return array
     */
    public function pages(): array
    {
        return [
            ProfitIndexPage::make($this->title()),
            ProfitFormPage::make(
                $this->getItemID()
                    ? __('moonshine::ui.edit')
                    : __('moonshine::ui.add')
            ),
            ProfitDetailPage::make(__('moonshine::ui.show')),
        ];
    }

    /**
     * rules
     *
     * @param  mixed $item
     * @return array
     */
    public function rules(Model $item): array
    {
        return [];
    }
}
