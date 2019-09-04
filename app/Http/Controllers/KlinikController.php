<?php

namespace App\Http\Controllers;

use App\DataTables\klinikDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateklinikRequest;
use App\Http\Requests\UpdateklinikRequest;
use App\Repositories\klinikRepository;
use Flash;
// use App\Models\datapenduduk as Datapenduduk;
use App\Http\Controllers\AppBaseController;
use Response;

class KlinikController extends AppBaseController
{
    /** @var  klinikRepository */
    private $klinikRepository;

    public function __construct(klinikRepository $klinikRepo)
    {
        $this->klinikRepository = $klinikRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the klinik.
     *
     * @param klinikDataTable $klinikDataTable
     * @return Response
     */
    public function index(klinikDataTable $klinikDataTable)
    {
        return $klinikDataTable->render('klinik.index');
    }

    /**
     * Show the form for creating a new klinik.
     *
     * @return Response
     */
    public function create()
    {
        // $data = Datapenduduk::all();
        return view('klinik.create');
    }

    /**
     * Store a newly created klinik in storage.
     *
     * @param CreateklinikRequest $request
     *
     * @return Response
     */
    public function store(CreateklinikRequest $request)
    {
        $input = $request->all();

        $klinik = $this->klinikRepository->create($input);

        Flash::success('klinik berhasil ditambahkan.');

        return redirect(route('klinik.index'));
    }

    /**
     * Display the specified klinik.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $klinik = $this->klinikRepository->findWithoutFail($id);

        if (empty($klinik)) {
            Flash::error('klinik not found');

            return redirect(route('klinik.index'));
        }

        return view('klinik.show')->with('klinik', $klinik);
    }

    /**
     * Show the form for editing the specified klinik.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $klinik = $this->klinikRepository->findWithoutFail($id);

        if (empty($klinik)) {
            Flash::error('klinik not found');

            return redirect(route('klinik.index'));
        }
        // $data = Datapenduduk::All();
        return view('klinik.edit')->with('klinik', $klinik);
    }

    /**
     * Update the specified klinik in storage.
     *
     * @param  int              $id
     * @param UpdateklinikRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateklinikRequest $request)
    {
        $klinik = $this->klinikRepository->findWithoutFail($id);

        if (empty($klinik)) {
            Flash::error('klinik not found');

            return redirect(route('klinik.index'));
        }

        $klinik = $this->klinikRepository->update($request->all(), $id);

        Flash::success('klinik berhasil diperbarui.');

        return redirect(route('klinik.index'));
    }

    /**
     * Remove the specified klinik from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $klinik = $this->klinikRepository->findWithoutFail($id);

        if (empty($klinik)) {
            Flash::error('klinik not found');

            return redirect(route('klinik.index'));
        }

        $this->klinikRepository->delete($id);

        Flash::success('klinik deleted successfully.');

        return redirect(route('klinik.index'));
    }
}
