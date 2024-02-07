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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('titles');
            $table->text('description')->nullable();
            $table->bigInteger('price');
            $table->tinyInteger('status')->default(false);
            $table->integer('client_limit')->nullable();
            $table->integer('organization_limit')->nullable();
            $table->integer('deal_limit')->nullable();
            $table->integer('lead_limit')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('packages');
    }
};
