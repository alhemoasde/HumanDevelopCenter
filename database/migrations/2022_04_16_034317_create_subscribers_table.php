<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscribersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscribers', function (Blueprint $table) {
            $table->id()->comment('Identificador unico del registro.');
            $table->string('name', 100)->comment('Nombre del Suscriptor.');
            $table->string('email', 100)->unique()->comment('Correo electronico del suscriptor.');
            $table->boolean('status')->default(true)->comment('Estado del Suscriptor 0= inactivo 1 = Activo');
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
        Schema::dropIfExists('subscribers');
    }
}
