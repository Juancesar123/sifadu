<?php

namespace App\Http\Controllers;

use App\DataTables\kegiatanbpdDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatekegiatanbpdRequest;
use App\Http\Requests\UpdatekegiatanbpdRequest;
use App\Repositories\kegiatanbpdRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class kegiatanbpdController extends AppBaseController
{
    /** @var  kegiatanbpdRepository */
    private $kegiatanbpdRepository;

    public function __construct(kegiatanbpdRepository $kegiatanbpdRepo)
    {
        $this->kegiatanbpdRepository = $kegiatanbpdRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the kegiatanbpd.
     *
     * @param kegiatanbpdDataTable $kegiatanbpdDataTable
     * @return Response
     */
    public function index(kegiatanbpdDataTable $kegiatanbpdDataTable)
    {
        return $kegiatanbpdDataTable->render('kegiatanbpds.index');
    }

    /**
     * Show the form for creating a new kegiatanbpd.
     *
     * @return Response
     */
    public function create()
    {
        return view('kegiatanbpds.create');
    }

    /**
     * Store a newly created kegiatanbpd in storage.
     *
     * @param CreatekegiatanbpdRequest $request
     *
     * @return Response
     */
    public function store(CreatekegiatanbpdRequest $request)
    {
        $input = $request->all();

        $kegiatanbpd = $this->kegiatanbpdRepository->create($input);

        Flash::success('Kegiatanbpd berhasil ditambahkan.');

        return redirect(route('kegiatanbpds.index'));
    }

    /**
     * Display the specified kegiatanbpd.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $kegiatanbpd = $this->kegiatanbpdRepository->findWithoutFail($id);

        if (empty($kegiatanbpd)) {
            Flash::error('Kegiatanbpd not found');

            return redirect(route('kegiatanbpds.index'));
        }

        return view('kegiatanbpds.show')->with('kegiatanbpd', $kegiatanbpd);
    }

    /**
     * Show the form for editing the specified kegiatanbpd.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $kegiatanbpd = $this->kegiatanbpdRepository->findWithoutFail($id);

        if (empty($kegiatanbpd)) {
            Flash::error('Kegiatanbpd not found');

            return redirect(route('kegiatanbpds.index'));
        }

        return view('kegiatanbpds.edit')->with('kegiatanbpd', $kegiatanbpd);
    }

    /**
     * Update the specified kegiatanbpd in storage.
     *
     * @param  int              $id
     * @param UpdatekegiatanbpdRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatekegiatanbpdRequest $request)
    {
        $kegiatanbpd = $this->kegiatanbpdRepository->findWithoutFail($id);

        if (empty($kegiatanbpd)) {
            Flash::error('Kegiatanbpd not found');

            return redirect(route('kegiatanbpds.index'));
        }

        $kegiatanbpd = $this->kegiatanbpdRepository->update($request->all(), $id);

        Flash::success('Kegiatanbpd berhasil diperbarui.');

        return redirect(route('kegiatanbpds.index'));
    }

    /**
     * Remove the specified kegiatanbpd from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $kegiatanbpd = $this->kegiatanbpdRepository->findWithoutFail($id);

        if (empty($kegiatanbpd)) {
            Flash::error('Kegiatanbpd not found');

            return redirect(route('kegiatanbpds.index'));
        }

        $this->kegiatanbpdRepository->delete($id);

        Flash::success('Kegiatanbpd deleted successfully.');

        return redirect(route('kegiatanbpds.index'));
    }
}
