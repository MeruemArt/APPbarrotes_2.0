<?php

namespace App\Repositories;

use App\Models\producto_devolucion;
use App\Repositories\BaseRepository;

/**
 * Class producto_devolucionRepository
 * @package App\Repositories
 * @version October 22, 2020, 12:41 am UTC
*/

class producto_devolucionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'fecha',
        'cliente_id',
        'producto_id'
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
        return producto_devolucion::class;
    }
}
