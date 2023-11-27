<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_prices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('external_id');
            $table->unsignedBigInteger('team_id')->index()->nullable();
            $table->unsignedBigInteger('product_id')->index();
            $table->unsignedBigInteger('product_variation_id')->index()->nullable();
            $table->integer('unit_price')->nullable();
            $table->integer('cost_per_unit')->nullable();
            $table->integer('direct_cost')->nullable();
            $table->string("currency", 3)->default("USD");
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_prices');
    }
};
