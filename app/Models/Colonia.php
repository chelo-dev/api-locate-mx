<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Colonia extends Model
{
    protected $table = "colonias";

    protected $fillable = [
        'nombre', 'tipos_comunidades_id', 'codigos_postales_municipios_id'
    ];

    public function tipoComunidad()
    {
        return $this->hasOne('App\Models\Tipo_Comunidad', 'id', 'tipos_comunidades_id');
    }

    public function obtenerCodigoPostalMunicipio()
    {
        return $this->hasOne('App\Models\Codigo_Postal_Municipio', 'id', 'codigos_postales_municipios_id');
    }

    public function codigoPostalMunicipio()
    {
        return $this->belongsTo('App\Models\Codigo_Postal_Municipio', 'codigos_postales_municipios_id');
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
