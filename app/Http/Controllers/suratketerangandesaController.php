<?php

namespace App\Http\Controllers;

use App\DataTables\suratketerangandesaDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatesuratketerangandesaRequest;
use App\Http\Requests\UpdatesuratketerangandesaRequest;
use App\Repositories\suratketerangandesaRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Models\datapenduduk as Datapenduduk;
class suratketerangandesaController extends AppBaseController
{
    /** @var  suratketerangandesaRepository */
    private $suratketerangandesaRepository;

    public function __construct(suratketerangandesaRepository $suratketerangandesaRepo)
    {
        $this->suratketerangandesaRepository = $suratketerangandesaRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the suratketerangandesa.
     *
     * @param suratketerangandesaDataTable $suratketerangandesaDataTable
     * @return Response
     */
    public function index(suratketerangandesaDataTable $suratketerangandesaDataTable)
    {
        return $suratketerangandesaDataTable->render('suratketerangandesas.index');
    }

    /**
     * Show the form for creating a new suratketerangandesa.
     *
     * @return Response
     */
    public function create()
    {
        $data = Datapenduduk::all();
        return view('suratketerangandesas.create',['data' => $data]);
    }

    /**
     * Store a newly created suratketerangandesa in storage.
     *
     * @param CreatesuratketerangandesaRequest $request
     *
     * @return Response
     */
    public function store(CreatesuratketerangandesaRequest $request)
    {
        $input = $request->all();

        $suratketerangandesa = $this->suratketerangandesaRepository->create($input);

        Flash::success('Suratketerangandesa saved successfully.');

        return redirect(route('suratketerangandesas.index'));
    }

    /**
     * Display the specified suratketerangandesa.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $suratketerangandesa = $this->suratketerangandesaRepository->findWithoutFail($id);

        if (empty($suratketerangandesa)) {
            Flash::error('Suratketerangandesa not found');

            return redirect(route('suratketerangandesas.index'));
        }

        return view('suratketerangandesas.show')->with('suratketerangandesa', $suratketerangandesa);
    }

    /**
     * Show the form for editing the specified suratketerangandesa.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $suratketerangandesa = $this->suratketerangandesaRepository->findWithoutFail($id);

        if (empty($suratketerangandesa)) {
            Flash::error('Suratketerangandesa not found');

            return redirect(route('suratketerangandesas.index'));
        }
        $data = Datapenduduk::all();
        return view('suratketerangandesas.edit',['data' => $data])->with('suratketerangandesa', $suratketerangandesa);
    }

    /**
     * Update the specified suratketerangandesa in storage.
     *
     * @param  int              $id
     * @param UpdatesuratketerangandesaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatesuratketerangandesaRequest $request)
    {
        $suratketerangandesa = $this->suratketerangandesaRepository->findWithoutFail($id);

        if (empty($suratketerangandesa)) {
            Flash::error('Suratketerangandesa not found');

            return redirect(route('suratketerangandesas.index'));
        }

        $suratketerangandesa = $this->suratketerangandesaRepository->update($request->all(), $id);

        Flash::success('Suratketerangandesa updated successfully.');

        return redirect(route('suratketerangandesas.index'));
    }

    /**
     * Remove the specified suratketerangandesa from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $suratketerangandesa = $this->suratketerangandesaRepository->findWithoutFail($id);

        if (empty($suratketerangandesa)) {
            Flash::error('Suratketerangandesa not found');

            return redirect(route('suratketerangandesas.index'));
        }

        $this->suratketerangandesaRepository->delete($id);

        Flash::success('Suratketerangandesa deleted successfully.');

        return redirect(route('suratketerangandesas.index'));
    }
}
