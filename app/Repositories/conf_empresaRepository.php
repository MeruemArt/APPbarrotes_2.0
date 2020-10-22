<?php

namespace App\Repositories;

use App\Models\conf_empresa;
use App\Repositories\BaseRepository;

/**
 * Class conf_empresaRepository
 * @package App\Repositories
 * @version October 21, 2020, 4:04 pm UTC
*/

class conf_empresaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'nit',
        'direccion',
        'telefono',
        'logo',
        'n_factura'
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
        return conf_empresa::class;
    }
}
