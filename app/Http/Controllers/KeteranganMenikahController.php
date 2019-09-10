<?php

namespace App\Http\Controllers;

use App\DataTables\KeteranganMenikahDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateKeteranganMenikahRequest;
use App\Http\Requests\UpdateKeteranganMenikahRequest;
use App\Repositories\KeteranganMenikahRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class KeteranganMenikahController extends AppBaseController
{
    /** @var  KeteranganMenikahRepository */
    private $keteranganMenikahRepository;

    public function __construct(KeteranganMenikahRepository $keteranganMenikahRepo)
    {
        $this->keteranganMenikahRepository = $keteranganMenikahRepo;
    }

    /**
     * Display a listing of the KeteranganMenikah.
     *
     * @param KeteranganMenikahDataTable $keteranganMenikahDataTable
     * @return Response
     */
    public function index(KeteranganMenikahDataTable $keteranganMenikahDataTable)
    {
        return $keteranganMenikahDataTable->render('keterangan_menikahs.index');
    }

    /**
     * Show the form for creating a new KeteranganMenikah.
     *
     * @return Response
     */
    public function create()
    {
        return view('keterangan_menikahs.create');
    }

    /**
     * Store a newly created KeteranganMenikah in storage.
     *
     * @param CreateKeteranganMenikahRequest $request
     *
     * @return Response
     */
    public function store(CreateKeteranganMenikahRequest $request)
    {
        $input = $request->all();

        $keteranganMenikah = $this->keteranganMenikahRepository->create($input);

        Flash::success('Keterangan Menikah saved successfully.');

        return redirect(route('keteranganMenikahs.index'));
    }

    /**
     * Display the specified KeteranganMenikah.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $keteranganMenikah = $this->keteranganMenikahRepository->findWithoutFail($id);

        if (empty($keteranganMenikah)) {
            Flash::error('Keterangan Menikah not found');

            return redirect(route('keteranganMenikahs.index'));
        }

        return view('keterangan_menikahs.show')->with('keteranganMenikah', $keteranganMenikah);
    }

    /**
     * Show the form for editing the specified KeteranganMenikah.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $keteranganMenikah = $this->keteranganMenikahRepository->findWithoutFail($id);

        if (empty($keteranganMenikah)) {
            Flash::error('Keterangan Menikah not found');

            return redirect(route('keteranganMenikahs.index'));
        }

        return view('keterangan_menikahs.edit')->with('keteranganMenikah', $keteranganMenikah);
    }

    /**
     * Update the specified KeteranganMenikah in storage.
     *
     * @param  int              $id
     * @param UpdateKeteranganMenikahRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateKeteranganMenikahRequest $request)
    {
        $keteranganMenikah = $this->keteranganMenikahRepository->findWithoutFail($id);

        if (empty($keteranganMenikah)) {
            Flash::error('Keterangan Menikah not found');

            return redirect(route('keteranganMenikahs.index'));
        }

        $keteranganMenikah = $this->keteranganMenikahRepository->update($request->all(), $id);

        Flash::success('Keterangan Menikah updated successfully.');

        return redirect(route('keteranganMenikahs.index'));
    }

    /**
     * Remove the specified KeteranganMenikah from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $keteranganMenikah = $this->keteranganMenikahRepository->findWithoutFail($id);

        if (empty($keteranganMenikah)) {
            Flash::error('Keterangan Menikah not found');

            return redirect(route('keteranganMenikahs.index'));
        }

        $this->keteranganMenikahRepository->delete($id);

        Flash::success('Keterangan Menikah deleted successfully.');

        return redirect(route('keteranganMenikahs.index'));
    }
}
