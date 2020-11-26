<?php

namespace App\Http\Controllers;

use App\Models\cliente;
use App\Models\producto;

use App\Http\Requests\Createproducto_devolucionRequest;
use App\Http\Requests\Updateproducto_devolucionRequest;
use App\Repositories\producto_devolucionRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class producto_devolucionController extends AppBaseController
{
    /** @var  producto_devolucionRepository */
    private $productoDevolucionRepository;

    public function __construct(producto_devolucionRepository $productoDevolucionRepo)
    {
        $this->productoDevolucionRepository = $productoDevolucionRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the producto_devolucion.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $productoDevolucions = $this->productoDevolucionRepository->paginate(10);

        return view('producto_devolucions.index')
            ->with('productoDevolucions', $productoDevolucions);
    }

    /**
     * Show the form for creating a new producto_devolucion.
     *
     * @return Response
     */
    public function create()
    {
        $cliente=cliente::all()->pluck('nombre','id');
        $producto=producto::all()->pluck('nombre','id');
        return view('producto_devolucions.create')->with('cliente',$cliente)->with('producto',$producto);
    }

    /**
     * Store a newly created producto_devolucion in storage.
     *
     * @param Createproducto_devolucionRequest $request
     *
     * @return Response
     */
    public function store(Createproducto_devolucionRequest $request)
    {
        $input = $request->all();

        $productoDevolucion = $this->productoDevolucionRepository->create($input);

        Flash::success('Producto Devolucion saved successfully.');

        return redirect(route('productoDevolucions.index'));
    }

    /**
     * Display the specified producto_devolucion.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $productoDevolucion = $this->productoDevolucionRepository->find($id);

        if (empty($productoDevolucion)) {
            Flash::error('Producto Devolucion not found');

            return redirect(route('productoDevolucions.index'));
        }

        return view('producto_devolucions.show')->with('productoDevolucion', $productoDevolucion);
    }

    /**
     * Show the form for editing the specified producto_devolucion.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $productoDevolucion = $this->productoDevolucionRepository->find($id);

        if (empty($productoDevolucion)) {
            Flash::error('Producto Devolucion not found');

            return redirect(route('productoDevolucions.index'));
        }
        $cliente=cliente::all()->pluck('nombre','id');
        $producto=producto::all()->pluck('nombre','id');

        return view('producto_devolucions.edit')->with('productoDevolucion', $productoDevolucion)->with('cliente',$cliente)->with('producto',$producto);
    }

    /**
     * Update the specified producto_devolucion in storage.
     *
     * @param int $id
     * @param Updateproducto_devolucionRequest $request
     *
     * @return Response
     */
    public function update($id, Updateproducto_devolucionRequest $request)
    {
        $productoDevolucion = $this->productoDevolucionRepository->find($id);

        if (empty($productoDevolucion)) {
            Flash::error('Producto Devolucion not found');

            return redirect(route('productoDevolucions.index'));
        }

        $productoDevolucion = $this->productoDevolucionRepository->update($request->all(), $id);

        Flash::success('Producto Devolucion updated successfully.');

        return redirect(route('productoDevolucions.index'));
    }

    /**
     * Remove the specified producto_devolucion from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $productoDevolucion = $this->productoDevolucionRepository->find($id);

        if (empty($productoDevolucion)) {
            Flash::error('Producto Devolucion not found');

            return redirect(route('productoDevolucions.index'));
        }

        $this->productoDevolucionRepository->delete($id);

        Flash::success('Producto Devolucion deleted successfully.');

        return redirect(route('productoDevolucions.index'));
    }
}
