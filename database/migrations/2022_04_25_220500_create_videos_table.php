<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->id()->comment('Identificador unico del registro.');
            $table->unsignedBigInteger('user_id')->comment('Identificador del Usuario al que pertenece el video.');
            $table->string('title', 100)->comment('Titulo descriptivo del Video.');
            $table->string('description', 1000)->nullable()->comment('Descripción del video.');
            $table->unsignedBigInteger('user_id')->nullable()->comment('Usuarios expositor del video.');
            $table->string('url', 100)->nullable()->comment('Url de acceso al archivo en el servidor.');
            $table->boolean('status')->default(true)->comment('Estado del Video 0= inactivo 1 = Activo');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('User');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('videos');
    }
}
