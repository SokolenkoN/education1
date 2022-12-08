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
        Schema::create('characters', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('name', 22);
            $table->unsignedBigInteger('age');
            $table->text('biography');
            $table->text('obituary')->nullable();
            $table->string('health');

            $table->unsignedInteger('fraction_id')->nullable();

            $table->foreign('fraction_id')->on('fractions')->references('id');

            $table->timestamps();

            $table->softDeletes();
        });
    }

    /**ph
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('characters');
    }
};
