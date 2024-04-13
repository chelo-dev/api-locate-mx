<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;

    protected $table = 'logs';

    protected $fillable = [
        'uuid', 
        'dispositivo', 
        'plataforma', 
        'plataforma_version', 
        'navegador', 
        'navegador_version', 
        'equipo', 
        'direccion_ip', 
        'hostname'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'id',
    ];
}
