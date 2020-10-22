<?php

namespace App\Repositories;

use App\Models\detalle_recepcion;
use App\Repositories\BaseRepository;

/**
 * Class detalle_recepcionRepository
 * @package App\Repositories
 * @version October 21, 2020, 4:33 pm UTC
*/

class detalle_recepcionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'pedido_id',
        'detalle_pedido_id'
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
        return detalle_recepcion::class;
    }
}
