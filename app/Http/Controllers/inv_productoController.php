<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createinv_productoRequest;
use App\Http\Requests\Updateinv_productoRequest;
use App\Repositories\inv_productoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class inv_productoController extends AppBaseController
{
    /** @var  inv_productoRepository */
    private $invProductoRepository;

    public function __construct(inv_productoRepository $invProductoRepo)
    {
        $this->invProductoRepository = $invProductoRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the inv_producto.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $invProductos = $this->invProductoRepository->paginate(10);

        return view('inv_productos.index')
            ->with('invProductos', $invProductos);
    }

    /**
     * Show the form for creating a new inv_producto.
     *
     * @return Response
     */
    public function create()
    {
        return view('inv_productos.create');
    }

    /**
     * Store a newly created inv_producto in storage.
     *
     * @param Createinv_productoRequest $request
     *
     * @return Response
     */
    public function store(Createinv_productoRequest $request)
    {
        $input = $request->all();

        $invProducto = $this->invProductoRepository->create($input);

        Flash::success('Inv Producto saved successfully.');

        return redirect(route('invProductos.index'));
    }

    /**
     * Display the specified inv_producto.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $invProducto = $this->invProductoRepository->find($id);

        if (empty($invProducto)) {
            Flash::error('Inv Producto not found');

            return redirect(route('invProductos.index'));
        }

        return view('inv_productos.show')->with('invProducto', $invProducto);
    }

    /**
     * Show the form for editing the specified inv_producto.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $invProducto = $this->invProductoRepository->find($id);

        if (empty($invProducto)) {
            Flash::error('Inv Producto not found');

            return redirect(route('invProductos.index'));
        }

        return view('inv_productos.edit')->with('invProducto', $invProducto);
    }

    /**
     * Update the specified inv_producto in storage.
     *
     * @param int $id
     * @param Updateinv_productoRequest $request
     *
     * @return Response
     */
    public function update($id, Updateinv_productoRequest $request)
    {
        $invProducto = $this->invProductoRepository->find($id);

        if (empty($invProducto)) {
            Flash::error('Inv Producto not found');

            return redirect(route('invProductos.index'));
        }

        $invProducto = $this->invProductoRepository->update($request->all(), $id);

        Flash::success('Inv Producto updated successfully.');

        return redirect(route('invProductos.index'));
    }

    /**
     * Remove the specified inv_producto from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $invProducto = $this->invProductoRepository->find($id);

        if (empty($invProducto)) {
            Flash::error('Inv Producto not found');

            return redirect(route('invProductos.index'));
        }

        $this->invProductoRepository->delete($id);

        Flash::success('Inv Producto deleted successfully.');

        return redirect(route('invProductos.index'));
    }
}
