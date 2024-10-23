<?php

declare(strict_types=1);

namespace App\MoonShine\Resources\Sys;

use App\Models\Profit;
use MoonShine\Attributes\Icon;
use Illuminate\Validation\Rule;
use App\Models\Sys\MoonshineUser;
use Illuminate\Support\Facades\Auth;
use MoonShine\Resources\ModelResource;
use Illuminate\Database\Eloquent\Model;
use App\MoonShine\Resources\MainResource;
use App\MoonShine\Pages\Sys\User\UserFormPage;
use App\MoonShine\Pages\Sys\User\UserIndexPage;

/**
 * @extends ModelResource<MoonshineUser>
 */
#[Icon('heroicons.outline.users')]
class MoonShineUserResource extends MainResource
{
    // Модель данных
    public string $model = MoonshineUser::class;

    // Жадная загрузка
    public array $with = ['moonshineUserRole'];

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
        return __('Users');
    }

    /**
     * pages
     *
     * @return array
     */
    public function pages(): array
    {
        return [
            UserIndexPage::make($this->title()),
            UserFormPage::make(
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
    public function rules($item): array
    {
        return [
            'name' => 'required',
            'moonshine_user_role_id' => 'required',
            'email' => [
                'sometimes',
                'bail',
                'required',
                'email',
                Rule::unique('moonshine_users')->ignoreModel($item),
            ],
            'password' => $item->exists
                ? 'sometimes|nullable|min:6|required_with:password_repeat|same:password_repeat'
                : 'required|min:6|required_with:password_repeat|same:password_repeat',
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
        ];
    }
}
