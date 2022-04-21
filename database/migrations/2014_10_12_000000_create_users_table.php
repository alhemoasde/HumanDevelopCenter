<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id()->comment('Identificador unico del registro.');
            $table->string('name', 100)->comment('Nombres y apellidos del usuario.');
            $table->string('email')->unique()->comment('Correo electronico del usuario.');
            $table->string('password')->comment('Contraseña asignada por el usuario.');
            $table->string('telephone', 20)->nullable()->comment('Número teléfonico del usuario.');
            $table->string('profile', 50)->comment('Perfil asignado en el sistema.');
            $table->string('web', 50)->nullable()->comment('Nombre del sitio web del usuario, aplica solo conferencistas.');
            $table->string('accountTwitter', 100)->nullable()->comment('Información de usuario en Twitter.');
            $table->string('accountFacabook', 100)->nullable()->comment('Información de usuario en Facebook.');
            $table->string('accountInstagram', 100)->nullable()->comment('Información de usuario en Instagram.');
            $table->string('accountLinkedin', 100)->nullable()->comment('Información de usuario en Linkedin.');
            $table->string('famousPhrase', 255)->nullable()->comment('Frase celébre del usuario conferencista.');
            $table->string('biografhy', 500)->nullable()->comment('Biografía del usuario conferencista.');
            $table->string('photography', 100)->nullable()->comment('Url de acceso a la fotografia del usuario.');
            $table->timestamps();
            $table->rememberToken()->comment('Identificador para recordar contraseña.');
            $table->timestamp('email_verified_at')->nullable()->comment('Marca de tiempo de cuando fue verificado el email.');

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
