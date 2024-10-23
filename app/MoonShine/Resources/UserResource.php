<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\User;
use MoonShine\Pages\Page;
use MoonShine\Attributes\Icon;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use MoonShine\Resources\ModelResource;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rules\Password;
use App\MoonShine\Pages\User\UserFormPage;
use App\MoonShine\Pages\User\UserIndexPage;

/**
 * @extends ModelResource<User>
 */
#[Icon('heroicons.outline.users')]
class UserResource extends MainResource
{
    // Модель данных
    protected string $model = User::class;

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
        return __('Drivers');
    }

    /**
     * @return list<Page>
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
     * @param User $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($item->id)],
            'password' => [
                'sometimes',
                'nullable',
                'bail',
                'required',
                Password::min(8)->mixedCase()->numbers(),
                'confirmed'
            ],
        ];
    }

    /**
     * afterCreated
     *
     * @param  mixed $item
     * @return Model
     */
    protected function afterCreated(Model $item): Model
    {
        // $profit = new Profit();
        // $profit->owner_id = Auth::user()->id;
        // $profit->title = 'Старт';
        // $profit->comment = 'Начальная загрузка';
        // $item->profits()->save($profit);
        return $item;
    }
}
