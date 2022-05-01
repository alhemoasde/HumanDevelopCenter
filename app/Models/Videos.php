<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Videos extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'videos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
        'user_id',
        'url',       
        'status',
    ];

    /**
     * Obtener los productos de un video.
     */
    public function products()
    {
        return$this->belongsToMany(Product::class,'product_video')->withPivot('product_id');
    }

    /**
     * Obtener usuario expositor del video.
     */
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

}
