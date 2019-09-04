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
	private $dataUkmRepository;

	public function __construct(DataUkmRepository $dataUkmRepo)
	{
		$this->dataUkmRepository = $dataUkmRepo;
		$this->middleware('auth');
	}

	public function index(DataUkmDataTable $dataUkmDataTable) {
		return $dataUkmDataTable->render('data_ukms.index');
	}

    public function create()
    {
    	return view('data_ukms.create');
    }

    public function store(CreateDataUkmRequest $request)
    {
    	$input = $request->all();

    	$dataUkm = $this->dataUkmRepository->create($input);

    	Flash::success('Data Ukm berhasil ditambahkan.');

    	return redirect(route('dataUkms.index'));
    }

    public function show($id)
    {
    	$data = $this->dataUkmRepository->findWithoutFail($id);

    	if (empty($data)) {
    		Flash::error('Data Ukm not found');

    		return redirect(route('dataUkms.index'));
    	}

    	return view('data_ukms.show')->with('data', $data);
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
    	$data = $this->dataUkmRepository->findWithoutFail($id);

    	if (empty($data)) {
    		Flash::error('Data Ukm not found');

    		return redirect(route('dataUkms.index'));
    	}

    	return view('data_ukms.edit')->with('data', $data);
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

    	Flash::success('Data Ukm berhasil diperbarui.');

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