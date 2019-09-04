<?php

namespace App\Http\Controllers;

use App\DataTables\DataUkmDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateDataUkmRequest;
use App\Http\Requests\UpdateDataUkmRequest;
use App\Repositories\DataUkmRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class DataUkmController extends AppBaseController
{
    /** @var  DataUkmRepository */
    private $dataUkmRepository;

    public function __construct(DataUkmRepository $dataUkmRepo)
    {
        $this->dataUkmRepository = $dataUkmRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the DataUkm.
     *
     * @param DataUkmDataTable $dataUkmDataTable
     * @return Response
     */
    public function index(DataUkmDataTable $dataUkmDataTable)
    {
        return $dataUkmDataTable->render('data_ukms.index');
    }

    /**
     * Show the form for creating a new DataUkm.
     *
     * @return Response
     */
    public function create()
    {
        return view('data_ukms.create');
    }

    /**
     * Store a newly created DataUkm in storage.
     *
     * @param CreateDataUkmRequest $request
     *
     * @return Response
     */
    public function store(CreateDataUkmRequest $request)
    {
        $input = $request->all();

        $dataUkm = $this->dataUkmRepository->create($input);

        Flash::success('Data Ukm saved successfully.');

        return redirect(route('dataUkms.index'));
    }

    /**
     * Display the specified DataUkm.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $dataUkm = $this->dataUkmRepository->findWithoutFail($id);

        if (empty($dataUkm)) {
            Flash::error('Data Ukm not found');

            return redirect(route('dataUkms.index'));
        }

        return view('data_ukms.show')->with('dataUkm', $dataUkm);
    }

    /**
     * Show the form for editing the specified DataUkm.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $dataUkm = $this->dataUkmRepository->findWithoutFail($id);

        if (empty($dataUkm)) {
            Flash::error('Data Ukm not found');

            return redirect(route('dataUkms.index'));
        }

        return view('data_ukms.edit')->with('dataUkm', $dataUkm);
    }

    /**
     * Update the specified DataUkm in storage.
     *
     * @param  int              $id
     * @param UpdateDataUkmRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDataUkmRequest $request)
    {
        $dataUkm = $this->dataUkmRepository->findWithoutFail($id);

        if (empty($dataUkm)) {
            Flash::error('Data Ukm not found');

            return redirect(route('dataUkms.index'));
        }

        $dataUkm = $this->dataUkmRepository->update($request->all(), $id);

        Flash::success('Data Ukm updated successfully.');

        return redirect(route('dataUkms.index'));
    }

    /**
     * Remove the specified DataUkm from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $dataUkm = $this->dataUkmRepository->findWithoutFail($id);

        if (empty($dataUkm)) {
            Flash::error('Data Ukm not found');

            return redirect(route('dataUkms.index'));
        }

        $this->dataUkmRepository->delete($id);

        Flash::success('Data Ukm deleted successfully.');

        return redirect(route('dataUkms.index'));
    }
}
