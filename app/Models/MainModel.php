<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use App\Models\Sys\MoonshineUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use MoonShine\ChangeLog\Traits\HasChangeLog;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\MassPrunable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MainModel extends Model
{
    use HasFactory, SoftDeletes, HasChangeLog, MassPrunable;

    /**
     * eventDate
     *
     * @return Attribute
     */
    protected function eventDate(): Attribute
    {
        return Attribute::make(
            get: fn(string $value) => Carbon::parse($value),
        );
    }

    /**
     * owner
     * Получить данные о создателе записи.
     * @return void
     */
    public function owner()
    {
        return $this->belongsTo(MoonshineUser::class, 'owner_id', 'id');
    }

    /**
     * driver
     * Получить данные о водителе.
     * @return void
     */
    public function driver()
    {
        return $this->belongsTo(User::class, 'driver_id', 'id');
    }

    /**
     * createdAt
     *
     * @return Attribute
     */
    protected function createdAt(): Attribute
    {
        return Attribute::make(
            get: fn(string $value) => Carbon::parse($value)
                ->format(config('app.date_full_format')),
        );
    }

    /**
     * updatedAt
     *
     * @return Attribute
     */
    protected function updatedAt(): Attribute
    {
        return Attribute::make(
            get: fn(string $value) => Carbon::parse($value)
                ->format(config('app.date_full_format')),
        );
    }

    /**
     * prunable
     * Запрос для удаления устаревших записей модели.
     * @return Builder
     */
    public function prunable(): Builder
    {
        return static::where('deleted_at', '<=', now()->subDay());
    }
}
