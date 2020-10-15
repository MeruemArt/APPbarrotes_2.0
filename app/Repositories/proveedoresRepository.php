<?php

namespace App\Repositories;

use App\Models\proveedores;
use App\Repositories\BaseRepository;

/**
 * Class proveedoresRepository
 * @package App\Repositories
 * @version October 15, 2020, 2:04 pm UTC
*/

class proveedoresRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'nit',
        'direccion',
        'telefono'
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
        return proveedores::class;
    }
}
