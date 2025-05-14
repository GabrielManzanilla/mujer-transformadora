<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Documents extends Model
{
    //
    protected $table = "tb_documentos";
    protected $primaryKey ="pk_documento_id";

    public $incrementing = false;

    protected $keyType = "string";

    protected $fillable = [
        "path_impi",
        "path_imss",
        "path_affy",
        "path_cif",
        "fk_dato_fiscal_id"
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
        return $this->belongsTo(DatosFiscales::class,'fk_inscripcion_id','pk_inscripcion_id');
    }
}
