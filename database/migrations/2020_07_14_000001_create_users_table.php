<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('domicilio')->nullable();
            $table->string('telefono')->nullable();
            $table->string('fecha_nacimiento')->nullable();
            $table->float('sueldo', 12, 2)->nullable();
            $table->string('contacto_emergencia')->nullable();
            $table->string('fecha_contrato')->nullable();
            $table->string('fecha_despido')->nullable();
            $table->text('images')->nullable();
            $table->boolean('active');
            $table->integer('idrole')->unsigned();
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('idrole')->references('id')->on('roles')
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
        Schema::dropIfExists('users');
    }
}
