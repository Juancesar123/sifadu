<?php

namespace App\Http\Controllers;

use App\DataTables\DaftarPemilihTetapDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateDaftarPemilihTetapRequest;
use App\Http\Requests\UpdateDaftarPemilihTetapRequest;
use App\Repositories\DaftarPemilihTetapRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class DaftarPemilihTetapController extends AppBaseController
{
    /** @var  DaftarPemilihTetapRepository */
    private $daftarPemilihTetapRepository;

    public function __construct(DaftarPemilihTetapRepository $daftarPemilihTetapRepo)
    {
        $this->daftarPemilihTetapRepository = $daftarPemilihTetapRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the DaftarPemilihTetap.
     *
     * @param DaftarPemilihTetapDataTable $daftarPemilihTetapDataTable
     * @return Response
     */
    public function index(DaftarPemilihTetapDataTable $daftarPemilihTetapDataTable)
    {
        return $daftarPemilihTetapDataTable->render('daftar_pemilih_tetaps.index');
    }

    /**
     * Show the form for creating a new DaftarPemilihTetap.
     *
     * @return Response
     */
    public function create()
    {
        return view('daftar_pemilih_tetaps.create');
    }

    /**
     * Store a newly created DaftarPemilihTetap in storage.
     *
     * @param CreateDaftarPemilihTetapRequest $request
     *
     * @return Response
     */
    public function store(CreateDaftarPemilihTetapRequest $request)
    {
        $input = $request->all();

        $daftarPemilihTetap = $this->daftarPemilihTetapRepository->create($input);

        Flash::success('Daftar Pemilih Tetap berhasil ditambahkan.');

        return redirect(route('daftarPemilihTetaps.index'));
    }

    /**
     * Display the specified DaftarPemilihTetap.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $daftarPemilihTetap = $this->daftarPemilihTetapRepository->findWithoutFail($id);

        if (empty($daftarPemilihTetap)) {
            Flash::error('Daftar Pemilih Tetap not found');

            return redirect(route('daftarPemilihTetaps.index'));
        }

        return view('daftar_pemilih_tetaps.show')->with('daftarPemilihTetap', $daftarPemilihTetap);
    }

    /**
     * Show the form for editing the specified DaftarPemilihTetap.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $daftarPemilihTetap = $this->daftarPemilihTetapRepository->findWithoutFail($id);

        if (empty($daftarPemilihTetap)) {
            Flash::error('Daftar Pemilih Tetap not found');

            return redirect(route('daftarPemilihTetaps.index'));
        }

        return view('daftar_pemilih_tetaps.edit')->with('daftarPemilihTetap', $daftarPemilihTetap);
    }

    /**
     * Update the specified DaftarPemilihTetap in storage.
     *
     * @param  int              $id
     * @param UpdateDaftarPemilihTetapRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDaftarPemilihTetapRequest $request)
    {
        $daftarPemilihTetap = $this->daftarPemilihTetapRepository->findWithoutFail($id);

        if (empty($daftarPemilihTetap)) {
            Flash::error('Daftar Pemilih Tetap not found');

            return redirect(route('daftarPemilihTetaps.index'));
        }

        $daftarPemilihTetap = $this->daftarPemilihTetapRepository->update($request->all(), $id);

        Flash::success('Daftar Pemilih Tetap berhasil diperbarui.');

        return redirect(route('daftarPemilihTetaps.index'));
    }

    /**
     * Remove the specified DaftarPemilihTetap from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $daftarPemilihTetap = $this->daftarPemilihTetapRepository->findWithoutFail($id);

        if (empty($daftarPemilihTetap)) {
            Flash::error('Daftar Pemilih Tetap not found');

            return redirect(route('daftarPemilihTetaps.index'));
        }

        $this->daftarPemilihTetapRepository->delete($id);

        Flash::success('Daftar Pemilih Tetap deleted successfully.');

        return redirect(route('daftarPemilihTetaps.index'));
    }
}
