<?php

use App\Models\Sys\MoonshineUser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use MoonShine\Models\MoonshineUserRole;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('moonshine_users', static function (Blueprint $table): void {
            $table->id();
            $table->foreignId('moonshine_user_role_id')
                ->default(MoonshineUserRole::DEFAULT_ROLE_ID)
                ->constrained()
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->string('email', 190)->unique();
            $table->string('password');
            $table->string('name');
            $table->string('avatar')->nullable();
            $table->string('remember_token', 100)->nullable();
            $table->timestamps();
        });

        MoonshineUser::create([
            'moonshine_user_role_id' => 1,
            'email' => '9268188@mail.ru ',
            'password' => Hash::make('1234qwerQWER'),
            'name' => 'System',
        ]);

        MoonshineUser::create([
            'moonshine_user_role_id' => 2,
            'email' => 'arttema@mail.ru',
            'password' => Hash::make('1234qwerQWER'),
            'name' => 'Гусев А.А.',
        ]);

        MoonshineUser::create([
            'moonshine_user_role_id' => 2,
            'email' => '9132900@gmail.com',
            'password' => Hash::make('radswad0'),
            'name' => 'Клишевич А.В.',
        ]);

        MoonshineUser::create([
            'moonshine_user_role_id' => 2,
            'email' => 'naa@rlexport.ru',
            'password' => Hash::make('P1$t0let'),
            'name' => 'Никандров А.А.',
        ]);

        MoonshineUser::create([
            'moonshine_user_role_id' => 2,
            'email' => 'mli@rlexport.ru',
            'password' => Hash::make('xu7Heme'),
            'name' => 'Мамина Л.И.',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('moonshine_users');
    }
};
