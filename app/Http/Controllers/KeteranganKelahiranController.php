<?php

namespace App\Http\Controllers;

use App\DataTables\KeteranganKelahiranDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateKeteranganKelahiranRequest;
use App\Http\Requests\UpdateKeteranganKelahiranRequest;
use App\Repositories\KeteranganKelahiranRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Models\datapenduduk as Penduduk;

class KeteranganKelahiranController extends AppBaseController
{
    /** @var  KeteranganKelahiranRepository */
    private $keteranganKelahiranRepository;

    public function __construct(KeteranganKelahiranRepository $keteranganKelahiranRepo)
    {
        $this->keteranganKelahiranRepository = $keteranganKelahiranRepo;
    }

    /**
     * Display a listing of the KeteranganKelahiran.
     *
     * @param KeteranganKelahiranDataTable $keteranganKelahiranDataTable
     * @return Response
     */
    public function index(KeteranganKelahiranDataTable $keteranganKelahiranDataTable)
    {
        return $keteranganKelahiranDataTable->render('keterangan_kelahirans.index');
    }

    /**
     * Show the form for creating a new KeteranganKelahiran.
     *
     * @return Response
     */
    public function create()
    {
        $data = Penduduk::all();
        return view('keterangan_kelahirans.create', ['data'=>$data]);
    }

    /**
     * Store a newly created KeteranganKelahiran in storage.
     *
     * @param CreateKeteranganKelahiranRequest $request
     *
     * @return Response
     */
    public function store(CreateKeteranganKelahiranRequest $request)
    {
        $input = $request->all();

        $keteranganKelahiran = $this->keteranganKelahiranRepository->create($input);

        Flash::success('Keterangan Kelahiran saved successfully.');

        return redirect(route('keterangan-kelahiran.index'));
    }

    /**
     * Display the specified KeteranganKelahiran.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $keteranganKelahiran = $this->keteranganKelahiranRepository->findWithoutFail($id);

        if (empty($keteranganKelahiran)) {
            Flash::error('Keterangan Kelahiran not found');

            return redirect(route('keterangan-kelahiran.index'));
        }

        return view('keterangan_kelahirans.show')->with('keteranganKelahiran', $keteranganKelahiran);
    }

    /**
     * Show the form for editing the specified KeteranganKelahiran.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $data = Penduduk::all();
        $keteranganKelahiran = $this->keteranganKelahiranRepository->findWithoutFail($id);

        if (empty($keteranganKelahiran)) {
            Flash::error('Keterangan Kelahiran not found');

            return redirect(route('keteranganKelahirans.index'));
        }

        return view('keterangan_kelahirans.edit', compact('data','keteranganKelahiran'));
    }

    /**
     * Update the specified KeteranganKelahiran in storage.
     *
     * @param  int              $id
     * @param UpdateKeteranganKelahiranRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateKeteranganKelahiranRequest $request)
    {
        $keteranganKelahiran = $this->keteranganKelahiranRepository->findWithoutFail($id);

        if (empty($keteranganKelahiran)) {
            Flash::error('Keterangan Kelahiran not found');

            return redirect(route('keteranganKelahirans.index'));
        }

        $keteranganKelahiran = $this->keteranganKelahiranRepository->update($request->all(), $id);

        Flash::success('Keterangan Kelahiran updated successfully.');

        return redirect(route('keterangan-kelahiran.index'));
    }

    /**
     * Remove the specified KeteranganKelahiran from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $keteranganKelahiran = $this->keteranganKelahiranRepository->findWithoutFail($id);

        if (empty($keteranganKelahiran)) {
            Flash::error('Keterangan Kelahiran not found');

            return redirect(route('keterangan-kelahiran.index'));
        }

        $this->keteranganKelahiranRepository->delete($id);

        Flash::success('Keterangan Kelahiran deleted successfully.');

        return redirect(route('keterangan-kelahiran.index'));
    }
}