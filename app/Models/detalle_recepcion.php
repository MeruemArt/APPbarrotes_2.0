<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class detalle_recepcion
 * @package App\Models
 * @version October 21, 2020, 4:33 pm UTC
 *
 * @property \App\Models\pedido $pedido
 * @property \App\Models\detalle_pedido $detallePedido
 * @property integer $pedido_id
 * @property integer $detalle_pedido_id
 */
class detalle_recepcion extends Model
{

    public $table = 'detalle_recepcion';
    



    public $fillable = [
        'pedido_id',
        'detalle_pedido_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'pedido_id' => 'integer',
        'detalle_pedido_id' => 'integer'
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
    public function pedido()
    {
        return $this->hasOne(\App\Models\pedido::class, 'id', 'pedido_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     **/
    public function detallePedido()
    {
        return $this->hasOne(\App\Models\detalle_pedido::class, 'id', 'detalle_pedido_id');
    }
}
