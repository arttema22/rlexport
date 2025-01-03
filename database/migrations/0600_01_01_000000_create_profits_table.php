<?php

use App\Models\Main\Profit;
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
        Schema::create('profits', function (Blueprint $table) {
            $table->id();
            $table->date('event_date')->default(date(now()));
            $table->string('title')->nullable();
            $table->foreignId('owner_id')
                ->constrained('moonshine_users')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->foreignId('driver_id')
                ->constrained('users')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->float('saldo_start', 8, 2)->default(0);
            $table->float('sum_salary', 8, 2)->default(0);
            $table->float('sum_refuelings', 8, 2)->default(0);
            $table->float('sum_routes', 8, 2)->default(0);
            $table->float('sum_services', 8, 2)->default(0);
            $table->float('sum_accrual', 8, 2)->default(0);
            $table->float('sum_amount', 8, 2)->default(0);
            $table->float('saldo_end', 10, 2)->default(0);
            $table->text('comment')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Profit::create([
            'event_date' => now(),
            'title' => 'Старт',
            'owner_id' => 1,
            'driver_id' => 1,
            'comment' => 'Начальная загрузка',
        ]);
        Profit::create([
            'event_date' => now(),
            'title' => 'Старт',
            'owner_id' => 1,
            'driver_id' => 2,
            'comment' => 'Начальная загрузка',
        ]);
        Profit::create([
            'event_date' => now(),
            'title' => 'Старт',
            'owner_id' => 1,
            'driver_id' => 3,
            'comment' => 'Начальная загрузка',
        ]);
        Profit::create([
            'event_date' => now(),
            'title' => 'Старт',
            'owner_id' => 1,
            'driver_id' => 4,
            'comment' => 'Начальная загрузка',
        ]);
        Profit::create([
            'event_date' => now(),
            'title' => 'Старт',
            'owner_id' => 1,
            'driver_id' => 5,
            'comment' => 'Начальная загрузка',
        ]);
        Profit::create([
            'event_date' => now(),
            'title' => 'Старт',
            'owner_id' => 1,
            'driver_id' => 6,
            'comment' => 'Начальная загрузка',
        ]);
        Profit::create([
            'event_date' => now(),
            'title' => 'Старт',
            'owner_id' => 1,
            'driver_id' => 7,
            'comment' => 'Начальная загрузка',
        ]);
        Profit::create([
            'event_date' => now(),
            'title' => 'Старт',
            'owner_id' => 1,
            'driver_id' => 8,
            'comment' => 'Начальная загрузка',
        ]);
        Profit::create([
            'event_date' => now(),
            'title' => 'Старт',
            'owner_id' => 1,
            'driver_id' => 9,
            'comment' => 'Начальная загрузка',
        ]);
        Profit::create([
            'event_date' => now(),
            'title' => 'Старт',
            'owner_id' => 1,
            'driver_id' => 10,
            'comment' => 'Начальная загрузка',
        ]);
        Profit::create([
            'event_date' => now(),
            'title' => 'Старт',
            'owner_id' => 1,
            'driver_id' => 11,
            'comment' => 'Начальная загрузка',
        ]);
        Profit::create([
            'event_date' => now(),
            'title' => 'Старт',
            'owner_id' => 1,
            'driver_id' => 12,
            'comment' => 'Начальная загрузка',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profits');
    }
};
