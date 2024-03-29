<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvidenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evidencies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('format')->nullable();
            $table->string('url')->nullable();
            $table->string('size')->nullable();
            $table->bigInteger('registro')->unsigned()->nullable();
            $table->foreign('registro')->references('id')->on('registries');
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
        Schema::dropIfExists('evidencies');
    }
}
