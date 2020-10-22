<?php

namespace App\Repositories;

use App\Models\devolucion;
use App\Repositories\BaseRepository;

/**
 * Class devolucionRepository
 * @package App\Repositories
 * @version October 21, 2020, 4:29 pm UTC
*/

class devolucionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
        return devolucion::class;
    }
}
