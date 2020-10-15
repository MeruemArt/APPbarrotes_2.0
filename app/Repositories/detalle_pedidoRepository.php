<?php

namespace App\Repositories;

use App\Models\detalle_pedido;
use App\Repositories\BaseRepository;

/**
 * Class detalle_pedidoRepository
 * @package App\Repositories
 * @version October 15, 2020, 2:47 pm UTC
*/

class detalle_pedidoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'codigo_fact',
        'fecha',
        'unidades',
        'valor',
        'telefono',
        'user_id',
        'proveedor_id'
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
        return detalle_pedido::class;
    }
}
