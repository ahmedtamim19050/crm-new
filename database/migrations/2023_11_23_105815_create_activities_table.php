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
        Schema::create('activities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('external_id'); 
            $table->string('log_name')->default('default');
            $table->string('description')->nullable();
            $table->nullableMorphs('causeable');
            $table->nullableMorphs('timelineable');
            $table->nullableMorphs('recordable'); 
            $table->string('event')->nullable();        
            $table->json('properties')->nullable();
            $table->json('modified')->nullable();
            $table->string('ip_address', 64)->nullable();  
            $table->string('url')->nullable();
            $table->string('user_agent')->nullable();  
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
        Schema::dropIfExists('activities');
    }
};
