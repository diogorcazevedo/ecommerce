<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateColectionImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colection_images', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('colection_id')->unsigned();
            $table->foreign('colection_id')->references('id')->on('colections')->onDelete('cascade');
            $table->string('extension',5);
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
        Schema::drop('colection_images');
    }
}
