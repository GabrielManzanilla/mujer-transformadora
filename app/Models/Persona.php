<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    //
    protected $table = [
        'str_curp',
        'str_nombre',
        'str_apellido_paterno',
        'str_apellido_materno',
        'dt_fecha_nacimiento',
        'str_estado_nacimiento',
        'str_municipio_nacimiento' ,
        'str_sexo',
        'bl_mayahablante',
        'str_ine',
        'str_correo_electronico',
        'str_tel_celular',
        'estado_perfil',
    ];
}
