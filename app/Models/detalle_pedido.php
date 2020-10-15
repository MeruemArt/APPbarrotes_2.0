<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class detalle_pedido
 * @package App\Models
 * @version October 15, 2020, 2:47 pm UTC
 *
 * @property \App\Models\users $id
 * @property \App\Models\proveedores $proveedores
 * @property string $codigo_fact
 * @property string $fecha
 * @property integer $unidades
 * @property number $valor
 * @property string $telefono
 * @property integer $user_id
 * @property integer $proveedor_id
 */
class detalle_pedido extends Model
{

    public $table = 'detalle_pedido';
    



    public $fillable = [
        'codigo_fact',
        'fecha',
        'unidades',
        'valor',
        'telefono',
        'user_id',
        'proveedor_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'codigo_fact' => 'string',
        'fecha' => 'datetime',
        'unidades' => 'integer',
        'valor' => 'double',
        'telefono' => 'string',
        'user_id' => 'integer',
        'proveedor_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'codigo_fact' => 'required',
        'fecha' => 'required',
        'unidades' => 'required',
        'valor' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function id()
    {
        return $this->belongsTo(\App\Models\users::class, 'id', 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     **/
    public function proveedores()
    {
        return $this->hasOne(\App\Models\proveedores::class, 'id', 'proveedor_id');
    }
}
