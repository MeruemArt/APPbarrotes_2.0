<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createdetalle_recepcionAPIRequest;
use App\Http\Requests\API\Updatedetalle_recepcionAPIRequest;
use App\Models\detalle_recepcion;
use App\Repositories\detalle_recepcionRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class detalle_recepcionController
 * @package App\Http\Controllers\API
 */

class detalle_recepcionAPIController extends AppBaseController
{
    /** @var  detalle_recepcionRepository */
    private $detalleRecepcionRepository;

    public function __construct(detalle_recepcionRepository $detalleRecepcionRepo)
    {
        $this->detalleRecepcionRepository = $detalleRecepcionRepo;
    }

    /**
     * Display a listing of the detalle_recepcion.
     * GET|HEAD /detalleRecepcions
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $detalleRecepcions = $this->detalleRecepcionRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($detalleRecepcions->toArray(), 'Detalle Recepcions retrieved successfully');
    }

    /**
     * Store a newly created detalle_recepcion in storage.
     * POST /detalleRecepcions
     *
     * @param Createdetalle_recepcionAPIRequest $request
     *
     * @return Response
     */
    public function store(Createdetalle_recepcionAPIRequest $request)
    {
        $input = $request->all();

        $detalleRecepcion = $this->detalleRecepcionRepository->create($input);

        return $this->sendResponse($detalleRecepcion->toArray(), 'Detalle Recepcion saved successfully');
    }

    /**
     * Display the specified detalle_recepcion.
     * GET|HEAD /detalleRecepcions/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var detalle_recepcion $detalleRecepcion */
        $detalleRecepcion = $this->detalleRecepcionRepository->find($id);

        if (empty($detalleRecepcion)) {
            return $this->sendError('Detalle Recepcion not found');
        }

        return $this->sendResponse($detalleRecepcion->toArray(), 'Detalle Recepcion retrieved successfully');
    }

    /**
     * Update the specified detalle_recepcion in storage.
     * PUT/PATCH /detalleRecepcions/{id}
     *
     * @param int $id
     * @param Updatedetalle_recepcionAPIRequest $request
     *
     * @return Response
     */
    public function update($id, Updatedetalle_recepcionAPIRequest $request)
    {
        $input = $request->all();

        /** @var detalle_recepcion $detalleRecepcion */
        $detalleRecepcion = $this->detalleRecepcionRepository->find($id);

        if (empty($detalleRecepcion)) {
            return $this->sendError('Detalle Recepcion not found');
        }

        $detalleRecepcion = $this->detalleRecepcionRepository->update($input, $id);

        return $this->sendResponse($detalleRecepcion->toArray(), 'detalle_recepcion updated successfully');
    }

    /**
     * Remove the specified detalle_recepcion from storage.
     * DELETE /detalleRecepcions/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var detalle_recepcion $detalleRecepcion */
        $detalleRecepcion = $this->detalleRecepcionRepository->find($id);

        if (empty($detalleRecepcion)) {
            return $this->sendError('Detalle Recepcion not found');
        }

        $detalleRecepcion->delete();

        return $this->sendSuccess('Detalle Recepcion deleted successfully');
    }
}
