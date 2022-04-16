<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'idIdenty',
        'name',
        'email',
        'password',
        'telephone',
        'profile',
        'web',
        'accountTwitter',
        'accountFacabook',
        'accountInstagram',
        'accountLinkedin',
        'famousPhrase',
        'biografhy',
        'photography',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Obtener las actividades de un Ponente.
     */
    public function listActivityBySpeaker()
    {
        return $this->hasMany('App\Models\EventActivitys', 'id', 'speaker');
    }
}
