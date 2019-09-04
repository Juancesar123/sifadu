<?php

namespace App\Http\Controllers;

use App\DataTables\datasuratkeluarDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatedatasuratkeluarRequest;
use App\Http\Requests\UpdatedatasuratkeluarRequest;
use App\Repositories\datasuratkeluarRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class datasuratkeluarController extends AppBaseController
{
    /** @var  datasuratkeluarRepository */
    private $datasuratkeluarRepository;

    public function __construct(datasuratkeluarRepository $datasuratkeluarRepo)
    {
        $this->datasuratkeluarRepository = $datasuratkeluarRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the datasuratkeluar.
     *
     * @param datasuratkeluarDataTable $datasuratkeluarDataTable
     * @return Response
     */
    public function index(datasuratkeluarDataTable $datasuratkeluarDataTable)
    {
        return $datasuratkeluarDataTable->render('datasuratkeluars.index');
    }

    /**
     * Show the form for creating a new datasuratkeluar.
     *
     * @return Response
     */
    public function create()
    {
        return view('datasuratkeluars.create');
    }

    /**
     * Store a newly created datasuratkeluar in storage.
     *
     * @param CreatedatasuratkeluarRequest $request
     *
     * @return Response
     */
    public function store(CreatedatasuratkeluarRequest $request)
    {
        $input = $request->all();

        $datasuratkeluar = $this->datasuratkeluarRepository->create($input);

        Flash::success('Datasuratkeluar berhasil ditambahkan.');

        return redirect(route('datasuratkeluars.index'));
    }

    /**
     * Display the specified datasuratkeluar.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $datasuratkeluar = $this->datasuratkeluarRepository->findWithoutFail($id);

        if (empty($datasuratkeluar)) {
            Flash::error('Datasuratkeluar not found');

            return redirect(route('datasuratkeluars.index'));
        }

        return view('datasuratkeluars.show')->with('datasuratkeluar', $datasuratkeluar);
    }

    /**
     * Show the form for editing the specified datasuratkeluar.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $datasuratkeluar = $this->datasuratkeluarRepository->findWithoutFail($id);

        if (empty($datasuratkeluar)) {
            Flash::error('Datasuratkeluar not found');

            return redirect(route('datasuratkeluars.index'));
        }

        return view('datasuratkeluars.edit')->with('datasuratkeluar', $datasuratkeluar);
    }

    /**
     * Update the specified datasuratkeluar in storage.
     *
     * @param  int              $id
     * @param UpdatedatasuratkeluarRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatedatasuratkeluarRequest $request)
    {
        $datasuratkeluar = $this->datasuratkeluarRepository->findWithoutFail($id);

        if (empty($datasuratkeluar)) {
            Flash::error('Datasuratkeluar not found');

            return redirect(route('datasuratkeluars.index'));
        }

        $datasuratkeluar = $this->datasuratkeluarRepository->update($request->all(), $id);

        Flash::success('Datasuratkeluar berhasil diperbarui.');

        return redirect(route('datasuratkeluars.index'));
    }

    /**
     * Remove the specified datasuratkeluar from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $datasuratkeluar = $this->datasuratkeluarRepository->findWithoutFail($id);

        if (empty($datasuratkeluar)) {
            Flash::error('Datasuratkeluar not found');

            return redirect(route('datasuratkeluars.index'));
        }

        $this->datasuratkeluarRepository->delete($id);

        Flash::success('Datasuratkeluar deleted successfully.');

        return redirect(route('datasuratkeluars.index'));
    }
}
