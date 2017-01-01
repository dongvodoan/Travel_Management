<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateToursTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tours', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 255);
            $table->text('describe');
            $table->integer('times_id')->unsigned()->nullable();
            $table->integer('prices_id')->unsigned()->nullable();
            $table->integer('itineraries_id')->unsigned()->nullable();
            $table->integer('category_tours_id')->unsigned()->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('times_id')->references('id')->on('times')->onDelete('set null');
            $table->foreign('prices_id')->references('id')->on('prices')->onDelete('set null');
            $table->foreign('itineraries_id')->references('id')->on('itineraries')->onDelete('set null');
            $table->foreign('category_tours_id')->references('id')->on('category_tours')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tours');
    }
}
