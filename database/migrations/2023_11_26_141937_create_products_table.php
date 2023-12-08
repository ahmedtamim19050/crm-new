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
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('external_id');
            $table->unsignedBigInteger('team_id')->index()->nullable();
            $table->string('name');
            $table->string('code')->nullable();
            $table->string('unit')->nullable();
            $table->decimal('tax_rate')->nullable();
            $table->unsignedBigInteger('product_category_id')->index()->nullable();
            $table->text('description')->nullable();
            $table->boolean('active')->default(true);
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            // $table->unsignedBigInteger('user_updated_id')->nullable();
            // $table->foreign('user_updated_id')->references('id')->on('users');
            // $table->unsignedBigInteger('user_deleted_id')->nullable();
            // $table->foreign('user_deleted_id')->references('id')->on('users');
            // $table->unsignedBigInteger('user_restored_id')->nullable();
            // $table->foreign('user_restored_id')->references('id')->on('users');
            $table->unsignedBigInteger('user_owner_id')->nullable();
            $table->foreign('user_owner_id')->references('id')->on('users');
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
        Schema::dropIfExists('products');
    }
};
