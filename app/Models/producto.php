<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class producto
 * @package App\Models
 * @version October 21, 2020, 9:31 pm UTC
 *
 * @property \App\Models\proveedores $proveedores
 * @property \App\Models\estado_producto $estadoProducto
 * @property \App\Models\detalle_recepcion $detalleRecepcion
 * @property number $valor_E
 * @property number $valor_S
 * @property integer $proveedores_id
 * @property integer $estado_producto_id
 * @property integer $detalle_recepcion_id
 */
class producto extends Model
{

    public $table = 'producto';
    



    public $fillable = [
        'valor_E',
        'valor_S',
        'proveedores_id',
        'estado_producto_id',
        'detalle_recepcion_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'valor_E' => 'double',
        'valor_S' => 'double',
        'proveedores_id' => 'integer',
        'estado_producto_id' => 'integer',
        'detalle_recepcion_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     **/
    public function proveedores()
    {
        return $this->hasOne(\App\Models\proveedores::class, 'id', 'proveedores_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     **/
    public function estadoProducto()
    {
        return $this->hasOne(\App\Models\estado_producto::class, 'id', 'estado_producto_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     **/
    public function detalleRecepcion()
    {
        return $this->hasOne(\App\Models\detalle_recepcion::class, 'id', 'detalle_recepcion_id');
    }
}
