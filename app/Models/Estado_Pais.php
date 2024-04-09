<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estado_Pais extends Model
{
    protected $table = "estados_paises";

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
