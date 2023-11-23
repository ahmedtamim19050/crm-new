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
        Schema::create('emails', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('external_id')->nullable();
            $table->string('address');
            $table->boolean('primary')->default(false);
            $table->enum('type', ['work','home','other'])->default('work')->nullable();
            $table->morphs('emailable');
            $table->unsignedBigInteger('user_created_id')->nullable();
            $table->foreign('user_created_id')->references('id')->on('users');
            $table->unsignedBigInteger('user_updated_id')->nullable();
            $table->foreign('user_updated_id')->references('id')->on('users');
            $table->unsignedBigInteger('user_deleted_id')->nullable();
            $table->foreign('user_deleted_id')->references('id')->on('users');
            $table->unsignedBigInteger('user_restored_id')->nullable();
            $table->foreign('user_restored_id')->references('id')->on('users');
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
        Schema::dropIfExists('emails');
    }
};
