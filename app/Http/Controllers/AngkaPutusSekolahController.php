<?php

namespace App\Http\Controllers;

use App\DataTables\AngkaPutusSekolahDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateAngkaPutusSekolahRequest;
use App\Http\Requests\UpdateAngkaPutusSekolahRequest;
use App\Repositories\AngkaPutusSekolahRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class AngkaPutusSekolahController extends AppBaseController
{
    /** @var  AngkaPutusSekolahRepository */
    private $angkaPutusSekolahRepository;

    public function __construct(AngkaPutusSekolahRepository $angkaPutusSekolahRepo)
    {
        $this->angkaPutusSekolahRepository = $angkaPutusSekolahRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the AngkaPutusSekolah.
     *
     * @param AngkaPutusSekolahDataTable $angkaPutusSekolahDataTable
     * @return Response
     */
    public function index(AngkaPutusSekolahDataTable $angkaPutusSekolahDataTable)
    {
        return $angkaPutusSekolahDataTable->render('angka_putus_sekolahs.index');
    }

    /**
     * Show the form for creating a new AngkaPutusSekolah.
     *
     * @return Response
     */
    public function create()
    {
        return view('angka_putus_sekolahs.create');
    }

    /**
     * Store a newly created AngkaPutusSekolah in storage.
     *
     * @param CreateAngkaPutusSekolahRequest $request
     *
     * @return Response
     */
    public function store(CreateAngkaPutusSekolahRequest $request)
    {
        $input = $request->all();

        $angkaPutusSekolah = $this->angkaPutusSekolahRepository->create($input);

        Flash::success('Angka Putus Sekolah berhasil ditambahkan.');

        return redirect(route('angkaPutusSekolahs.index'));
    }

    /**
     * Display the specified AngkaPutusSekolah.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $angkaPutusSekolah = $this->angkaPutusSekolahRepository->findWithoutFail($id);

        if (empty($angkaPutusSekolah)) {
            Flash::error('Angka Putus Sekolah not found');

            return redirect(route('angkaPutusSekolahs.index'));
        }

        return view('angka_putus_sekolahs.show')->with('angkaPutusSekolah', $angkaPutusSekolah);
    }

    /**
     * Show the form for editing the specified AngkaPutusSekolah.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $angkaPutusSekolah = $this->angkaPutusSekolahRepository->findWithoutFail($id);

        if (empty($angkaPutusSekolah)) {
            Flash::error('Angka Putus Sekolah not found');

            return redirect(route('angkaPutusSekolahs.index'));
        }

        return view('angka_putus_sekolahs.edit')->with('angkaPutusSekolah', $angkaPutusSekolah);
    }

    /**
     * Update the specified AngkaPutusSekolah in storage.
     *
     * @param  int              $id
     * @param UpdateAngkaPutusSekolahRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAngkaPutusSekolahRequest $request)
    {
        $angkaPutusSekolah = $this->angkaPutusSekolahRepository->findWithoutFail($id);

        if (empty($angkaPutusSekolah)) {
            Flash::error('Angka Putus Sekolah not found');

            return redirect(route('angkaPutusSekolahs.index'));
        }

        $angkaPutusSekolah = $this->angkaPutusSekolahRepository->update($request->all(), $id);

        Flash::success('Angka Putus Sekolah berhasil diperbarui.');

        return redirect(route('angkaPutusSekolahs.index'));
    }

    /**
     * Remove the specified AngkaPutusSekolah from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $angkaPutusSekolah = $this->angkaPutusSekolahRepository->findWithoutFail($id);

        if (empty($angkaPutusSekolah)) {
            Flash::error('Angka Putus Sekolah not found');

            return redirect(route('angkaPutusSekolahs.index'));
        }

        $this->angkaPutusSekolahRepository->delete($id);

        Flash::success('Angka Putus Sekolah deleted successfully.');

        return redirect(route('angkaPutusSekolahs.index'));
    }
}
