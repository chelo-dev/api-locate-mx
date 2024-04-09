<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tipo_Comunidad extends Model
{
    protected $table = "tipos_comunidades";

    protected $fillable = [
        'nombre'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at'
    ];
}
