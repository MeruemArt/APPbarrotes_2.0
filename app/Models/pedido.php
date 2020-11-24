<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class pedido
 * @package App\Models
 * @version October 21, 2020, 4:17 pm UTC
 *
 * @property \App\Models\users $id
 * @property string $fecha_programada
 * @property integer $user_id
 */
class pedido extends Model
{

    public $table = 'pedido';
    



    public $fillable = [
        'fecha_programada',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'fecha_programada' => 'datetime',
        'user_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->hasOne(\App\Models\user::class, 'id', 'user_id');
    }
}
