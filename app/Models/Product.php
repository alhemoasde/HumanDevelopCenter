<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'products';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'events_id',
        'codec',
        'name',
        'description',
        'priceBuy',
        'priceSell',
        'priceSellUSD',
        'paymentLink',
        'type',
        'poster',
        'day',
        'category',
        'status',
    ];

    /**
     * Obtener Evento por producto.
     */
    public function event()
    {
        return $this->belongsTo(Events::class,'events_id');
    }

    /**
     * Obtener Evento por producto.
     */
    public function enventByProduct($eventId){
        return Events::find($eventId);
    }

    /**
     * Obtener todos los videos de un producto digital 1..n
     */
    public function videos()
    {
        return $this->belongsToMany(Videos::class,'product_video')->withPivot('videos_id');
    }
}
