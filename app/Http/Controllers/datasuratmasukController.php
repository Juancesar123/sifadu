<?php

namespace App\Http\Controllers;

use App\DataTables\datasuratmasukDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatedatasuratmasukRequest;
use App\Http\Requests\UpdatedatasuratmasukRequest;
use App\Repositories\datasuratmasukRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class datasuratmasukController extends AppBaseController
{
    /** @var  datasuratmasukRepository */
    private $datasuratmasukRepository;

    public function __construct(datasuratmasukRepository $datasuratmasukRepo)
    {
        $this->datasuratmasukRepository = $datasuratmasukRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the datasuratmasuk.
     *
     * @param datasuratmasukDataTable $datasuratmasukDataTable
     * @return Response
     */
    public function index(datasuratmasukDataTable $datasuratmasukDataTable)
    {
        return $datasuratmasukDataTable->render('datasuratmasuks.index');
    }

    /**
     * Show the form for creating a new datasuratmasuk.
     *
     * @return Response
     */
    public function create()
    {
        return view('datasuratmasuks.create');
    }

    /**
     * Store a newly created datasuratmasuk in storage.
     *
     * @param CreatedatasuratmasukRequest $request
     *
     * @return Response
     */
    public function store(CreatedatasuratmasukRequest $request)
    {
        $input = $request->all();

        $datasuratmasuk = $this->datasuratmasukRepository->create($input);

        Flash::success('Datasuratmasuk berhasil ditambahkan.');

        return redirect(route('datasuratmasuks.index'));
    }

    /**
     * Display the specified datasuratmasuk.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $datasuratmasuk = $this->datasuratmasukRepository->findWithoutFail($id);

        if (empty($datasuratmasuk)) {
            Flash::error('Datasuratmasuk not found');

            return redirect(route('datasuratmasuks.index'));
        }

        return view('datasuratmasuks.show')->with('datasuratmasuk', $datasuratmasuk);
    }

    /**
     * Show the form for editing the specified datasuratmasuk.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $data = $this->datasuratmasukRepository->findWithoutFail($id);

        if (empty($data)) {
            Flash::error('Datasuratmasuk not found');

            return redirect(route('datasuratmasuks.index'));
        }

        return view('datasuratmasuks.edit')->with('data', $data);
    }

    /**
     * Update the specified datasuratmasuk in storage.
     *
     * @param  int              $id
     * @param UpdatedatasuratmasukRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatedatasuratmasukRequest $request)
    {
        $datasuratmasuk = $this->datasuratmasukRepository->findWithoutFail($id);

        if (empty($datasuratmasuk)) {
            Flash::error('Datasuratmasuk not found');

            return redirect(route('datasuratmasuks.index'));
        }

        $datasuratmasuk = $this->datasuratmasukRepository->update($request->all(), $id);

        Flash::success('Datasuratmasuk berhasil diperbarui.');

        return redirect(route('datasuratmasuks.index'));
    }

    /**
     * Remove the specified datasuratmasuk from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $datasuratmasuk = $this->datasuratmasukRepository->findWithoutFail($id);

        if (empty($datasuratmasuk)) {
            Flash::error('Datasuratmasuk not found');

            return redirect(route('datasuratmasuks.index'));
        }

        $this->datasuratmasukRepository->delete($id);

        Flash::success('Datasuratmasuk deleted successfully.');

        return redirect(route('datasuratmasuks.index'));
    }
}
