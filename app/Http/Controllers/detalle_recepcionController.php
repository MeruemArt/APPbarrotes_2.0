<?php

namespace App\Http\Controllers;

use \App\Models\pedido;
use \App\Models\detalle_pedido;

use App\Http\Requests\Createdetalle_recepcionRequest;
use App\Http\Requests\Updatedetalle_recepcionRequest;
use App\Repositories\detalle_recepcionRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class detalle_recepcionController extends AppBaseController
{
    /** @var  detalle_recepcionRepository */
    private $detalleRecepcionRepository;

    public function __construct(detalle_recepcionRepository $detalleRecepcionRepo)
    {
        $this->detalleRecepcionRepository = $detalleRecepcionRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the detalle_recepcion.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $detalleRecepcions = $this->detalleRecepcionRepository->paginate(10);

        return view('detalle_recepcions.index')
            ->with('detalleRecepcions', $detalleRecepcions);
    }

    /**
     * Show the form for creating a new detalle_recepcion.
     *
     * @return Response
     */
    public function create()
    {
        $pedido=pedido::all()->pluck('fecha_programada','id');
        $detalle_pedido=detalle_pedido::all()->pluck('codigo_fact','id');
        return view('detalle_recepcions.create')->with('pedido',$pedido)->with('detalle_pedido',$detalle_pedido);
    }

    /**
     * Store a newly created detalle_recepcion in storage.
     *
     * @param Createdetalle_recepcionRequest $request
     *
     * @return Response
     */
    public function store(Createdetalle_recepcionRequest $request)
    {
        $input = $request->all();

        $detalleRecepcion = $this->detalleRecepcionRepository->create($input);

        Flash::success('Detalle Recepcion saved successfully.');

        return redirect(route('detalleRecepcions.index'));
    }

    /**
     * Display the specified detalle_recepcion.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $detalleRecepcion = $this->detalleRecepcionRepository->find($id);

        if (empty($detalleRecepcion)) {
            Flash::error('Detalle Recepcion not found');

            return redirect(route('detalleRecepcions.index'));
        }

        return view('detalle_recepcions.show')->with('detalleRecepcion', $detalleRecepcion);
    }

    /**
     * Show the form for editing the specified detalle_recepcion.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $detalleRecepcion = $this->detalleRecepcionRepository->find($id);

        if (empty($detalleRecepcion)) {
            Flash::error('Detalle Recepcion not found');

            return redirect(route('detalleRecepcions.index'));
        }

        $pedido=pedido::all()->pluck('fecha_programada','id');
        $detalle_pedido=detalle_pedido::all()->pluck('codigo_fact','id');

        return view('detalle_recepcions.edit')->with('detalleRecepcion', $detalleRecepcion)->with('pedido',$pedido)->with('detalle_pedido',$detalle_pedido);
    }

    /**
     * Update the specified detalle_recepcion in storage.
     *
     * @param int $id
     * @param Updatedetalle_recepcionRequest $request
     *
     * @return Response
     */
    public function update($id, Updatedetalle_recepcionRequest $request)
    {
        $detalleRecepcion = $this->detalleRecepcionRepository->find($id);

        if (empty($detalleRecepcion)) {
            Flash::error('Detalle Recepcion not found');

            return redirect(route('detalleRecepcions.index'));
        }

        $detalleRecepcion = $this->detalleRecepcionRepository->update($request->all(), $id);

        Flash::success('Detalle Recepcion updated successfully.');

        return redirect(route('detalleRecepcions.index'));
    }

    /**
     * Remove the specified detalle_recepcion from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $detalleRecepcion = $this->detalleRecepcionRepository->find($id);

        if (empty($detalleRecepcion)) {
            Flash::error('Detalle Recepcion not found');

            return redirect(route('detalleRecepcions.index'));
        }

        $this->detalleRecepcionRepository->delete($id);

        Flash::success('Detalle Recepcion deleted successfully.');

        return redirect(route('detalleRecepcions.index'));
    }
}
