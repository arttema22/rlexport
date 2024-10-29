<?php

use App\Models\Tariff\TariffRoute;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tariff_routes', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('start_id')->unsigned();
            $table->foreign('start_id')->references('id')->on('dir_route_addresses');
            $table->BigInteger('finish_id')->unsigned();
            $table->foreign('finish_id')->references('id')->on('dir_route_addresses');
            $table->Integer('length')->nullable();
            $table->float('price', 8, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        TariffRoute::create([
            // 1
            'start_id' => 3,
            'finish_id' => 164,
            'length' => 72,
        ]);
        TariffRoute::create([
            // 2
            'start_id' => 4,
            'finish_id' => 137,
            'length' => 18,
        ]);
        TariffRoute::create([
            // 3
            'start_id' => 4,
            'finish_id' => 102,
            'length' => 80,
        ]);
        TariffRoute::create([
            // 4
            'start_id' => 4,
            'finish_id' => 202,
            'length' => 448,
        ]);
        TariffRoute::create([
            // 5
            'start_id' => 4,
            'finish_id' => 40,
            'length' => 447,
        ]);
        TariffRoute::create([
            // 6
            'start_id' => 4,
            'finish_id' => 164,
            'length' => 298,
        ]);
        TariffRoute::create([
            // 7
            'start_id' => 5,
            'finish_id' => 148,
            'length' => 73,
        ]);
        TariffRoute::create([
            // 8
            'start_id' => 7,
            'finish_id' => 138,
            'length' => 84,
        ]);
        TariffRoute::create([
            // 9
            'start_id' => 7,
            'finish_id' => 164,
            'length' => 115,
        ]);
        TariffRoute::create([
            // 10
            'start_id' => 7,
            'finish_id' => 26,
            'length' => 17,
        ]);
        TariffRoute::create([
            // 11
            'start_id' => 7,
            'finish_id' => 39,
            'length' => 147,
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tariff_routes');
    }
};
