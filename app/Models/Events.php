<?php

namespace App\Models;
use App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'events';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'descripion',
        'dateStart',
        'hourStart',
        'dateFinish',
        'hourFinish',
        'status',
        'active',
    ];

    /**
     * Obtener las actividades de un Evento.
     */
    public function listActivityByEvent()
    {
        return $this->hasMany('App\Models\EventActivitys', 'id', 'event');
    }

    /**
     * Obtener los productos de un Evento.
     */
    public function listProductByEvent()
    {
        return $this->hasMany(Product::class, 'event', 'id');
    }

    /**
     * Obtener los productos de un Evento.
     */
    public function productsByEvent($event){
        return $products = Product::where('event','=',$event->id)->get();
    }
}
