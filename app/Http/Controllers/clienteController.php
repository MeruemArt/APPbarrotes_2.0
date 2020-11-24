<?php

namespace App\Http\Controllers;

use app\Models\User;
use App\Http\Requests\CreateclienteRequest;
use App\Http\Requests\UpdateclienteRequest;
use App\Repositories\clienteRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class clienteController extends AppBaseController
{
    /** @var  clienteRepository */
    private $clienteRepository;

    public function __construct(clienteRepository $clienteRepo)
    {
        $this->clienteRepository = $clienteRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the cliente.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $clientes = $this->clienteRepository->paginate(10);

        return view('clientes.index')
            ->with('clientes', $clientes);
    }

    /**
     * Show the form for creating a new cliente.
     *
     * @return Response
     */
    public function create()
    {
        $user=user::all()->pluck('name','id');
        return view('clientes.create')->with('user',$user);

    }

    /**
     * Store a newly created cliente in storage.
     *
     * @param CreateclienteRequest $request
     *
     * @return Response
     */
    public function store(CreateclienteRequest $request)
    {
        $input = $request->all();

        $cliente = $this->clienteRepository->create($input);

        Flash::success('Cliente saved successfully.');

        return redirect(route('clientes.index'));
    }

    /**
     * Display the specified cliente.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $cliente = $this->clienteRepository->find($id);

        if (empty($cliente)) {
            Flash::error('Cliente not found');

            return redirect(route('clientes.index'));
        }

        return view('clientes.show')->with('cliente', $cliente);
    }

    /**
     * Show the form for editing the specified cliente.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $cliente = $this->clienteRepository->find($id);

        if (empty($cliente)) {
            Flash::error('Cliente not found');

            return redirect(route('clientes.index'));
        }
        $user=user::all()->pluck('name','id');
        return view('clientes.edit')->with('cliente', $cliente)->with('user',$user);
    }

    /**
     * Update the specified cliente in storage.
     *
     * @param int $id
     * @param UpdateclienteRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateclienteRequest $request)
    {
        $cliente = $this->clienteRepository->find($id);

        if (empty($cliente)) {
            Flash::error('Cliente not found');

            return redirect(route('clientes.index'));
        }

        $cliente = $this->clienteRepository->update($request->all(), $id);

        Flash::success('Cliente updated successfully.');

        return redirect(route('clientes.index'));
    }

    /**
     * Remove the specified cliente from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $cliente = $this->clienteRepository->find($id);

        if (empty($cliente)) {
            Flash::error('Cliente not found');

            return redirect(route('clientes.index'));
        }

        $this->clienteRepository->delete($id);

        Flash::success('Cliente deleted successfully.');

        return redirect(route('clientes.index'));
    }
}
