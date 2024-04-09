<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    protected $table = "municipios";

    protected $fillable = [
        'nombre', 'estados_paises_id'
    ];

    public function estadoPais()
    {
        return $this->hasOne('App\Models\Estado_Pais', 'id', 'estados_paises_id');
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at'
    ];
}
