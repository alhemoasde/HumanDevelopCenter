<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventActivitys extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'date',
        'hoursStart',
        'noursFinish',
        'title',
        'description',
        'speaker',
        'event',

    ];

    /**
     * Obtener Evento por actividad.
     */
    public function events()
    {
        return $this->belongsTo('App\Models\Events', 'event');
    }

    /**
     * Obtener Speaker por actividad.
     */
    public function speaker()
    {
        return $this->belongsTo('App\Models\User', 'speaker');
    }
}
