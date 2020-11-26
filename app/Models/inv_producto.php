<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class inv_producto
 * @package App\Models
 * @version October 21, 2020, 9:58 pm UTC
 *
 * @property \App\Models\users $users
 * @property \Illuminate\Database\Eloquent\Collection $productos
 * @property string $fecha
 * @property integer $stock
 * @property integer $user_id
 * @property integer $producto_id
 */
class inv_producto extends Model
{

    public $table = 'inv_producto';
    



    public $fillable = [
        'fecha',
        'stock',
        'user_id',
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
        'stock' => 'integer',
        'user_id' => 'integer',
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
    public function users()
    {
        return $this->hasOne(\App\Models\users::class, 'id', 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function producto()
    {
        return $this->hasOne(\App\Models\producto::class, 'id', 'producto_id');
    }
}
