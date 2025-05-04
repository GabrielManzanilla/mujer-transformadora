<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RedesSociales extends Model
{
    //
    protected $table = "tb_redes_sociales"; 
    protected $primaryKey = "pk_red_social_id"; 
    public $incrementing = false;
    protected $keyType = "string";

    protected $fillable = [
        'str_facebook',
        'str_facebook_empresarial',
        'str_facebook_marketplace',
        'str_pagina_web',
        'str_whatsapp_bussines',
        'str_mercado_libre',
        'str_mercado_pago',

        'fk_inscripcion_id'
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
    public function datos_fiscales()
    {
        return $this->belongsTo(DatosFiscales::class, 'fk_inscripcion_id', 'pk_inscripcion_id');
    }
    public function redes_adicionales()
    {
        return $this->hasMany(RedesAdicionales::class, 'fk_redes_sociales_id', 'pk_red_social_id');
    }
}
