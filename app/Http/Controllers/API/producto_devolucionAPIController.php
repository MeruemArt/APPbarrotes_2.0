<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createproducto_devolucionAPIRequest;
use App\Http\Requests\API\Updateproducto_devolucionAPIRequest;
use App\Models\producto_devolucion;
use App\Repositories\producto_devolucionRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class producto_devolucionController
 * @package App\Http\Controllers\API
 */

class producto_devolucionAPIController extends AppBaseController
{
    /** @var  producto_devolucionRepository */
    private $productoDevolucionRepository;

    public function __construct(producto_devolucionRepository $productoDevolucionRepo)
    {
        $this->productoDevolucionRepository = $productoDevolucionRepo;
    }

    /**
     * Display a listing of the producto_devolucion.
     * GET|HEAD /productoDevolucions
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $productoDevolucions = $this->productoDevolucionRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($productoDevolucions->toArray(), 'Producto Devolucions retrieved successfully');
    }

    /**
     * Store a newly created producto_devolucion in storage.
     * POST /productoDevolucions
     *
     * @param Createproducto_devolucionAPIRequest $request
     *
     * @return Response
     */
    public function store(Createproducto_devolucionAPIRequest $request)
    {
        $input = $request->all();

        $productoDevolucion = $this->productoDevolucionRepository->create($input);

        return $this->sendResponse($productoDevolucion->toArray(), 'Producto Devolucion saved successfully');
    }

    /**
     * Display the specified producto_devolucion.
     * GET|HEAD /productoDevolucions/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var producto_devolucion $productoDevolucion */
        $productoDevolucion = $this->productoDevolucionRepository->find($id);

        if (empty($productoDevolucion)) {
            return $this->sendError('Producto Devolucion not found');
        }

        return $this->sendResponse($productoDevolucion->toArray(), 'Producto Devolucion retrieved successfully');
    }

    /**
     * Update the specified producto_devolucion in storage.
     * PUT/PATCH /productoDevolucions/{id}
     *
     * @param int $id
     * @param Updateproducto_devolucionAPIRequest $request
     *
     * @return Response
     */
    public function update($id, Updateproducto_devolucionAPIRequest $request)
    {
        $input = $request->all();

        /** @var producto_devolucion $productoDevolucion */
        $productoDevolucion = $this->productoDevolucionRepository->find($id);

        if (empty($productoDevolucion)) {
            return $this->sendError('Producto Devolucion not found');
        }

        $productoDevolucion = $this->productoDevolucionRepository->update($input, $id);

        return $this->sendResponse($productoDevolucion->toArray(), 'producto_devolucion updated successfully');
    }

    /**
     * Remove the specified producto_devolucion from storage.
     * DELETE /productoDevolucions/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var producto_devolucion $productoDevolucion */
        $productoDevolucion = $this->productoDevolucionRepository->find($id);

        if (empty($productoDevolucion)) {
            return $this->sendError('Producto Devolucion not found');
        }

        $productoDevolucion->delete();

        return $this->sendSuccess('Producto Devolucion deleted successfully');
    }
}
