<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('recomendacion', 100);
            $table->text('accion_planeada')->nullable();
            $table->string('version', 20);
            $table->text('duracion')->nullable();
            $table->bigInteger('categoria')->nullable()->unsigned();
            $table->foreign('categoria')->references('id')->on('categories');
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
        Schema::dropIfExists('registries');
    }
}
