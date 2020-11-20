<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class devolucion
 * @package App\Models
 * @version October 21, 2020, 4:29 pm UTC
 *
 * @property \App\Models\users $id
 * @property \App\Models\pedido $pedido
 * @property \App\Models\proveedores $proveedores
 * @property \App\Models\cliente $cliente
 * @property integer $codigo_fact
 * @property string $fecha
 * @property integer $unidades
 * @property number $total
 * @property string $Motivo
 * @property integer $user_id
 * @property integer $pedido_id
 * @property integer $proveedores_id
 * @property integer $cliente_id
 */
class devolucion extends Model
{

    public $table = 'devolucion';
    



    public $fillable = [
        'codigo_fact',
        'fecha',
        'unidades',
        'total',
        'Motivo',
        'user_id',
        'pedido_id',
        'proveedores_id',
        'cliente_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'codigo_fact' => 'integer',
        'fecha' => 'datetime',
        'unidades' => 'integer',
        'total' => 'double',
        'Motivo' => 'string',
        'user_id' => 'integer',
        'pedido_id' => 'integer',
        'proveedores_id' => 'integer',
        'cliente_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'codigo_fact' => 'required',
        'unidades' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function id()
    {
        return $this->belongsTo(\App\Models\users::class, 'id', 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function pedido()
    {
        return $this->belongsTo(\App\Models\pedido::class, 'id', 'pedido_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function proveedores()
    {
        return $this->hasOne(\App\Models\proveedores::class, 'id', 'proveedores_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function cliente()
    {
        return $this->hasOne(\App\Models\cliente::class, 'id', 'cliente_id');
    }
}
