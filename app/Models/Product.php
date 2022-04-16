<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'codec',
        'name',
        'description',
        'price',
        'paymentLink',
        'path',
        'tipo',
        'status',
        
    ];

    /**
     * Obtener Evento por producto.
     */
    public function events()
    {
        return $this->belongsTo('App\Models\Events', 'event');
    }
}
