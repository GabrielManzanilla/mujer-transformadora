<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RedesAdicionales extends Model
{
    //
    protected $table = "tb_redes_adicionales"; 

    protected $fillable = [
        'str_nombre_red_social',
        'str_nombre_perfil',
        'fk_redes_sociales_id'
    ];

    public $timestamps = false;

    public function redes_sociales(){
        return $this -> hasOne(RedesSociales::class, 'fk_redes_sociales_id', 'pk_red_social_id');
    }
}
