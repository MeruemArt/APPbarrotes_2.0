<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createestado_productoRequest;
use App\Http\Requests\Updateestado_productoRequest;
use App\Repositories\estado_productoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class estado_productoController extends AppBaseController
{
    /** @var  estado_productoRepository */
    private $estadoProductoRepository;

    public function __construct(estado_productoRepository $estadoProductoRepo)
    {
        $this->estadoProductoRepository = $estadoProductoRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the estado_producto.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $estadoProductos = $this->estadoProductoRepository->paginate(10);

        return view('estado_productos.index')
            ->with('estadoProductos', $estadoProductos);
    }

    /**
     * Show the form for creating a new estado_producto.
     *
     * @return Response
     */
    public function create()
    {
        return view('estado_productos.create');
    }

    /**
     * Store a newly created estado_producto in storage.
     *
     * @param Createestado_productoRequest $request
     *
     * @return Response
     */
    public function store(Createestado_productoRequest $request)
    {
        $input = $request->all();

        $estadoProducto = $this->estadoProductoRepository->create($input);

        Flash::success('Estado Producto saved successfully.');

        return redirect(route('estadoProductos.index'));
    }

    /**
     * Display the specified estado_producto.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $estadoProducto = $this->estadoProductoRepository->find($id);

        if (empty($estadoProducto)) {
            Flash::error('Estado Producto not found');

            return redirect(route('estadoProductos.index'));
        }

        return view('estado_productos.show')->with('estadoProducto', $estadoProducto);
    }

    /**
     * Show the form for editing the specified estado_producto.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $estadoProducto = $this->estadoProductoRepository->find($id);

        if (empty($estadoProducto)) {
            Flash::error('Estado Producto not found');

            return redirect(route('estadoProductos.index'));
        }

        return view('estado_productos.edit')->with('estadoProducto', $estadoProducto);
    }

    /**
     * Update the specified estado_producto in storage.
     *
     * @param int $id
     * @param Updateestado_productoRequest $request
     *
     * @return Response
     */
    public function update($id, Updateestado_productoRequest $request)
    {
        $estadoProducto = $this->estadoProductoRepository->find($id);

        if (empty($estadoProducto)) {
            Flash::error('Estado Producto not found');

            return redirect(route('estadoProductos.index'));
        }

        $estadoProducto = $this->estadoProductoRepository->update($request->all(), $id);

        Flash::success('Estado Producto updated successfully.');

        return redirect(route('estadoProductos.index'));
    }

    /**
     * Remove the specified estado_producto from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $estadoProducto = $this->estadoProductoRepository->find($id);

        if (empty($estadoProducto)) {
            Flash::error('Estado Producto not found');

            return redirect(route('estadoProductos.index'));
        }

        $this->estadoProductoRepository->delete($id);

        Flash::success('Estado Producto deleted successfully.');

        return redirect(route('estadoProductos.index'));
    }
}
