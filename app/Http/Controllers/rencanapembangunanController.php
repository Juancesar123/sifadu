<?php

namespace App\Http\Controllers;

use App\DataTables\rencanapembangunanDataTable;
use App\Http\Requests;
use App\Http\Requests\CreaterencanapembangunanRequest;
use App\Http\Requests\UpdaterencanapembangunanRequest;
use App\Repositories\rencanapembangunanRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class rencanapembangunanController extends AppBaseController
{
    /** @var  rencanapembangunanRepository */
    private $rencanapembangunanRepository;

    public function __construct(rencanapembangunanRepository $rencanapembangunanRepo)
    {
        $this->rencanapembangunanRepository = $rencanapembangunanRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the rencanapembangunan.
     *
     * @param rencanapembangunanDataTable $rencanapembangunanDataTable
     * @return Response
     */
    public function index(rencanapembangunanDataTable $rencanapembangunanDataTable)
    {
        return $rencanapembangunanDataTable->render('rencanapembangunans.index');
    }

    /**
     * Show the form for creating a new rencanapembangunan.
     *
     * @return Response
     */
    public function create()
    {
        return view('rencanapembangunans.create');
    }

    /**
     * Store a newly created rencanapembangunan in storage.
     *
     * @param CreaterencanapembangunanRequest $request
     *
     * @return Response
     */
    public function store(CreaterencanapembangunanRequest $request)
    {
        $input = [
            'nama_proyek' => $request->nama_proyek,
            'lokasi' => $request->lokasi,
            'dana_dari_pemerintah' => preg_replace('~[\\\\/:*?"<>|,.]~', '',$request->dana_dari_pemerintah),
            'dana_dari_provinsi' => preg_replace('~[\\\\/:*?"<>|,.]~', '',$request->dana_dari_provinsi),
            'dana_dari_kabupaten' => preg_replace('~[\\\\/:*?"<>|,.]~', '',$request->dana_dari_kabupaten),
            'dana_dari_swadaya' => preg_replace('~[\\\\/:*?"<>|,.]~', '',$request->dana_dari_kabupaten),
            'tahun' => $request->tahun,
            'jumlah_dana' => preg_replace('~[\\\\/:*?"<>|,.]~', '', $request->jumlah_dana),
            'pelaksana' => $request->pelaksana,
            'manfaat' => $request->manfaat,
            'keterangan' => $request->keterangan
        ];
        $rencanapembangunan = $this->rencanapembangunanRepository->create($input);

        Flash::success('Rencanapembangunan berhasil ditambahkan.');

        return redirect(route('rencanapembangunans.index'));
    }

    /**
     * Display the specified rencanapembangunan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $rencanapembangunan = $this->rencanapembangunanRepository->findWithoutFail($id);

        if (empty($rencanapembangunan)) {
            Flash::error('Rencanapembangunan not found');

            return redirect(route('rencanapembangunans.index'));
        }

        return view('rencanapembangunans.show')->with('rencanapembangunan', $rencanapembangunan);
    }

    /**
     * Show the form for editing the specified rencanapembangunan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $rencanapembangunan = $this->rencanapembangunanRepository->findWithoutFail($id);

        if (empty($rencanapembangunan)) {
            Flash::error('Rencanapembangunan not found');

            return redirect(route('rencanapembangunans.index'));
        }

        return view('rencanapembangunans.edit')->with('rencanapembangunan', $rencanapembangunan);
    }

    /**
     * Update the specified rencanapembangunan in storage.
     *
     * @param  int              $id
     * @param UpdaterencanapembangunanRequest $request
     *
     * @return Response
     */
    public function update($id, UpdaterencanapembangunanRequest $request)
    {
        $rencanapembangunan = $this->rencanapembangunanRepository->findWithoutFail($id);

        if (empty($rencanapembangunan)) {
            Flash::error('Rencanapembangunan not found');

            return redirect(route('rencanapembangunans.index'));
        }
        $input = [
            'nama_proyek' => $request->nama_proyek,
            'lokasi' => $request->lokasi,
            'dana_dari_pemerintah' => preg_replace('~[\\\\/:*?"<>|,.]~', '',$request->dana_dari_pemerintah),
            'dana_dari_provinsi' => preg_replace('~[\\\\/:*?"<>|,.]~', '',$request->dana_dari_provinsi),
            'dana_dari_kabupaten' => preg_replace('~[\\\\/:*?"<>|,.]~', '',$request->dana_dari_kabupaten),
            'dana_dari_swadaya' => preg_replace('~[\\\\/:*?"<>|,.]~', '',$request->dana_dari_kabupaten),
            'tahun' => $request->tahun,
            'jumlah_dana' => preg_replace('~[\\\\/:*?"<>|,.]~', '', $request->jumlah_dana),
            'pelaksana' => $request->pelaksana,
            'manfaat' => $request->manfaat,
            'keterangan' => $request->keterangan
        ];
        $rencanapembangunan = $this->rencanapembangunanRepository->update($input, $id);

        Flash::success('Rencanapembangunan berhasil diperbarui.');

        return redirect(route('rencanapembangunans.index'));
    }

    /**
     * Remove the specified rencanapembangunan from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $rencanapembangunan = $this->rencanapembangunanRepository->findWithoutFail($id);

        if (empty($rencanapembangunan)) {
            Flash::error('Rencanapembangunan not found');

            return redirect(route('rencanapembangunans.index'));
        }

        $this->rencanapembangunanRepository->delete($id);

        Flash::success('Rencanapembangunan deleted successfully.');

        return redirect(route('rencanapembangunans.index'));
    }
}
