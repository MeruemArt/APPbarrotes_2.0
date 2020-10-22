<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createconf_empresaAPIRequest;
use App\Http\Requests\API\Updateconf_empresaAPIRequest;
use App\Models\conf_empresa;
use App\Repositories\conf_empresaRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class conf_empresaController
 * @package App\Http\Controllers\API
 */

class conf_empresaAPIController extends AppBaseController
{
    /** @var  conf_empresaRepository */
    private $confEmpresaRepository;

    public function __construct(conf_empresaRepository $confEmpresaRepo)
    {
        $this->confEmpresaRepository = $confEmpresaRepo;
    }

    /**
     * Display a listing of the conf_empresa.
     * GET|HEAD /confEmpresas
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $confEmpresas = $this->confEmpresaRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($confEmpresas->toArray(), 'Conf Empresas retrieved successfully');
    }

    /**
     * Store a newly created conf_empresa in storage.
     * POST /confEmpresas
     *
     * @param Createconf_empresaAPIRequest $request
     *
     * @return Response
     */
    public function store(Createconf_empresaAPIRequest $request)
    {
        $input = $request->all();

        $confEmpresa = $this->confEmpresaRepository->create($input);

        return $this->sendResponse($confEmpresa->toArray(), 'Conf Empresa saved successfully');
    }

    /**
     * Display the specified conf_empresa.
     * GET|HEAD /confEmpresas/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var conf_empresa $confEmpresa */
        $confEmpresa = $this->confEmpresaRepository->find($id);

        if (empty($confEmpresa)) {
            return $this->sendError('Conf Empresa not found');
        }

        return $this->sendResponse($confEmpresa->toArray(), 'Conf Empresa retrieved successfully');
    }

    /**
     * Update the specified conf_empresa in storage.
     * PUT/PATCH /confEmpresas/{id}
     *
     * @param int $id
     * @param Updateconf_empresaAPIRequest $request
     *
     * @return Response
     */
    public function update($id, Updateconf_empresaAPIRequest $request)
    {
        $input = $request->all();

        /** @var conf_empresa $confEmpresa */
        $confEmpresa = $this->confEmpresaRepository->find($id);

        if (empty($confEmpresa)) {
            return $this->sendError('Conf Empresa not found');
        }

        $confEmpresa = $this->confEmpresaRepository->update($input, $id);

        return $this->sendResponse($confEmpresa->toArray(), 'conf_empresa updated successfully');
    }

    /**
     * Remove the specified conf_empresa from storage.
     * DELETE /confEmpresas/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var conf_empresa $confEmpresa */
        $confEmpresa = $this->confEmpresaRepository->find($id);

        if (empty($confEmpresa)) {
            return $this->sendError('Conf Empresa not found');
        }

        $confEmpresa->delete();

        return $this->sendSuccess('Conf Empresa deleted successfully');
    }
}
