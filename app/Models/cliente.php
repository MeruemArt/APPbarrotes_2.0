<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class cliente
 * @package App\Models
 * @version October 21, 2020, 4:40 pm UTC
 *
 * @property \App\Models\users $id
 * @property string $nombre
 * @property string $nit
 * @property string $direccion
 * @property string $telefono
 * @property integer $user_id
 */
class cliente extends Model
{

    public $table = 'cliente';
    



    public $fillable = [
        'nombre',
        'nit',
        'direccion',
        'telefono',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'nit' => 'string',
        'direccion' => 'string',
        'telefono' => 'string',
        'user_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required',
        /* 'user_id' => 'required' */
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->hasOne(\App\Models\user::class, 'id', 'user_id');
    }
}
