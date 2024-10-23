<?php

declare(strict_types=1);

namespace App\MoonShine\Pages\User;

use Throwable;
use MoonShine\Fields\Text;
use MoonShine\Fields\Email;
use MoonShine\Fields\Field;
use MoonShine\Fields\Password;
use MoonShine\Pages\Crud\FormPage;
use MoonShine\Fields\PasswordRepeat;
use MoonShine\Components\MoonShineComponent;

class UserFormPage extends FormPage
{
    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        return [
            Text::make(__('Name'), 'name'),
            Email::make(__('Email'), 'email'),
            Password::make(__('Password'), 'password'),
            PasswordRepeat::make(__('Password repeat'), 'password_confirmation'),
        ];
    }

    /**
     * @return list<MoonShineComponent>
     * @throws Throwable
     */
    protected function topLayer(): array
    {
        return [
            ...parent::topLayer()
        ];
    }

    /**
     * @return list<MoonShineComponent>
     * @throws Throwable
     */
    protected function mainLayer(): array
    {
        return [
            ...parent::mainLayer()
        ];
    }

    /**
     * @return list<MoonShineComponent>
     * @throws Throwable
     */
    protected function bottomLayer(): array
    {
        return [
            ...parent::bottomLayer()
        ];
    }
}
