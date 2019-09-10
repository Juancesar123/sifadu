<?php

namespace App\Http\Controllers;

use App\DataTables\KeteranganPenghasilanDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateKeteranganPenghasilanRequest;
use App\Http\Requests\UpdateKeteranganPenghasilanRequest;
use App\Repositories\KeteranganPenghasilanRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Models\datapenduduk as Penduduk;

class KeteranganPenghasilanController extends AppBaseController
{
    /** @var  KeteranganPenghasilanRepository */
    private $keteranganPenghasilanRepository;

    public function __construct(KeteranganPenghasilanRepository $keteranganPenghasilanRepo)
    {
        $this->keteranganPenghasilanRepository = $keteranganPenghasilanRepo;
    }

    /**
     * Display a listing of the KeteranganPenghasilan.
     *
     * @param KeteranganPenghasilanDataTable $keteranganPenghasilanDataTable
     * @return Response
     */
    public function index(KeteranganPenghasilanDataTable $keteranganPenghasilanDataTable)
    {
        return $keteranganPenghasilanDataTable->render('keterangan_penghasilans.index');
    }

    /**
     * Show the form for creating a new KeteranganPenghasilan.
     *
     * @return Response
     */
    public function create()
    {
        $data = Penduduk::all();
        return view('keterangan_penghasilans.create', compact('data'));
    }

    /**
     * Store a newly created KeteranganPenghasilan in storage.
     *
     * @param CreateKeteranganPenghasilanRequest $request
     *
     * @return Response
     */
    public function store(CreateKeteranganPenghasilanRequest $request)
    {
        $input = $request->all();

        $keteranganPenghasilan = $this->keteranganPenghasilanRepository->create($input);

        Flash::success('Keterangan Penghasilan saved successfully.');

        return redirect(route('keteranganPenghasilans.index'));
    }

    /**
     * Display the specified KeteranganPenghasilan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $keteranganPenghasilan = $this->keteranganPenghasilanRepository->findWithoutFail($id);

        if (empty($keteranganPenghasilan)) {
            Flash::error('Keterangan Penghasilan not found');

            return redirect(route('keteranganPenghasilans.index'));
        }

        return view('keterangan_penghasilans.show')->with('keteranganPenghasilan', $keteranganPenghasilan);
    }

    /**
     * Show the form for editing the specified KeteranganPenghasilan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $keteranganPenghasilan = $this->keteranganPenghasilanRepository->findWithoutFail($id);

        if (empty($keteranganPenghasilan)) {
            Flash::error('Keterangan Penghasilan not found');

            return redirect(route('keteranganPenghasilans.index'));
        }

        $data = Penduduk::all();
        return view('keterangan_penghasilans.edit', compact('data', 'keteranganPenghasilan'));
    }

    /**
     * Update the specified KeteranganPenghasilan in storage.
     *
     * @param  int              $id
     * @param UpdateKeteranganPenghasilanRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateKeteranganPenghasilanRequest $request)
    {
        $keteranganPenghasilan = $this->keteranganPenghasilanRepository->findWithoutFail($id);

        if (empty($keteranganPenghasilan)) {
            Flash::error('Keterangan Penghasilan not found');

            return redirect(route('keteranganPenghasilans.index'));
        }

        $keteranganPenghasilan = $this->keteranganPenghasilanRepository->update($request->all(), $id);

        Flash::success('Keterangan Penghasilan updated successfully.');

        return redirect(route('keteranganPenghasilans.index'));
    }

    /**
     * Remove the specified KeteranganPenghasilan from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $keteranganPenghasilan = $this->keteranganPenghasilanRepository->findWithoutFail($id);

        if (empty($keteranganPenghasilan)) {
            Flash::error('Keterangan Penghasilan not found');

            return redirect(route('keteranganPenghasilans.index'));
        }

        $this->keteranganPenghasilanRepository->delete($id);

        Flash::success('Keterangan Penghasilan deleted successfully.');

        return redirect(route('keteranganPenghasilans.index'));
    }
}