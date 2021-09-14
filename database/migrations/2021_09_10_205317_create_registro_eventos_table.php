<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistroEventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registro_eventos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('registro_id')->references('id')->on('registros')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('evento_id')->references('id')->on('eventos')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registro_eventos');
    }
}
