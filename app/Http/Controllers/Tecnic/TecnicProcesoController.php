<?php

namespace App\Http\Controllers\Tecnic;

use App\DataTables\TecnicProcesoDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateTecnicProcesoRequest;
use App\Http\Requests\UpdateTecnicProcesoRequest;
use App\Repositories\TecnicProcesoRepository;
use Illuminate\Support\Facades\View;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class TecnicProcesoController extends AppBaseController
{
    /** @var  TecnicProcesoRepository */
    private $tecnicProcesoRepository;

    public function __construct(TecnicProcesoRepository $tecnicProcesoRepo)
    {
        View::share('menu','tecnic.menu');
        $this->tecnicProcesoRepository = $tecnicProcesoRepo;
    }

    /**
     * Display a listing of the TecnicProceso.
     *
     * @param TecnicProcesoDataTable $tecnicProcesoDataTable
     * @return Response
     */
    public function index(TecnicProcesoDataTable $tecnicProcesoDataTable)
    {
        return $tecnicProcesoDataTable->render('tecnic.tecnic_procesos.index');
    }

    /**
     * Show the form for creating a new TecnicProceso.
     *
     * @return Response
     */
    public function create()
    {
        return view('tecnic.tecnic_procesos.create');
    }

    /**
     * Store a newly created TecnicProceso in storage.
     *
     * @param CreateTecnicProcesoRequest $request
     *
     * @return Response
     */
    public function store(CreateTecnicProcesoRequest $request)
    {
        $input = $request->all();

        $tecnicProceso = $this->tecnicProcesoRepository->create($input);

        Flash::success('Tecnic Proceso saved successfully.');

        return redirect(route('tecnica_procesos.index'));
    }

    /**
     * Display the specified TecnicProceso.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tecnicProceso = $this->tecnicProcesoRepository->find($id);

        if (empty($tecnicProceso)) {
            Flash::error('Tecnic Proceso not found');

            return redirect(route('tecnica_procesos.index'));
        }

        return view('tecnic.tecnic_procesos.show')->with('tecnicProceso', $tecnicProceso);
    }

    /**
     * Show the form for editing the specified TecnicProceso.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tecnicProceso = $this->tecnicProcesoRepository->find($id);

        if (empty($tecnicProceso)) {
            Flash::error('Tecnic Proceso not found');

            return redirect(route('tecnica_procesos.index'));
        }

        return view('tecnic.tecnic_procesos.edit')->with('tecnicProceso', $tecnicProceso);
    }

    /**
     * Update the specified TecnicProceso in storage.
     *
     * @param  int              $id
     * @param UpdateTecnicProcesoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTecnicProcesoRequest $request)
    {
        $tecnicProceso = $this->tecnicProcesoRepository->find($id);

        if (empty($tecnicProceso)) {
            Flash::error('Tecnic Proceso not found');

            return redirect(route('tecnica_procesos.index'));
        }

        $tecnicProceso = $this->tecnicProcesoRepository->update($request->all(), $id);

        Flash::success('Tecnic Proceso updated successfully.');

        return redirect(route('tecnica_procesos.index'));
    }

    /**
     * Remove the specified TecnicProceso from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tecnicProceso = $this->tecnicProcesoRepository->find($id);

        if (empty($tecnicProceso)) {
            Flash::error('Tecnic Proceso not found');

            return redirect(route('tecnica_procesos.index'));
        }

        $this->tecnicProcesoRepository->delete($id);

        Flash::success('Tecnic Proceso deleted successfully.');

        return redirect(route('tecnica_procesos.index'));
    }
}
