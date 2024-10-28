<?php

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('e1_card')->unique()->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });

        User::create([
            'name' => 'Хазиуллин А.Р.',
            'e1_card' => '7005230017154060139',
            'email' => 'haziullin.andrei@mail.ru',
            'password' => Hash::make('radswad0'),
        ]);

        // User::create([
        //     'name' => 'Молчанов А.А.',
        //     'e1_card' => '7005230017154060022',
        //     'email' => 'sachamol75@gmail.com',
        //     'password' => Hash::make('radswad0'),
        // ]);

        User::create([
            'name' => 'Лукин В.В.',
            'e1_card' => '7005230017154060014',
            'email' => 'lukin_vyacheslav@mail.ru',
            'password' => Hash::make('radswad0'),
        ]);

        User::create([
            'name' => 'Мещеряков А.Н.',
            'e1_card' => '7005230017154060030',
            'email' => 'aleksii.99@mail.ru',
            'password' => Hash::make('radswad0'),
        ]);

        User::create([
            'name' => 'Екимов А.С.',
            'e1_card' => '7005230017154060121',
            'email' => 'alex-1884@mail.ru',
            'password' => Hash::make('radswad0'),

        ]);

        User::create([
            'name' => 'Майоров И.Я.',
            'e1_card' => '7005230017154060105',
            'email' => 'maiorov.ivan1986@mail.ru',
            'password' => Hash::make('radswad0'),
        ]);

        User::create([
            'name' => 'Леонтьев А.А.',
            'e1_card' => '7005230017154060147',
            'email' => 'mers862@mail.ru',
            'password' => Hash::make('radswad0'),
        ]);

        User::create([
            'name' => 'Владимиров А.С.',
            'e1_card' => '7005230017154060063',
            'email' => 'vladimirov@inbox.ru',
            'password' => Hash::make('radswad0'),
        ]);

        User::create([
            'name' => 'Тилик Д.Д.',
            'e1_card' => '7005230017154060055',
            'email' => 'denis.tilik@yandex.ru',
            'password' => Hash::make('radswad0'),
        ]);

        User::create([
            'name' => 'Думцев И.А.',
            'e1_card' => '7005230017154060071',
            'email' => 'dumtsev.igor@bk.ru',
            'password' => Hash::make('radswad0'),
        ]);

        User::create([
            'name' => 'Быков И.Н.',
            'e1_card' => '7005230017154060097',
            'email' => 'bykov@rlexport.ru',
            'password' => Hash::make('radswad0'),
        ]);

        User::create([
            'name' => 'Максимов И.В.',
            'e1_card' => '7005230017154060048',
            'email' => 'maksimovivanmaz459@gmail.com',
            'password' => Hash::make('radswad0'),
        ]);

        // User::create([
        //     'name' => 'Молчанов А.А.',
        //     'e1_card' => '7005230017154060113',
        //     'email' => 'enter22866@gmail.com',
        //     'password' => Hash::make('radswad0'),
        // ]);

        User::create([
            'name' => 'Вийдас В.Ю.',
            'e1_card' => '7005230017154060089',
            'email' => 'viidas.viktor@yandex.ru',
            'password' => Hash::make('radswad0'),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
