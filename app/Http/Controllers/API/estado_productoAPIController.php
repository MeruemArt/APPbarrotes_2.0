<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createestado_productoAPIRequest;
use App\Http\Requests\API\Updateestado_productoAPIRequest;
use App\Models\estado_producto;
use App\Repositories\estado_productoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class estado_productoController
 * @package App\Http\Controllers\API
 */

class estado_productoAPIController extends AppBaseController
{
    /** @var  estado_productoRepository */
    private $estadoProductoRepository;

    public function __construct(estado_productoRepository $estadoProductoRepo)
    {
        $this->estadoProductoRepository = $estadoProductoRepo;
    }

    /**
     * Display a listing of the estado_producto.
     * GET|HEAD /estadoProductos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $estadoProductos = $this->estadoProductoRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($estadoProductos->toArray(), 'Estado Productos retrieved successfully');
    }

    /**
     * Store a newly created estado_producto in storage.
     * POST /estadoProductos
     *
     * @param Createestado_productoAPIRequest $request
     *
     * @return Response
     */
    public function store(Createestado_productoAPIRequest $request)
    {
        $input = $request->all();

        $estadoProducto = $this->estadoProductoRepository->create($input);

        return $this->sendResponse($estadoProducto->toArray(), 'Estado Producto saved successfully');
    }

    /**
     * Display the specified estado_producto.
     * GET|HEAD /estadoProductos/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var estado_producto $estadoProducto */
        $estadoProducto = $this->estadoProductoRepository->find($id);

        if (empty($estadoProducto)) {
            return $this->sendError('Estado Producto not found');
        }

        return $this->sendResponse($estadoProducto->toArray(), 'Estado Producto retrieved successfully');
    }

    /**
     * Update the specified estado_producto in storage.
     * PUT/PATCH /estadoProductos/{id}
     *
     * @param int $id
     * @param Updateestado_productoAPIRequest $request
     *
     * @return Response
     */
    public function update($id, Updateestado_productoAPIRequest $request)
    {
        $input = $request->all();

        /** @var estado_producto $estadoProducto */
        $estadoProducto = $this->estadoProductoRepository->find($id);

        if (empty($estadoProducto)) {
            return $this->sendError('Estado Producto not found');
        }

        $estadoProducto = $this->estadoProductoRepository->update($input, $id);

        return $this->sendResponse($estadoProducto->toArray(), 'estado_producto updated successfully');
    }

    /**
     * Remove the specified estado_producto from storage.
     * DELETE /estadoProductos/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var estado_producto $estadoProducto */
        $estadoProducto = $this->estadoProductoRepository->find($id);

        if (empty($estadoProducto)) {
            return $this->sendError('Estado Producto not found');
        }

        $estadoProducto->delete();

        return $this->sendSuccess('Estado Producto deleted successfully');
    }
}
