<?php

namespace App\Http\Controllers;

use App\DataTables\datawarungDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatedatawarungRequest;
use App\Http\Requests\UpdatedatawarungRequest;
use App\Repositories\datawarungRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class datawarungController extends AppBaseController
{
    /** @var  datawarungRepository */
    private $datawarungRepository;

    public function __construct(datawarungRepository $datawarungRepo)
    {
        $this->datawarungRepository = $datawarungRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the datawarung.
     *
     * @param datawarungDataTable $datawarungDataTable
     * @return Response
     */
    public function index(datawarungDataTable $datawarungDataTable)
    {
        return $datawarungDataTable->render('data_warungs.index');
    }

    /**
     * Show the form for creating a new datawarung.
     *
     * @return Response
     */
    public function create()
    {
        return view('data_warungs.create');
    }

    /**
     * Store a newly created datawarung in storage.
     *
     * @param CreatedatawarungRequest $request
     *
     * @return Response
     */
    public function store(CreatedatawarungRequest $request)
    {
        $input = $request->all();

        $datawarung = $this->datawarungRepository->create($input);

        Flash::success('Data warung saved successfully.');

        return redirect(route('datawarung.index'));
    }

    /**
     * Display the specified datawarung.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $datawarung = $this->datawarungRepository->findWithoutFail($id);

        if (empty($datawarung)) {
            Flash::error('Data warung not found');

            return redirect(route('datawarung.index'));
        }

        return view('data_warungs.show')->with('datawarung', $datawarung);
    }

    /**
     * Show the form for editing the specified datawarung.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $datawarung = $this->datawarungRepository->findWithoutFail($id);

        if (empty($datawarung)) {
            Flash::error('Data warung not found');

            return redirect(route('datawarung.index'));
        }

        return view('data_warungs.edit')->with('datawarung', $datawarung);
    }

    /**
     * Update the specified datawarung in storage.
     *
     * @param  int              $id
     * @param UpdatedatawarungRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatedatawarungRequest $request)
    {
        $datawarung = $this->datawarungRepository->findWithoutFail($id);

        if (empty($datawarung)) {
            Flash::error('Data warung not found');

            return redirect(route('datawarung.index'));
        }

        $datawarung = $this->datawarungRepository->update($request->all(), $id);

        Flash::success('Data warung updated successfully.');

        return redirect(route('datawarung.index'));
    }

    /**
     * Remove the specified datawarung from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $datawarung = $this->datawarungRepository->findWithoutFail($id);

        if (empty($datawarung)) {
            Flash::error('Data warung not found');

            return redirect(route('datawarung.index'));
        }

        $this->datawarungRepository->delete($id);

        Flash::success('Data warung deleted successfully.');

        return redirect(route('datawarung.index'));
    }
}
