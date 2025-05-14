<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    //
    protected $table = 'tb_productos'; // Asegúrate del nombre correcto de tu tabla
    protected $primaryKey = 'pk_producto_id'; // Asegúrate del nombre correcto
    public $incrementing = false; // si usas UUID como llave primaria
    protected $keyType = 'string'; // si usas UUID como llave primaria

    protected $fillable = [
        'str_nombre_producto',
        'str_descripcion_producto',
        'int_produccion_mensual',
        'int_venta_mensual',
        'int_venta_anual'
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
    public function products()
    {
        return $this->belongsTo(DatosFiscales::class, 'fk_inscripcion_id', 'pk_inscripcion_id');
    }
}
