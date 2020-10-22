<?php

namespace App\Repositories;

use App\Models\inv_producto;
use App\Repositories\BaseRepository;

/**
 * Class inv_productoRepository
 * @package App\Repositories
 * @version October 21, 2020, 9:58 pm UTC
*/

class inv_productoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'fecha',
        'stock',
        'user_id',
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
        return inv_producto::class;
    }
}
