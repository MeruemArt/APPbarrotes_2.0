<?php

namespace App\Repositories;

use App\Models\pedido;
use App\Repositories\BaseRepository;

/**
 * Class pedidoRepository
 * @package App\Repositories
 * @version October 21, 2020, 4:17 pm UTC
*/

class pedidoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'fecha_programada',
        'user_id'
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
        return pedido::class;
    }
}
