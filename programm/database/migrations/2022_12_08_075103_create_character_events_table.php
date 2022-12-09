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
        Schema::create('character_events', function (Blueprint $table) {

            $table->integer('character_id');
            $table->integer('event_id');

            $table->foreign('character_id')->on('characters')->references('id');
            $table->foreign('event_id')->on('events')->references('id');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('character_events');
    }
};
