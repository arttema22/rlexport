<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Closure;
use MoonShine\Fields\Date;
use App\Models\Main\Refilling;
use MoonShine\Attributes\Icon;
use MoonShine\QueryTags\QueryTag;
use Illuminate\Support\Facades\Auth;
use MoonShine\Resources\ModelResource;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\View\ComponentAttributeBag;
use MoonShine\Fields\Relationships\BelongsTo;
use App\MoonShine\Pages\Refilling\RefillingFormPage;
use App\MoonShine\Pages\Refilling\RefillingIndexPage;
use App\MoonShine\Pages\Refilling\RefillingDetailPage;

/**
 * @extends ModelResource<Refilling>
 */
#[Icon('heroicons.outline.battery-50')]
class RefillingResource extends MainResource
{
    // Модель данных
    protected string $model = Refilling::class;

    // Жадная загрузка
    public array $with = [
        'driver',
        'petrolbrand',
        'petrolstation',
        'fuelcategory'
    ];

    // Поле сортировки по умолчанию
    protected string $sortColumn = 'event_date';

    // Тип сортировки по умолчанию
    protected string $sortDirection = 'DESC';

    // Поле для отображения значений в связях и хлебных крошках
    public string $column = 'event_date';

    /**
     * title
     * Устанавливает заголовок для ресурса.
     * @return string
     */
    public function title(): string
    {
        return __('Refillings');
    }

    /**
     * pages
     *
     * @return array
     */
    public function pages(): array
    {
        return [
            RefillingIndexPage::make($this->title()),
            RefillingFormPage::make(
                $this->getItemID()
                    ? __('moonshine::ui.edit')
                    : __('moonshine::ui.add')
            ),
            RefillingDetailPage::make(__('moonshine::ui.show')),
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
            'event_date' => ['required', 'date', 'before_or_equal:today'],
            'volume' => ['required', 'decimal:0,2', 'min:10', 'max:9999999.99'],
            'price' => ['required', 'decimal:0,2', 'min:10', 'max:9999999.99'],
            'sum' => ['required', 'decimal:0,2', 'min:10', 'max:9999999.99'],
        ];
    }

    /**
     * beforeCreating
     *
     * @param  mixed $item
     * @return Model
     */
    protected function beforeCreating(Model $item): Model
    {
        $item->owner_id = Auth::user()->id;
        return $item;
    }

    /**
     * filters
     *
     * @return array
     */
    public function filters(): array
    {
        return [
            BelongsTo::make(__('Driver'), 'driver', resource: new UserResource())
                ->searchable()
                ->nullable(),
            Date::make(__('Date'), 'event_date')->nullable(),
        ];
    }

    /**
     * search
     *
     * @return array
     */
    public function search(): array
    {
        return [
            'event_date',
            'driver.name',
            'sum',
            'comment'
        ];
    }

    /**
     * queryTags
     *
     * @return array
     */
    public function queryTags(): array
    {
        return [
            QueryTag::make(
                __('Active'),
                fn(Builder $query) => $query
            )->default(),
            QueryTag::make(
                __('Archive'),
                fn(Builder $query) => $query->onlyTrashed()->where('profit_id', '!=', 0)
            ),
            QueryTag::make(
                __('Deleted'),
                fn(Builder $query) => $query->onlyTrashed()->where('profit_id', 0)
            ),
        ];
    }

    // Если запись сделана вручную, то она красная
    public function trAttributes(): Closure
    {
        return function (
            Model $item,
            int $row,
            ComponentAttributeBag $attr
        ): ComponentAttributeBag {
            if ($item->owner_id != 1) {
                $attr->setAttributes([
                    'class' => 'bgc-red'
                ]);
            }
            return $attr;
        };
    }
}
