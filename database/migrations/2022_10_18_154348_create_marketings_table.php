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
        Schema::create('marketings', function (Blueprint $table) {
            $table->id();
            $table->text("title")->nullable();//cp,ird,tf,p,ms - lm,ol,m,ip,
            $table->string("alias_cate",15);
            $table->text("description")->nullable();
            $table->string("image_url");
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->boolean('available',)->default(true);
            $table->timestamps();
        });

        Schema::create('marketing_files', function (Blueprint $table) {
            $table->id();
            $table->text("name",50);
            $table->text("origin_name",200);
            $table->text("url_patch");
            $table->string("type");
            $table->foreignId('marketing_id')->references('id')->on('marketings')->onDelete('cascade');
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
        Schema::dropIfExists('marketings');
    }
};
