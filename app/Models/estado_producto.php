<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class estado_producto
 * @package App\Models
 * @version October 21, 2020, 4:35 pm UTC
 *
 * @property string $nombre
 */
class estado_producto extends Model
{

    public $table = 'estado_producto';
    



    public $fillable = [
        'nombre'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
