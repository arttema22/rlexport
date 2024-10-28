<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\Salary;
use MoonShine\Fields\Date;
use MoonShine\Fields\Number;
use MoonShine\Attributes\Icon;
use MoonShine\QueryTags\QueryTag;
use Illuminate\Support\Facades\Auth;
use MoonShine\Resources\ModelResource;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use MoonShine\Fields\Relationships\BelongsTo;
use App\MoonShine\Pages\Salary\SalaryFormPage;
use App\MoonShine\Pages\Salary\SalaryIndexPage;

/**
 * @extends ModelResource<Salary>
 */
#[Icon('heroicons.outline.banknotes')]
class SalaryResource extends MainResource
{
    // Модель данных
    protected string $model = Salary::class;

    // Жадная загрузка
    public array $with = ['driver'];

    // Поле сортировки по умолчанию
    protected string $sortColumn = 'salary_date';

    // Тип сортировки по умолчанию
    protected string $sortDirection = 'DESC';

    // Поле для отображения значений в связях и хлебных крошках
    public string $column = 'salary_date';

    /**
     * title
     * Устанавливает заголовок для ресурса.
     * @return string
     */
    public function title(): string
    {
        return __('Salaries');
    }

    /**
     * pages
     *
     * @return array
     */
    public function pages(): array
    {
        return [
            SalaryIndexPage::make($this->title()),
            SalaryFormPage::make(
                $this->getItemID()
                    ? __('moonshine::ui.edit')
                    : __('moonshine::ui.add')
            ),
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
        return [
            'salary_date' => ['required', 'date', 'before_or_equal:today'],
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
            Date::make(__('Date'), 'salary_date')->nullable(),
            Number::make(__('Sum'), 'sum')->min(10)->max(9999999.99)->step(0.01),
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
            'salary_date',
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
}