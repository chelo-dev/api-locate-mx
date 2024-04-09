<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Codigo_Postal extends Model
{
    protected $table = "codigos_postales";

    protected $fillable = [
        'codigo'
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
