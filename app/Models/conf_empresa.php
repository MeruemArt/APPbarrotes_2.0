<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class conf_empresa
 * @package App\Models
 * @version October 21, 2020, 4:04 pm UTC
 *
 * @property string $nombre
 * @property string $nit
 * @property string $direccion
 * @property string $telefono
 * @property string $logo
 * @property integer $n_factura
 */
class conf_empresa extends Model
{

    public $table = 'conf_empresa';
    



    public $fillable = [
        'nombre',
        'nit',
        'direccion',
        'telefono',
        'logo',
        'n_factura'
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
        'logo' => 'string',
        'n_factura' => 'integer'
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
        'telefono' => 'required'
    ];

    
}
