<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id()->comment('Identificador unico del registro.');
            $table->string('title', 100)->comment('Titulo descriptivo del Evento.');
            $table->string('descripion', 2000)->comment('Texto descriptivo del Evento.');
            $table->date('dateStart')->comment('Fecha de inicio del Evento.');
            $table->time('hourStart', $precision = 0)->comment('Hora de inicio del Evento.');
            $table->date('dateFinish')->comment('Fecha de finalización del Evento.');
            $table->time('hourFinish', $precision = 0)->comment('Hora de finalización del Evento.');
            $table->string('status', 50)->comment('Estatus del Evento.');
            $table->boolean('activo')->comment('Estado del Evento 0= inactivo 1 = Activo');
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
        Schema::dropIfExists('events');
    }
}
