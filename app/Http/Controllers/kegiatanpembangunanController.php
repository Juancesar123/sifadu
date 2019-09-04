<?php

namespace App\Http\Controllers;

use App\DataTables\kegiatanpembangunanDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatekegiatanpembangunanRequest;
use App\Http\Requests\UpdatekegiatanpembangunanRequest;
use App\Repositories\kegiatanpembangunanRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class kegiatanpembangunanController extends AppBaseController
{
    /** @var  kegiatanpembangunanRepository */
    private $kegiatanpembangunanRepository;

    public function __construct(kegiatanpembangunanRepository $kegiatanpembangunanRepo)
    {
        $this->kegiatanpembangunanRepository = $kegiatanpembangunanRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the kegiatanpembangunan.
     *
     * @param kegiatanpembangunanDataTable $kegiatanpembangunanDataTable
     * @return Response
     */
    public function index(kegiatanpembangunanDataTable $kegiatanpembangunanDataTable)
    {
        return $kegiatanpembangunanDataTable->render('kegiatanpembangunans.index');
    }

    /**
     * Show the form for creating a new kegiatanpembangunan.
     *
     * @return Response
     */
    public function create()
    {
        return view('kegiatanpembangunans.create');
    }

    /**
     * Store a newly created kegiatanpembangunan in storage.
     *
     * @param CreatekegiatanpembangunanRequest $request
     *
     * @return Response
     */
    public function store(CreatekegiatanpembangunanRequest $request)
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
            'keterangan' => $request->keterangan,
            'volume' => $request->volume,
            'waktu' => $request->waktu,
            'sifat_proyek' => $request->sifat_proyek

        ];

        $kegiatanpembangunan = $this->kegiatanpembangunanRepository->create($input);

        Flash::success('Kegiatanpembangunan berhasil ditambahkan.');

        return redirect(route('kegiatanpembangunans.index'));
    }

    /**
     * Display the specified kegiatanpembangunan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $kegiatanpembangunan = $this->kegiatanpembangunanRepository->findWithoutFail($id);

        if (empty($kegiatanpembangunan)) {
            Flash::error('Kegiatanpembangunan not found');

            return redirect(route('kegiatanpembangunans.index'));
        }

        return view('kegiatanpembangunans.show')->with('kegiatanpembangunan', $kegiatanpembangunan);
    }

    /**
     * Show the form for editing the specified kegiatanpembangunan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $kegiatanpembangunan = $this->kegiatanpembangunanRepository->findWithoutFail($id);

        if (empty($kegiatanpembangunan)) {
            Flash::error('Kegiatanpembangunan not found');

            return redirect(route('kegiatanpembangunans.index'));
        }

        return view('kegiatanpembangunans.edit')->with('kegiatanpembangunan', $kegiatanpembangunan);
    }

    /**
     * Update the specified kegiatanpembangunan in storage.
     *
     * @param  int              $id
     * @param UpdatekegiatanpembangunanRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatekegiatanpembangunanRequest $request)
    {
        $kegiatanpembangunan = $this->kegiatanpembangunanRepository->findWithoutFail($id);

        if (empty($kegiatanpembangunan)) {
            Flash::error('Kegiatanpembangunan not found');

            return redirect(route('kegiatanpembangunans.index'));
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
            'keterangan' => $request->keterangan,
            'volume' => $request->volume,
            'waktu' => $request->waktu,
            'sifat_proyek' => $request->sifat_proyek

        ];

        $kegiatanpembangunan = $this->kegiatanpembangunanRepository->update($input, $id);

        Flash::success('Kegiatanpembangunan berhasil diperbarui.');

        return redirect(route('kegiatanpembangunans.index'));
    }

    /**
     * Remove the specified kegiatanpembangunan from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $kegiatanpembangunan = $this->kegiatanpembangunanRepository->findWithoutFail($id);

        if (empty($kegiatanpembangunan)) {
            Flash::error('Kegiatanpembangunan not found');

            return redirect(route('kegiatanpembangunans.index'));
        }

        $this->kegiatanpembangunanRepository->delete($id);

        Flash::success('Kegiatanpembangunan deleted successfully.');

        return redirect(route('kegiatanpembangunans.index'));
    }
}
