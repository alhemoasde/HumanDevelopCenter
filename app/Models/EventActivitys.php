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
        'events_id',
        'users_id',
        'title',
        'description',
        'dateStart',
        'hourStart',
        'dateFinish',
        'hoursFinish',
        'day',
        'status',
    ];

    /**
     * Obtener Evento.
     */
    public function event()
    {
        return $this->belongsTo(Events::class, 'events_id');
    }

    /**
     * Obtener Usuario Speaker.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}
