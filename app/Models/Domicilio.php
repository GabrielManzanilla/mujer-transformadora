<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Domicilio extends Model
{
    //
    protected $table = "tb_domicilios";
    protected $primaryKey = "pk_domicilio_id";
    public $incrementing = false; 
    protected $keyType = "string";

    protected $fillable = [
        "str_direccion",
        // "fk_estado_id",
        // "fk_municipio_id",
        // "fk_localidad_id",
        "fk_dato_fiscal_id",
    ];

    protected static function boot(){
        parent::boot();
        static::creating(function($model){
            if(!$model->getKey()){
                $model->{$model->getKeyName()} = (string) \Illuminate\Support\Str::uuid();
            }
        });
    }

    public function pertenece_dato_fiscal(){
        return $this->belongsTo(DatosFiscales::class,"fk_dato_fical_id","pk_dato_fiscal_id");
    }

    
}
