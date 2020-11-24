<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class proveedores
 * @package App\Models
 * @version October 15, 2020, 2:04 pm UTC
 *
 * @property \App\Models\users $users
 * @property string $nombre
 * @property string $nit
 * @property string $direccion
 * @property string $telefono
 */
class proveedores extends Model
{

    public $table = 'proveedores';
    



    public $fillable = [
        'nombre',
        'nit',
        'direccion',
        'telefono'
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
        'nit' => 'required',
        'direccion' => 'required',
        /*'user_id' => 'required'*/
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     **/
    public function user()
    {
        return $this->hasOne(\App\Models\user::class, 'id', 'user_id');
    }
   
}
