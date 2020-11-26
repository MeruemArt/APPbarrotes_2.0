<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class producto_devolucion
 * @package App\Models
 * @version October 22, 2020, 12:41 am UTC
 *
 * @property \App\Models\cliente $cliente
 * @property \Illuminate\Database\Eloquent\Collection $productos
 * @property string $fecha
 * @property integer $cliente_id
 * @property integer $producto_id
 */
class producto_devolucion extends Model
{

    public $table = 'producto_devolucion';
    



    public $fillable = [
        'fecha',
        'cliente_id',
        'producto_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'fecha' => 'datetime',
        'cliente_id' => 'integer',
        'producto_id' => 'integer'
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
    public function cliente()
    {
        return $this->hasOne(\App\Models\cliente::class, 'id', 'cliente_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function producto()
    {
        return $this->hasOne(\App\Models\producto::class, 'id', 'producto_id');
    }
}
