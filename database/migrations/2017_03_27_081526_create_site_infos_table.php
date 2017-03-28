<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiteInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();;
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->string('image1')->nullable();
            $table->text('about_admin')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('fb_link')->nullable();
            $table->string('tw_link')->nullable();
            $table->string('ins_link')->nullable();
            $table->string('vk_link')->nullable();
            $table->string('yt_link')->nullable();
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
        Schema::dropIfExists('site_infos');
    }
}
