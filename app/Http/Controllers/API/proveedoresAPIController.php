<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateproveedoresAPIRequest;
use App\Http\Requests\API\UpdateproveedoresAPIRequest;
use App\Models\proveedores;
use App\Repositories\proveedoresRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class proveedoresController
 * @package App\Http\Controllers\API
 */

class proveedoresAPIController extends AppBaseController
{
    /** @var  proveedoresRepository */
    private $proveedoresRepository;

    public function __construct(proveedoresRepository $proveedoresRepo)
    {
        $this->proveedoresRepository = $proveedoresRepo;
    }

    /**
     * Display a listing of the proveedores.
     * GET|HEAD /proveedores
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $proveedores = $this->proveedoresRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($proveedores->toArray(), 'Proveedores retrieved successfully');
    }

    /**
     * Store a newly created proveedores in storage.
     * POST /proveedores
     *
     * @param CreateproveedoresAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateproveedoresAPIRequest $request)
    {
        $input = $request->all();

        $proveedores = $this->proveedoresRepository->create($input);

        return $this->sendResponse($proveedores->toArray(), 'Proveedores saved successfully');
    }

    /**
     * Display the specified proveedores.
     * GET|HEAD /proveedores/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var proveedores $proveedores */
        $proveedores = $this->proveedoresRepository->find($id);

        if (empty($proveedores)) {
            return $this->sendError('Proveedores not found');
        }

        return $this->sendResponse($proveedores->toArray(), 'Proveedores retrieved successfully');
    }

    /**
     * Update the specified proveedores in storage.
     * PUT/PATCH /proveedores/{id}
     *
     * @param int $id
     * @param UpdateproveedoresAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateproveedoresAPIRequest $request)
    {
        $input = $request->all();

        /** @var proveedores $proveedores */
        $proveedores = $this->proveedoresRepository->find($id);

        if (empty($proveedores)) {
            return $this->sendError('Proveedores not found');
        }

        $proveedores = $this->proveedoresRepository->update($input, $id);

        return $this->sendResponse($proveedores->toArray(), 'proveedores updated successfully');
    }

    /**
     * Remove the specified proveedores from storage.
     * DELETE /proveedores/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var proveedores $proveedores */
        $proveedores = $this->proveedoresRepository->find($id);

        if (empty($proveedores)) {
            return $this->sendError('Proveedores not found');
        }

        $proveedores->delete();

        return $this->sendSuccess('Proveedores deleted successfully');
    }
}
