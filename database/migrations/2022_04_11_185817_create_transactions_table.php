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
            $table->string('id_invoice', 100)->comment('Identificador de la factura.');
            $table->string('subscriber_email', 100)->comment('Correo electronico del suscriptor.');
            $table->decimal('amountTotalCart', $precision = 8, $scale = 2)->comment('Valor total de la transacción en el carrito.');
            
            $table->string('ref_transaction', 100)->nullable()->comment('Referencia de consulta de la transaccion asignada por la pasarela.');
            $table->dateTime('date_transaccion')->nullable()->comment('Fecha de la transacción enviada por la pasarela de pagos.');
            $table->string('transaction_id', 100)->nullable()->comment('Identificador del recibo.');
            $table->string('autorizacion', 100)->nullable()->comment('Autorización de la transacción.');
            $table->string('transaction_state', 100)->nullable()->comment('Estado de la transacción. Aceptada, Pendiente, Rechazada, Fallida, Reversada, Retenido, Iniciada, Caducada, Abandonada y Cancelada');
            $table->string('response_reason_text', 100)->nullable()->comment('Estado de la transacción. Aprobada, Pendiente o Rechazada');
            $table->decimal('amount', $precision = 8, $scale = 2)->nullable()->comment('Valor total de la transacción.');
            $table->string('currency_code', 5)->nullable()->comment('Moneda en la que se realizó la transacción.');
            $table->decimal('trmdia', $precision = 8, $scale = 2)->nullable()->comment('Valor total TRM del día de la transacción.');
            $table->string('customer_ip', 100)->nullable()->comment('IP desde se realizó la transacción.');
            $table->text('signature')->nullable()->comment('Firma de la transacción enviado par la pasarela de pago.');
            $table->decimal('iva_lineapagos', $precision = 8, $scale = 2)->nullable()->comment('Valor total de los impuestos de la transacción.');
            $table->decimal('ganancia_lineapagos', $precision = 8, $scale = 2)->nullable()->comment('Valor total de la ganancia de la pasarela transacción.');
            $table->decimal('ganancia_cliente', $precision = 8, $scale = 2)->nullable()->comment('Valor total de la ganacia de la transacción.');
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
