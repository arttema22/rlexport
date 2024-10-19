<?php

declare(strict_types=1);

namespace App\Models\Sys;

use App\Models\Route;
use App\Models\Profit;
use App\Models\Salary;
use App\Models\Service;
use App\Models\Refilling;
use Illuminate\Notifications\Notifiable;
use MoonShine\ChangeLog\Traits\HasChangeLog;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use MoonShine\Database\Factories\MoonshineUserFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class MoonshineUser extends Authenticatable
{
    // use HasMoonShineSocialite;
    use HasFactory;
    use Notifiable;
    use HasChangeLog;

    protected $fillable = [
        'moonshine_user_role_id',
        'email',
        'password',
        'name',
    ];

    protected static function newFactory(): Factory
    {
        return MoonshineUserFactory::new();
    }

    public function isSuperUser(): bool
    {
        return $this->moonshine_user_role_id === MoonshineUserRole::DEFAULT_ROLE_ID;
    }

    /**
     * moonshineUserRole
     *
     * @return BelongsTo
     */
    public function moonshineUserRole(): BelongsTo
    {
        return $this->belongsTo(MoonshineUserRole::class);
    }

    /**
     * profile
     * Получить данные профиля пользователя
     * @return HasOne
     */
    public function profile(): HasOne
    {
        return $this->hasOne(UserProfil::class, 'driver_id');
    }

    /**
     * trucks
     * Получить данные о машинах.
     * @return HasMany
     */
    public function trucks(): HasMany
    {
        return $this->hasMany(Truck::class, 'driver_id', 'id');
    }

    /**
     * refillings
     * Получить все записи о заправках.
     * @return HasMany
     */
    public function refillings(): HasMany
    {
        return $this->hasMany(Refilling::class, 'driver_id', 'id');
    }

    /**
     * profits
     *
     * @return HasMany
     * Получить все рассчеты по водителю
     */
    public function profits(): HasMany
    {
        return $this->hasMany(Profit::class, 'driver_id');
    }

    /**
     * salaries
     *
     * @return HasMany
     * Получить все записи о выплатах
     */
    public function salaries(): HasMany
    {
        return $this->hasMany(Salary::class, 'driver_id');
    }

    /**
     * services
     *
     * @return HasMany
     * Получить все записи о оказанных услугах
     */
    public function services(): HasMany
    {
        return $this->hasMany(Service::class, 'driver_id');
    }

    /**
     * routes
     *
     * @return HasMany
     * Получить все записи о маршрутах
     */
    public function routes(): HasMany
    {
        return $this->hasMany(Route::class, 'driver_id');
    }

    /**
     * email
     *
     * @return Attribute
     */
    protected function email(): Attribute
    {
        return Attribute::make(
            set: fn (string $value) => strtolower($value),
        );
    }
}
