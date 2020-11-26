<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Storage;

use App\Http\Requests\Createconf_empresaRequest;
use App\Http\Requests\Updateconf_empresaRequest;
use App\Repositories\conf_empresaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class conf_empresaController extends AppBaseController
{
    /** @var  conf_empresaRepository */
    private $confEmpresaRepository;

    public function __construct(conf_empresaRepository $confEmpresaRepo)
    {
        $this->confEmpresaRepository = $confEmpresaRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the conf_empresa.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $confEmpresas = $this->confEmpresaRepository->paginate(10);

        return view('conf_empresas.index')
            ->with('confEmpresas', $confEmpresas);
    }

    /**
     * Show the form for creating a new conf_empresa.
     *
     * @return Response
     */
    public function create()
    {
        return view('conf_empresas.create');
    }

    /**
     * Store a newly created conf_empresa in storage.
     *
     * @param Createconf_empresaRequest $request
     *
     * @return Response
     */
    public function store(Createconf_empresaRequest $request)
    {
        $input = $request->all();


        $confEmpresa = $this->confEmpresaRepository->create($input);

        Flash::success('Conf Empresa saved successfully.');

        return redirect(route('confEmpresas.index'));
    }

    /**
     * Display the specified conf_empresa.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $confEmpresa = $this->confEmpresaRepository->find($id);

        if (empty($confEmpresa)) {
            Flash::error('Conf Empresa not found');

            return redirect(route('confEmpresas.index'));
        }

        return view('conf_empresas.show')->with('confEmpresa', $confEmpresa);
    }

    /**
     * Show the form for editing the specified conf_empresa.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $confEmpresa = $this->confEmpresaRepository->find($id);

        if (empty($confEmpresa)) {
            Flash::error('Conf Empresa not found');

            return redirect(route('confEmpresas.index'));
        }

        return view('conf_empresas.edit')->with('confEmpresa', $confEmpresa);
    }

    /**
     * Update the specified conf_empresa in storage.
     *
     * @param int $id
     * @param Updateconf_empresaRequest $request
     *
     * @return Response
     */
    public function update($id, Updateconf_empresaRequest $request)
    {
        $confEmpresa = $this->confEmpresaRepository->find($id);

        if (empty($confEmpresa)) {
            Flash::error('Conf Empresa not found');

            return redirect(route('confEmpresas.index'));
        }

        $confEmpresa = $this->confEmpresaRepository->update($request->all(), $id);

        Flash::success('Conf Empresa updated successfully.');

        return redirect(route('confEmpresas.index'));
    }

    /**
     * Remove the specified conf_empresa from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $confEmpresa = $this->confEmpresaRepository->find($id);

        if (empty($confEmpresa)) {
            Flash::error('Conf Empresa not found');

            return redirect(route('confEmpresas.index'));
        }

        $this->confEmpresaRepository->delete($id);

        Flash::success('Conf Empresa deleted successfully.');

        return redirect(route('confEmpresas.index'));
    }
}
