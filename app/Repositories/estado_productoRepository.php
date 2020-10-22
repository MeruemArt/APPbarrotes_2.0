<?php

namespace App\Repositories;

use App\Models\estado_producto;
use App\Repositories\BaseRepository;

/**
 * Class estado_productoRepository
 * @package App\Repositories
 * @version October 21, 2020, 4:35 pm UTC
*/

class estado_productoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre'
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
        return estado_producto::class;
    }
}
