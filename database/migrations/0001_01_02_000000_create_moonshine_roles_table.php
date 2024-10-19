<?php

use App\Models\Sys\MoonshineUserRole;
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
        Schema::create('moonshine_user_roles', static function (Blueprint $table): void {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        MoonshineUserRole::create([
            'name' => 'Admin',
        ]);

        MoonshineUserRole::create([
            'name' => 'Администратор'
        ]);

        MoonshineUserRole::create([
            'name' => 'Наблюдатель'
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('moonshine_user_roles');
    }
};
