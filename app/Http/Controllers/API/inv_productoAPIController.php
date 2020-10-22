<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createinv_productoAPIRequest;
use App\Http\Requests\API\Updateinv_productoAPIRequest;
use App\Models\inv_producto;
use App\Repositories\inv_productoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class inv_productoController
 * @package App\Http\Controllers\API
 */

class inv_productoAPIController extends AppBaseController
{
    /** @var  inv_productoRepository */
    private $invProductoRepository;

    public function __construct(inv_productoRepository $invProductoRepo)
    {
        $this->invProductoRepository = $invProductoRepo;
    }

    /**
     * Display a listing of the inv_producto.
     * GET|HEAD /invProductos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $invProductos = $this->invProductoRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($invProductos->toArray(), 'Inv Productos retrieved successfully');
    }

    /**
     * Store a newly created inv_producto in storage.
     * POST /invProductos
     *
     * @param Createinv_productoAPIRequest $request
     *
     * @return Response
     */
    public function store(Createinv_productoAPIRequest $request)
    {
        $input = $request->all();

        $invProducto = $this->invProductoRepository->create($input);

        return $this->sendResponse($invProducto->toArray(), 'Inv Producto saved successfully');
    }

    /**
     * Display the specified inv_producto.
     * GET|HEAD /invProductos/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var inv_producto $invProducto */
        $invProducto = $this->invProductoRepository->find($id);

        if (empty($invProducto)) {
            return $this->sendError('Inv Producto not found');
        }

        return $this->sendResponse($invProducto->toArray(), 'Inv Producto retrieved successfully');
    }

    /**
     * Update the specified inv_producto in storage.
     * PUT/PATCH /invProductos/{id}
     *
     * @param int $id
     * @param Updateinv_productoAPIRequest $request
     *
     * @return Response
     */
    public function update($id, Updateinv_productoAPIRequest $request)
    {
        $input = $request->all();

        /** @var inv_producto $invProducto */
        $invProducto = $this->invProductoRepository->find($id);

        if (empty($invProducto)) {
            return $this->sendError('Inv Producto not found');
        }

        $invProducto = $this->invProductoRepository->update($input, $id);

        return $this->sendResponse($invProducto->toArray(), 'inv_producto updated successfully');
    }

    /**
     * Remove the specified inv_producto from storage.
     * DELETE /invProductos/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var inv_producto $invProducto */
        $invProducto = $this->invProductoRepository->find($id);

        if (empty($invProducto)) {
            return $this->sendError('Inv Producto not found');
        }

        $invProducto->delete();

        return $this->sendSuccess('Inv Producto deleted successfully');
    }
}
