<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegistrosAdicionales extends Model
{
    //
    protected $table = "tb_registros_adicionales";

    public $timestamps = false;
    protected $fillable = [
        'fk_fiscal_data_id',
        'str_nombre_registro_adicional',
        'str_clave_registro_adicional',
    ];


    public function pertenece_dato_fiscal()
    {
        return $this->belongsTo(DatosFiscales::class,'fk_inscripcion_id','pk_inscripcion_id');
    }
}

