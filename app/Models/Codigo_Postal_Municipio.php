<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Codigo_Postal_Municipio extends Model
{
    protected $table = "codigos_postales_municipios";

    protected $fillable = [
        'municipios_id', 'codigos_postales_id'
    ];

    public function municipio()
    {
        return $this->hasOne('App\Models\Municipio', 'id', 'municipios_id');
    }

    public function codigoPostal()
    {
        return $this->hasOne('App\Models\Codigo_Postal', 'id', 'codigos_postales_id');
    }

    public function colonia()
    {
        return $this->hasOne('App\Models\Colonia', 'codigos_postales_municipios_id');
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
