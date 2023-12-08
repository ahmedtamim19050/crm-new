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
        Schema::create('deals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('external_id');
            $table->unsignedBigInteger('lead_id')->index()->nullable();
            $table->foreign('lead_id')->references('id')->on('leads');
            $table->unsignedBigInteger('client_id')->index()->nullable();
            $table->foreign('client_id')->references('id')->on('clients');
            $table->unsignedBigInteger('organisation_id')->index()->nullable();
            $table->foreign('organisation_id')->references('id')->on('organisations');
            $table->string('title');
            $table->string('label')->nullable();
            $table->text('description')->nullable();
            $table->integer('amount')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->integer('post_code')->nullable();
            $table->string('country')->nullable();
            $table->string("currency", 3)->default("USD");
            $table->boolean("qualified")->default(false);
            $table->datetime('expected_close')->nullable();
            $table->datetime('closed_at')->nullable();
            $table->enum('closed_status', ['won','lost'])->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('deals');
    }
};
