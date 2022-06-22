<?php

namespace App\Models;

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
        'description',
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
    public function eventActivitys()
    {
        return $this->hasMany(EventActivitys::class);
    }

    /**
     * Obtener los productos de un Evento.
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    /**
     * Obtener los productos de un Evento.
     */
    public function productsByEvent($event){
        return $products = Product::where('events_id','=',$event->id)->get();
    }
}
