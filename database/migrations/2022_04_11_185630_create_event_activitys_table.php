<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventActivitysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_activitys', function (Blueprint $table) {
            $table->id()->comment('Identificador unico del registro.');
            $table->unsignedBigInteger('events_id')->comment('Identificador del Evento al que pertenece la actividad.');
            $table->unsignedBigInteger('users_id')->comment('Identificador del Usuario que dirige la actividad.');
            $table->string('title', 100)->comment('Titulo descriptivo de la actividad.');
            $table->string('description', 2000)->comment('Descripción de la actividad.');
            $table->date('dateStart')->comment('Fecha de inicio de la actividad.');
            $table->time('hourStart', $precision = 0)->comment('Hora de inicio de la actividad.');
            $table->date('dateFinish')->comment('Fecha de finalización de la actividad.');
            $table->time('hoursFinish', $precision = 0)->comment('Hora de finalización de la actividad.');
            $table->boolean('status')->default(true)->comment('Estado de la Actividad 0= inactivo 1 = Activo');
            $table->string('day', 20)->nullable()->comment('Dia al que pertenece la actividad.');

            $table->timestamps();
            
            $table->foreign('events_id')->references('id')->on('events');
            $table->foreign('users_id')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event_activitys');
    }
}
