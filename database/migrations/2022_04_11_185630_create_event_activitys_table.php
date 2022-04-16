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
            $table->foreignId('event')->constrained('events')->comment('Identificador del Evento al que pertenece la actividad.');
            $table->foreignId('speaker')->constrained('users')->comment('Identificador del Usuario que dirige la actividad.');
            $table->date('dateStart')->comment('Fecha de la actividad.');
            $table->time('hourStart', $precision = 0)->comment('Hora de inicio de la actividad.');
            $table->time('noursFinish', $precision = 0)->comment('Hora de finalización de la actividad.');
            $table->string('title', 100)->comment('Titulo descriptivo de la actividad.');
            $table->string('descripion', 255)->comment('Descripción de la actividad.');
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
        Schema::dropIfExists('event_activitys');
    }
}
