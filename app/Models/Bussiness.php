<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bussiness extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'address',
        'email',
        'telephone',
        'about',
        'mission',
        'vision',
        'accountTwitter',
        'accountFacabook',
        'accountInstagram',
        'accountLinkedin',
        'motto',
        'logo',
    ];
}
