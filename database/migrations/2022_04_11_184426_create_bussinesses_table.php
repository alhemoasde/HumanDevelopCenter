<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBussinessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bussinesses', function (Blueprint $table) {
            $table->id()->comment('Identificador unico del registro.');
            $table->string('name', 150)->comment('Nombres del negocio.');
            $table->string('address', 150)->comment('Nomenclatura de la dirección del negocio.');
            $table->string('telephone', 20)->comment('Numero teléfonico del negocio.');
            $table->string('email', 100)->comment('Correo electronico del negocio.');
            $table->string('aboutUs', 2000)->nullable()->comment('Información sobre el negocio.');
            $table->string('mission', 2000)->nullable()->comment('Misión corporativa del negocio.');
            $table->string('vision', 2000)->nullable()->comment('Visión corporativa del negocio.');
            $table->string('accountTwitter', 100)->nullable()->comment('Información de usuario en Twitter.');
            $table->string('accountFacabook', 100)->nullable()->comment('Información de usuario en Facebook.');
            $table->string('accountInstagram', 100)->nullable()->comment('Información de usuario en Instagram.');
            $table->string('accountLinkedin', 100)->nullable()->comment('Información de usuario en Linkedin.');
            $table->string('motto', 100)->nullable()->comment('Lema corporativo que identifica el negocio.');
            $table->string('logo', 100)->nullable()->comment('Url de acceso a la imagen del logo del negocio.');
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
        Schema::dropIfExists('bussinesses');
    }
}
