<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateImagesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255);
            $table->integer('activities_id')->unsigned()->nullable();
            $table->integer('tours_id')->unsigned()->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('activities_id')->references('id')->on('activities')->onDelete('set null');
            $table->foreign('tours_id')->references('id')->on('tours')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('images');
    }
}
