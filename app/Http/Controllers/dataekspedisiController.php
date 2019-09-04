<?php

namespace App\Http\Controllers;

use App\DataTables\dataekspedisiDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatedataekspedisiRequest;
use App\Http\Requests\UpdatedataekspedisiRequest;
use App\Repositories\dataekspedisiRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class dataekspedisiController extends AppBaseController
{
    /** @var  dataekspedisiRepository */
    private $dataekspedisiRepository;

    public function __construct(dataekspedisiRepository $dataekspedisiRepo)
    {
        $this->dataekspedisiRepository = $dataekspedisiRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the dataekspedisi.
     *
     * @param dataekspedisiDataTable $dataekspedisiDataTable
     * @return Response
     */
    public function index(dataekspedisiDataTable $dataekspedisiDataTable)
    {
        return $dataekspedisiDataTable->render('dataekspedisis.index');
    }

    /**
     * Show the form for creating a new dataekspedisi.
     *
     * @return Response
     */
    public function create()
    {
        return view('dataekspedisis.create');
    }

    /**
     * Store a newly created dataekspedisi in storage.
     *
     * @param CreatedataekspedisiRequest $request
     *
     * @return Response
     */
    public function store(CreatedataekspedisiRequest $request)
    {
        $input = $request->all();

        $dataekspedisi = $this->dataekspedisiRepository->create($input);

        Flash::success('Dataekspedisi saved successfully.');

        return redirect(route('dataekspedisis.index'));
    }

    /**
     * Display the specified dataekspedisi.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $dataekspedisi = $this->dataekspedisiRepository->findWithoutFail($id);

        if (empty($dataekspedisi)) {
            Flash::error('Dataekspedisi not found');

            return redirect(route('dataekspedisis.index'));
        }

        return view('dataekspedisis.show')->with('dataekspedisi', $dataekspedisi);
    }

    /**
     * Show the form for editing the specified dataekspedisi.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $dataekspedisi = $this->dataekspedisiRepository->findWithoutFail($id);

        if (empty($dataekspedisi)) {
            Flash::error('Dataekspedisi not found');

            return redirect(route('dataekspedisis.index'));
        }

        return view('dataekspedisis.edit')->with('dataekspedisi', $dataekspedisi);
    }

    /**
     * Update the specified dataekspedisi in storage.
     *
     * @param  int              $id
     * @param UpdatedataekspedisiRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatedataekspedisiRequest $request)
    {
        $dataekspedisi = $this->dataekspedisiRepository->findWithoutFail($id);

        if (empty($dataekspedisi)) {
            Flash::error('Dataekspedisi not found');

            return redirect(route('dataekspedisis.index'));
        }

        $dataekspedisi = $this->dataekspedisiRepository->update($request->all(), $id);

        Flash::success('Dataekspedisi updated successfully.');

        return redirect(route('dataekspedisis.index'));
    }

    /**
     * Remove the specified dataekspedisi from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $dataekspedisi = $this->dataekspedisiRepository->findWithoutFail($id);

        if (empty($dataekspedisi)) {
            Flash::error('Dataekspedisi not found');

            return redirect(route('dataekspedisis.index'));
        }

        $this->dataekspedisiRepository->delete($id);

        Flash::success('Dataekspedisi deleted successfully.');

        return redirect(route('dataekspedisis.index'));
    }
}
