<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

 /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'transactions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'subscriber_email',
        'valorTotalCarrito',
        'fecha',
        'id_factura',
        'recibo',
        'autorizacion',
        'estado',
        'valortotal',
        'iva_lineapagos',
        'ganancia_lineapagos',
        'ganancia_cliente',
        'trmdia',
        'moneda',
        'ip_transaccion',
    ];


    /**
     * Obtener Evento.
     */
    /* public function subscriber()
    {
        return $this->belongsTo(Subscriber::class,'subscriber_id');
    } */

    /**
     * Obtener todos los producto de una transacción.
     */
    public function products()
    {
        return $this->belongsToMany(Product::class,'product_transaction')->withPivot('product_id');
    }

}



