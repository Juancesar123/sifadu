<?php

namespace App\Http\Controllers;

use App\DataTables\DataBudiDayaHutanDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateDataBudiDayaHutanRequest;
use App\Http\Requests\UpdateDataBudiDayaHutanRequest;
use App\Repositories\DataBudiDayaHutanRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class DataBudiDayaHutanController extends AppBaseController
{
    /** @var  DataBudiDayaHutanRepository */
    private $dataBudiDayaHutanRepository;

    public function __construct(DataBudiDayaHutanRepository $dataBudiDayaHutanRepo)
    {
        $this->dataBudiDayaHutanRepository = $dataBudiDayaHutanRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the DataBudiDayaHutan.
     *
     * @param DataBudiDayaHutanDataTable $dataBudiDayaHutanDataTable
     * @return Response
     */
    public function index(DataBudiDayaHutanDataTable $dataBudiDayaHutanDataTable)
    {
        return $dataBudiDayaHutanDataTable->render('data_budi_daya_hutans.index');
    }

    /**
     * Show the form for creating a new DataBudiDayaHutan.
     *
     * @return Response
     */
    public function create()
    {
        return view('data_budi_daya_hutans.create');
    }

    /**
     * Store a newly created DataBudiDayaHutan in storage.
     *
     * @param CreateDataBudiDayaHutanRequest $request
     *
     * @return Response
     */
    public function store(CreateDataBudiDayaHutanRequest $request)
    {
        $input = $request->all();

        $dataBudiDayaHutan = $this->dataBudiDayaHutanRepository->create($input);

        $dataBudiDayaHutan->input_koordinate($input);
        $dataBudiDayaHutan->save();
        Flash::success('Data Budi Daya Hutan berhasil ditambahkan.');

        return redirect(route('dataBudiDayaHutans.index'));
    }

    /**
     * Display the specified DataBudiDayaHutan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $dataBudiDayaHutan = $this->dataBudiDayaHutanRepository->findWithoutFail($id);

        if (empty($dataBudiDayaHutan)) {
            Flash::error('Data Budi Daya Hutan not found');

            return redirect(route('dataBudiDayaHutans.index'));
        }

        return view('data_budi_daya_hutans.show')->with('dataBudiDayaHutan', $dataBudiDayaHutan);
    }

    /**
     * Show the form for editing the specified DataBudiDayaHutan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $dataBudiDayaHutan = $this->dataBudiDayaHutanRepository->findWithoutFail($id);

        if (empty($dataBudiDayaHutan)) {
            Flash::error('Data Budi Daya Hutan not found');

            return redirect(route('dataBudiDayaHutans.index'));
        }

        return view('data_budi_daya_hutans.edit')->with('dataBudiDayaHutan', $dataBudiDayaHutan);
    }

    /**
     * Update the specified DataBudiDayaHutan in storage.
     *
     * @param  int              $id
     * @param UpdateDataBudiDayaHutanRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDataBudiDayaHutanRequest $request)
    {
        $dataBudiDayaHutan = $this->dataBudiDayaHutanRepository->findWithoutFail($id);

        if (empty($dataBudiDayaHutan)) {
            Flash::error('Data Budi Daya Hutan not found');

            return redirect(route('dataBudiDayaHutans.index'));
        }

        $dataBudiDayaHutan->input_koordinate($request->all());
        $dataBudiDayaHutan->save();

        $dataBudiDayaHutan = $this->dataBudiDayaHutanRepository->update($request->all(), $id);

        Flash::success('Data Budi Daya Hutan berhasil diperbarui.');

        return redirect(route('dataBudiDayaHutans.index'));
    }

    /**
     * Remove the specified DataBudiDayaHutan from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $dataBudiDayaHutan = $this->dataBudiDayaHutanRepository->findWithoutFail($id);

        if (empty($dataBudiDayaHutan)) {
            Flash::error('Data Budi Daya Hutan not found');

            return redirect(route('dataBudiDayaHutans.index'));
        }

        $this->dataBudiDayaHutanRepository->delete($id);

        Flash::success('Data Budi Daya Hutan deleted successfully.');

        return redirect(route('dataBudiDayaHutans.index'));
    }
}
