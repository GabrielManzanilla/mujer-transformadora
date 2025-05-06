<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DatosFiscales extends Model
{
    //
    protected $table = 'tb_inscripciones'; // Asegúrate del nombre correcto de tu tabla

    protected $primaryKey = 'pk_inscripcion_id'; // Asegúrate del nombre correcto

    public $incrementing = false; // si usas UUID como llave primaria
    protected $keyType = 'string'; // si usas UUID como llave primaria

    protected $fillable = [
        'str_razon_social',
        'str_nombre_comercial',
        'dt_tiempo_ejerciendo',
        'str_rfc',
        'str_clave_impi',
        'str_clave_affy',
        'str_clave_imss',
        'int_num_empleados',
        'fk_user_id',
        // 'fk_regimen_id',
        // 'fk_actividad_economica_id',
    ];
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (!$model->getKey()) {
                $model->{$model->getKeyName()} =  (string) \Illuminate\Support\Str::uuid();
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'fk_user_id', 'id');
    }

    public function adicional(){
        return $this->hasMany(RegistrosAdicionales::class, 'fk_inscripcion_id', 'pk_inscripcion_id');
    }

    public function domicilio()
    {
        return $this->hasMany(Domicilio::class, 'fk_inscripcion_id', 'pk_inscripcion_id');
    }

    public function productos_ventas()
    {
        return $this->hasMany(Producto::class, 'fk_inscripcion_id', 'pk_inscripcion_id');
    }
    
    public function red_social()
    {
        return $this->hasOne(RedesSociales::class, 'fk_inscripcion_id', 'pk_inscripcion_id');
    }

}
