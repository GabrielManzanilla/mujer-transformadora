<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    //
    protected $table = "tb_personas";
    protected $primaryKey = 'pk_persona_id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'str_curp',
        'str_nombre',
        'str_apellido_paterno',
        'str_apellido_materno',
        'dt_fecha_nacimiento',
        'str_estado_nacimiento',
        'str_municipio_nacimiento' ,
        'str_sexo',
        'bl_mayahablante',
        'str_correo_electronico',
        'str_tel_celular',
        'estado_perfil',
        'path_acta_nacimiento',
        'path_identificacion',
        'path_comprobante_domicilio',
        'path_curp',
        'path_foto_perfil',
        'fk_user_id',
    ];
    public function user(){
        return $this->belongsTo(User::class, 'fk_user_id', 'id');
    }

    protected static function boot(){
        parent::boot();
        static::creating(function ($model) {
            $model->pk_persona_id = (string) \Illuminate\Support\Str::uuid();
        });
    }
}
