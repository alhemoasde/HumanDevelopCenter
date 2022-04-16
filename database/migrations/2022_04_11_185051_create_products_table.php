<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id()->comment('Identificador unico del registro.');
            $table->foreignId('event')->constrained('events')->comment('Identificador del Evento al que pertenece el producto.');
            $table->string('codec', 100)->unique()->comment('Codigo de referencia del video.');
            $table->string('name', 100)->comment('Nombre descriptivo del producto.');
            $table->string('description', 1000)->nullable()->comment('Descripción del producto.');
            $table->decimal('priceBuy', $precision = 8, $scale = 2)->nullable()->comment('Valor de adquisición del producto.');
            $table->decimal('priceSell', $precision = 8, $scale = 2)->comment('Valor de venta del producto.');
            $table->string('paymentLink', 255)->nullable()->comment('Link de pago de la pasarela seleccionada.');
            $table->string('type', 100)->comment('Tipo de producto Digital o Fisico.');
            $table->string('path', 100)->nullable()->comment('Url de acceso al archivo en el servidor. Productos Digitales');
            $table->string('image', 100)->nullable()->comment('URL de acceso a imagen de portada del producto.');
            $table->boolean('activo')->comment('Estado del Producto 0= inactivo 1 = Activo');
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
        Schema::dropIfExists('products');
    }
}
