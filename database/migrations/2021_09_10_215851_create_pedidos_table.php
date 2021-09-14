<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->integer('camisas')->default(0);
            $table->integer('etiquetas')->default(0);
            $table->integer('boletos_un_dia')->default(0);
            $table->integer('boletos_dos_dias')->default(0);
            $table->integer('boletos_completo')->default(0);
            $table->foreignId('regalo_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('registro_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('pedidos');
    }
}
