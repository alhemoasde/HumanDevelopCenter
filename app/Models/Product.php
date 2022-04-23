<?php

namespace App\Models;
use App\Models\Events;

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
        'event',
        'codec',
        'name',
        'description',
        'priceBuy',
        'priceSell',
        'paymentLink',
        'type',
        'video',
        'poster',
        'status',
    ];

    /**
     * Obtener Evento por producto.
     */
    public function event()
    {
        return $this->belongsTo(Events::class,'event');
    }

    /**
     * Obtener Evento por producto.
     */
    public function enventByProduct($eventId){
        return Events::find($eventId);
    }
}
