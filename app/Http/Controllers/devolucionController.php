<?php

namespace App\Http\Controllers;

use App\Models\proveedores;
use App\Models\cliente;
use app\Models\User;

use App\Http\Requests\CreatedevolucionRequest;
use App\Http\Requests\UpdatedevolucionRequest;
use App\Repositories\devolucionRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Auth;
use Response;

class devolucionController extends AppBaseController
{
    /** @var  devolucionRepository */
    private $devolucionRepository;

    public function __construct(devolucionRepository $devolucionRepo)
    {
        $this->devolucionRepository = $devolucionRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the devolucion.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $devolucions = $this->devolucionRepository->paginate(10);

        return view('devolucions.index')
            ->with('devolucions', $devolucions);
    }

    /**
     * Show the form for creating a new devolucion.
     *
     * @return Response
     */
    public function create()
    {
        $proveedores=proveedores::all()->pluck('nombre','id');
        $cliente=cliente::all()->pluck('nombre','id');
        $user=user::all()->pluck('name','id');
        return view('devolucions.create')->with('proveedores',$proveedores)->with('cliente',$cliente)->with('user',$user);
    }

    /**
     * Store a newly created devolucion in storage.
     *
     * @param CreatedevolucionRequest $request
     *
     * @return Response
     */
    public function store(CreatedevolucionRequest $request)
    {
        $input = $request->all();

        $input['user_id'] = Auth::user()->id;

        $devolucion = $this->devolucionRepository->create($input);

        Flash::success('Devolucion saved successfully.');

        return redirect(route('devolucions.index'));
    }

    /**
     * Display the specified devolucion.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $devolucion = $this->devolucionRepository->find($id);

        if (empty($devolucion)) {
            Flash::error('Devolucion not found');

            return redirect(route('devolucions.index'));
        }

        return view('devolucions.show')->with('devolucion', $devolucion);
    }

    /**
     * Show the form for editing the specified devolucion.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        
        $devolucion = $this->devolucionRepository->find($id);

        if (empty($devolucion)) {
            Flash::error('Devolucion not found');

            return redirect(route('devolucions.index'));
        }
        $proveedores=proveedores::all()->pluck('nombre','id');
        $cliente=cliente::all()->pluck('nombre','id');
        $user=user::all()->pluck('name','id');
        return view('devolucions.edit')->with('devolucion', $devolucion)->with('proveedores',$proveedores)->with('cliente',$cliente)->with('user',$user);
    }

    /**
     * Update the specified devolucion in storage.
     *
     * @param int $id
     * @param UpdatedevolucionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatedevolucionRequest $request)
    {
        $devolucion = $this->devolucionRepository->find($id);

        if (empty($devolucion)) {
            Flash::error('Devolucion not found');

            return redirect(route('devolucions.index'));
        }

        $devolucion = $this->devolucionRepository->update($request->all(), $id);

        Flash::success('Devolucion updated successfully.');

        return redirect(route('devolucions.index'));
    }

    /**
     * Remove the specified devolucion from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $devolucion = $this->devolucionRepository->find($id);

        if (empty($devolucion)) {
            Flash::error('Devolucion not found');

            return redirect(route('devolucions.index'));
        }

        $this->devolucionRepository->delete($id);

        Flash::success('Devolucion deleted successfully.');

        return redirect(route('devolucions.index'));
    }
}
