<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id()->comment('Identificador unico del registro.');
            $table->string('name', 100)->comment('Nombre del contacto.');
            $table->string('email', 100)->comment('Correo electronico de contacto');
            $table->string('subject', 100)->comment('Asunto del mensaje.');
            $table->string('message', 2000)->comment('Texto del mensaje recibido.');
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
        Schema::dropIfExists('contacts');
    }
}
