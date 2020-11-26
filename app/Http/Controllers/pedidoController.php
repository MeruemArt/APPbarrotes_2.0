<?php

namespace App\Http\Controllers;

use app\Models\User;

use App\Http\Requests\CreatepedidoRequest;
use App\Http\Requests\UpdatepedidoRequest;
use App\Repositories\pedidoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Auth;
use Response;

class pedidoController extends AppBaseController
{
    /** @var  pedidoRepository */
    private $pedidoRepository;

    public function __construct(pedidoRepository $pedidoRepo)
    {
        $this->pedidoRepository = $pedidoRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the pedido.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $pedidos = $this->pedidoRepository->paginate(10);

        return view('pedidos.index')
            ->with('pedidos', $pedidos);
    }

    /**
     * Show the form for creating a new pedido.
     *
     * @return Response
     */
    public function create()
    {
        $user=user::all()->pluck('name','id');
        return view('pedidos.create')->with('user',$user);
    }

    /**
     * Store a newly created pedido in storage.
     *
     * @param CreatepedidoRequest $request
     *
     * @return Response
     */
    public function store(CreatepedidoRequest $request)
    {
        $input = $request->all();

        $input['user_id'] = Auth::user()->id;

        $pedido = $this->pedidoRepository->create($input);

        Flash::success('Pedido saved successfully.');

        return redirect(route('pedidos.index'));
    }

    /**
     * Display the specified pedido.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $pedido = $this->pedidoRepository->find($id);

        if (empty($pedido)) {
            Flash::error('Pedido not found');

            return redirect(route('pedidos.index'));
        }

        return view('pedidos.show')->with('pedido', $pedido);
    }

    /**
     * Show the form for editing the specified pedido.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $pedido = $this->pedidoRepository->find($id);

        if (empty($pedido)) {
            Flash::error('Pedido not found');

            return redirect(route('pedidos.index'));
        }
        $user=user::all()->pluck('name','id');
        return view('pedidos.edit')->with('pedido', $pedido)->with('user',$user);
    }

    /**
     * Update the specified pedido in storage.
     *
     * @param int $id
     * @param UpdatepedidoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatepedidoRequest $request)
    {
        $pedido = $this->pedidoRepository->find($id);

        if (empty($pedido)) {
            Flash::error('Pedido not found');

            return redirect(route('pedidos.index'));
        }

        $pedido = $this->pedidoRepository->update($request->all(), $id);

        Flash::success('Pedido updated successfully.');

        return redirect(route('pedidos.index'));
    }

    /**
     * Remove the specified pedido from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pedido = $this->pedidoRepository->find($id);

        if (empty($pedido)) {
            Flash::error('Pedido not found');

            return redirect(route('pedidos.index'));
        }

        $this->pedidoRepository->delete($id);

        Flash::success('Pedido deleted successfully.');

        return redirect(route('pedidos.index'));
    }
}
