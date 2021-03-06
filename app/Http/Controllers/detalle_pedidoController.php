<?php

namespace App\Http\Controllers;

use App\Models\proveedores;
use App\Models\user;

use App\Http\Requests\Createdetalle_pedidoRequest;
use App\Http\Requests\Updatedetalle_pedidoRequest;
use App\Repositories\detalle_pedidoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Auth;
use Response;

class detalle_pedidoController extends AppBaseController
{
    /** @var  detalle_pedidoRepository */
    private $detallePedidoRepository;

    public function __construct(detalle_pedidoRepository $detallePedidoRepo)
    {
        $this->detallePedidoRepository = $detallePedidoRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the detalle_pedido.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $detallePedidos = $this->detallePedidoRepository->paginate(10);

        return view('detalle_pedidos.index')
            ->with('detallePedidos', $detallePedidos);
    }

    /**
     * Show the form for creating a new detalle_pedido.
     *
     * @return Response
     */
    public function create()
    {
        $proveedores=proveedores::all()->pluck('nombre','id');
        $user=user::all()->pluck('name','id');
        return view('detalle_pedidos.create')->with('proveedores',$proveedores)->with('user',$user);
    }

    /**
     * Store a newly created detalle_pedido in storage.
     *
     * @param Createdetalle_pedidoRequest $request
     *
     * @return Response
     */
    public function store(Createdetalle_pedidoRequest $request)
    {
        $input = $request->all();

        $input['user_id'] = Auth::user()->id;

        $detallePedido = $this->detallePedidoRepository->create($input);

        Flash::success('Detalle Pedido saved successfully.');

        return redirect(route('detallePedidos.index'));
    }

    /**
     * Display the specified detalle_pedido.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $detallePedido = $this->detallePedidoRepository->find($id);

        if (empty($detallePedido)) {
            Flash::error('Detalle Pedido not found');

            return redirect(route('detallePedidos.index'));
        }

        return view('detalle_pedidos.show')->with('detallePedido', $detallePedido);
    }

    /**
     * Show the form for editing the specified detalle_pedido.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $detallePedido = $this->detallePedidoRepository->find($id);

        if (empty($detallePedido)) {
            Flash::error('Detalle Pedido not found');

            return redirect(route('detallePedidos.index'));
        }
        $proveedores=proveedores::all()->pluck('nombre','id');
        $user=user::all()->pluck('name','id');
        return view('detalle_pedidos.edit')->with('detallePedido', $detallePedido)->with('proveedores',$proveedores)->with('user',$user);
    }

    /**
     * Update the specified detalle_pedido in storage.
     *
     * @param int $id
     * @param Updatedetalle_pedidoRequest $request
     *
     * @return Response
     */
    public function update($id, Updatedetalle_pedidoRequest $request)
    {
        $detallePedido = $this->detallePedidoRepository->find($id);

        if (empty($detallePedido)) {
            Flash::error('Detalle Pedido not found');

            return redirect(route('detallePedidos.index'));
        }

        $detallePedido = $this->detallePedidoRepository->update($request->all(), $id);

        Flash::success('Detalle Pedido updated successfully.');

        return redirect(route('detallePedidos.index'));
    }

    /**
     * Remove the specified detalle_pedido from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $detallePedido = $this->detallePedidoRepository->find($id);

        if (empty($detallePedido)) {
            Flash::error('Detalle Pedido not found');

            return redirect(route('detallePedidos.index'));
        }

        $this->detallePedidoRepository->delete($id);

        Flash::success('Detalle Pedido deleted successfully.');

        return redirect(route('detallePedidos.index'));
    }
}
