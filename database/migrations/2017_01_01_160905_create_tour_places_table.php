<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTourPlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tour_places', function (Blueprint $table) {
            $table->integer('tours_id')->unsigned();
            $table->integer('places_id')->unsigned()->nullable();

            $table->foreign('tours_id')->references('id')->on('tours')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('places_id')->references('id')->on('places')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['tours_id', 'places_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tour_places');
    }
}
