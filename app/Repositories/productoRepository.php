<?php

namespace App\Repositories;

use App\Models\producto;
use App\Repositories\BaseRepository;

/**
 * Class productoRepository
 * @package App\Repositories
 * @version October 21, 2020, 9:31 pm UTC
*/

class productoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'valor_E',
        'valor_S',
        'proveedores_id',
        'estado_producto_id',
        'detalle_recepcion_id'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return producto::class;
    }
}
