<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    use HasFactory;

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
        return $this->hasMany('App\Models\Product', 'id', 'event');
    }
}
