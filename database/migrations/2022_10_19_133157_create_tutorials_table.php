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

        Schema::create('lines', function (Blueprint $table) {
            $table->id();
            $table->string("line",50)->unique();
            $table->string("image_url",150);
            $table->timestamps();
        });
        Schema::create('tutorials', function (Blueprint $table) {
            $table->id();
            $table->string("title",50);
            $table->string("embed",80);
            $table->string("url",150);
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('line_id')->references('id')->on('lines')->onDelete('cascade');
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
        Schema::dropIfExists('tutorials');
        Schema::dropIfExists('lines');
    }
};
