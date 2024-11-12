<?php

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
        Schema::create('routes', function (Blueprint $table) {
            $table->id();
            $table->timestamp('event_date');
            $table->BigInteger('owner_id')->unsigned()->default(0);
            $table->BigInteger('driver_id')->unsigned();
            $table->foreign('driver_id')->references('id')->on('users');
            $table->BigInteger('truck_types_id')->unsigned();
            $table->foreign('truck_types_id')->references('id')->on('dir_truck_types');
            $table->BigInteger('cargo_id')->unsigned();
            $table->foreign('cargo_id')->references('id')->on('dir_cargos');
            //$table->BigInteger('payer_id')->unsigned();
            //$table->foreign('payer_id')->references('id')->on('dir_payers');
            $table->string('address_loading');
            $table->string('address_unloading');
            //$table->Integer('route_length')->default(0);
            //$table->float('price_route', 8, 2);
            $table->Integer('number_trips');
            $table->float('unexpected_expenses', 8, 2)->nullable()->default(0);
            $table->float('sum', 9, 2);
            $table->string('comment')->nullable();
            $table->BigInteger('profit_id')->unsigned()->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('routes');
    }
};
