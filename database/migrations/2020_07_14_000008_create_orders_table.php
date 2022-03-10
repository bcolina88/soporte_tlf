<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fechacreacion');
            $table->string('marca')->nullable();;
            $table->string('modelo')->nullable();;
            $table->string('serie')->nullable();;
            $table->string('garantia')->nullable();;
            $table->string('estado');
            $table->string('clavebloqueo')->nullable();;
            $table->text('diagnostico');
            $table->text('detalle');
            $table->boolean('bateria');
            $table->boolean('tapa');
            $table->boolean('memoria');
            $table->boolean('lapiz');
            $table->boolean('sim');
            $table->float('valor', 12, 2)->nullable();;     
            $table->integer('idatendidopor')->unsigned();
            $table->integer('idcliente')->unsigned();

            $table->timestamps();

            $table->foreign('idatendidopor')->references('id')->on('users')
            ->onUpdate('cascade')
            ->onDetete('cascade');

            $table->foreign('idcliente')->references('id')->on('users')
            ->onUpdate('cascade')
            ->onDetete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
