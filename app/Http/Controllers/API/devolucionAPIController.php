<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatedevolucionAPIRequest;
use App\Http\Requests\API\UpdatedevolucionAPIRequest;
use App\Models\devolucion;
use App\Repositories\devolucionRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class devolucionController
 * @package App\Http\Controllers\API
 */

class devolucionAPIController extends AppBaseController
{
    /** @var  devolucionRepository */
    private $devolucionRepository;

    public function __construct(devolucionRepository $devolucionRepo)
    {
        $this->devolucionRepository = $devolucionRepo;
    }

    /**
     * Display a listing of the devolucion.
     * GET|HEAD /devolucions
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $devolucions = $this->devolucionRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($devolucions->toArray(), 'Devolucions retrieved successfully');
    }

    /**
     * Store a newly created devolucion in storage.
     * POST /devolucions
     *
     * @param CreatedevolucionAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatedevolucionAPIRequest $request)
    {
        $input = $request->all();

        $devolucion = $this->devolucionRepository->create($input);

        return $this->sendResponse($devolucion->toArray(), 'Devolucion saved successfully');
    }

    /**
     * Display the specified devolucion.
     * GET|HEAD /devolucions/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var devolucion $devolucion */
        $devolucion = $this->devolucionRepository->find($id);

        if (empty($devolucion)) {
            return $this->sendError('Devolucion not found');
        }

        return $this->sendResponse($devolucion->toArray(), 'Devolucion retrieved successfully');
    }

    /**
     * Update the specified devolucion in storage.
     * PUT/PATCH /devolucions/{id}
     *
     * @param int $id
     * @param UpdatedevolucionAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatedevolucionAPIRequest $request)
    {
        $input = $request->all();

        /** @var devolucion $devolucion */
        $devolucion = $this->devolucionRepository->find($id);

        if (empty($devolucion)) {
            return $this->sendError('Devolucion not found');
        }

        $devolucion = $this->devolucionRepository->update($input, $id);

        return $this->sendResponse($devolucion->toArray(), 'devolucion updated successfully');
    }

    /**
     * Remove the specified devolucion from storage.
     * DELETE /devolucions/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var devolucion $devolucion */
        $devolucion = $this->devolucionRepository->find($id);

        if (empty($devolucion)) {
            return $this->sendError('Devolucion not found');
        }

        $devolucion->delete();

        return $this->sendSuccess('Devolucion deleted successfully');
    }
}
