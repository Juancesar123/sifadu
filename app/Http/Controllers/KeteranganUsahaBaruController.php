<?php

namespace App\Http\Controllers;

use App\DataTables\KeteranganUsahaBaruDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateKeteranganUsahaBaruRequest;
use App\Http\Requests\UpdateKeteranganUsahaBaruRequest;
use App\Repositories\KeteranganUsahaBaruRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class KeteranganUsahaBaruController extends AppBaseController
{
    /** @var  KeteranganUsahaBaruRepository */
    private $keteranganUsahaBaruRepository;

    public function __construct(KeteranganUsahaBaruRepository $keteranganUsahaBaruRepo)
    {
        $this->keteranganUsahaBaruRepository = $keteranganUsahaBaruRepo;
    }

    /**
     * Display a listing of the KeteranganUsahaBaru.
     *
     * @param KeteranganUsahaBaruDataTable $keteranganUsahaBaruDataTable
     * @return Response
     */
    public function index(KeteranganUsahaBaruDataTable $keteranganUsahaBaruDataTable)
    {
        return $keteranganUsahaBaruDataTable->render('keterangan_usaha_barus.index');
    }

    /**
     * Show the form for creating a new KeteranganUsahaBaru.
     *
     * @return Response
     */
    public function create()
    {
        return view('keterangan_usaha_barus.create');
    }

    /**
     * Store a newly created KeteranganUsahaBaru in storage.
     *
     * @param CreateKeteranganUsahaBaruRequest $request
     *
     * @return Response
     */
    public function store(CreateKeteranganUsahaBaruRequest $request)
    {
        $input = $request->all();

        $keteranganUsahaBaru = $this->keteranganUsahaBaruRepository->create($input);

        Flash::success('Keterangan Usaha Baru saved successfully.');

        return redirect(route('keteranganUsahaBarus.index'));
    }

    /**
     * Display the specified KeteranganUsahaBaru.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $keteranganUsahaBaru = $this->keteranganUsahaBaruRepository->findWithoutFail($id);

        if (empty($keteranganUsahaBaru)) {
            Flash::error('Keterangan Usaha Baru not found');

            return redirect(route('keteranganUsahaBarus.index'));
        }

        return view('keterangan_usaha_barus.show')->with('keteranganUsahaBaru', $keteranganUsahaBaru);
    }

    /**
     * Show the form for editing the specified KeteranganUsahaBaru.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $keteranganUsahaBaru = $this->keteranganUsahaBaruRepository->findWithoutFail($id);

        if (empty($keteranganUsahaBaru)) {
            Flash::error('Keterangan Usaha Baru not found');

            return redirect(route('keteranganUsahaBarus.index'));
        }

        return view('keterangan_usaha_barus.edit')->with('keteranganUsahaBaru', $keteranganUsahaBaru);
    }

    /**
     * Update the specified KeteranganUsahaBaru in storage.
     *
     * @param  int              $id
     * @param UpdateKeteranganUsahaBaruRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateKeteranganUsahaBaruRequest $request)
    {
        $keteranganUsahaBaru = $this->keteranganUsahaBaruRepository->findWithoutFail($id);

        if (empty($keteranganUsahaBaru)) {
            Flash::error('Keterangan Usaha Baru not found');

            return redirect(route('keteranganUsahaBarus.index'));
        }

        $keteranganUsahaBaru = $this->keteranganUsahaBaruRepository->update($request->all(), $id);

        Flash::success('Keterangan Usaha Baru updated successfully.');

        return redirect(route('keteranganUsahaBarus.index'));
    }

    /**
     * Remove the specified KeteranganUsahaBaru from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $keteranganUsahaBaru = $this->keteranganUsahaBaruRepository->findWithoutFail($id);

        if (empty($keteranganUsahaBaru)) {
            Flash::error('Keterangan Usaha Baru not found');

            return redirect(route('keteranganUsahaBarus.index'));
        }

        $this->keteranganUsahaBaruRepository->delete($id);

        Flash::success('Keterangan Usaha Baru deleted successfully.');

        return redirect(route('keteranganUsahaBarus.index'));
    }
}
