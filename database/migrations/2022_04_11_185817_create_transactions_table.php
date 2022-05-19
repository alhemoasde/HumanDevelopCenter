<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('subscriber_email', 100)->comment('Correo electronico del suscriptor.');
            $table->decimal('valorTotalCarrito', $precision = 8, $scale = 2)->comment('Valor total de la transacción en el carrito.');
            $table->dateTime('fecha')->comment('Fecha de la transacción enviada por la pasarela de pagos.');
            $table->string('id_factura', 100)->comment('Identificador de la factura.');
            $table->string('recibo', 100)->comment('Identificador del recibo.');
            $table->string('autorizacion', 100)->comment('Autorización de la transacción.');
            $table->string('estado', 100)->comment('Estado de la transacción. Aceptada, Pendiente o Rechazada');
            $table->decimal('valortotal', $precision = 8, $scale = 2)->comment('Valor total de la transacción.');
            $table->decimal('iva_lineapagos', $precision = 8, $scale = 2)->comment('Valor total de los impuestos de la transacción.');
            $table->decimal('ganancia_lineapagos', $precision = 8, $scale = 2)->comment('Valor total de la ganancia de la pasarela transacción.');
            $table->decimal('ganancia_cliente', $precision = 8, $scale = 2)->comment('Valor total de la ganacia de la transacción.');
            $table->decimal('trmdia', $precision = 8, $scale = 2)->comment('Valor total TRM del día de la transacción.');
            $table->string('moneda', 5)->comment('Moneda en la que se realizó la transacción.');
            $table->string('ip_transaccion', 100)->comment('IP desde se realizó la transacción.');
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
        Schema::dropIfExists('transactions');
    }
}
