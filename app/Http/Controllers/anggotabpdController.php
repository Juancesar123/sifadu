<?php

namespace App\Http\Controllers;

use App\DataTables\anggotabpdDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateanggotabpdRequest;
use App\Http\Requests\UpdateanggotabpdRequest;
use App\Repositories\anggotabpdRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class anggotabpdController extends AppBaseController
{
    /** @var  anggotabpdRepository */
    private $anggotabpdRepository;

    public function __construct(anggotabpdRepository $anggotabpdRepo)
    {
        $this->anggotabpdRepository = $anggotabpdRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the anggotabpd.
     *
     * @param anggotabpdDataTable $anggotabpdDataTable
     * @return Response
     */
    public function index(anggotabpdDataTable $anggotabpdDataTable)
    {
        return $anggotabpdDataTable->render('anggotabpds.index');
    }

    /**
     * Show the form for creating a new anggotabpd.
     *
     * @return Response
     */
    public function create()
    {
        return view('anggotabpds.create');
    }

    /**
     * Store a newly created anggotabpd in storage.
     *
     * @param CreateanggotabpdRequest $request
     *
     * @return Response
     */
    public function store(CreateanggotabpdRequest $request)
    {
        $input = $request->all();

        $anggotabpd = $this->anggotabpdRepository->create($input);

        Flash::success('Anggotabpd berhasil ditambahkan.');

        return redirect(route('anggotabpds.index'));
    }

    /**
     * Display the specified anggotabpd.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $anggotabpd = $this->anggotabpdRepository->findWithoutFail($id);

        if (empty($anggotabpd)) {
            Flash::error('Anggotabpd not found');

            return redirect(route('anggotabpds.index'));
        }

        return view('anggotabpds.show')->with('anggotabpd', $anggotabpd);
    }

    /**
     * Show the form for editing the specified anggotabpd.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $anggotabpd = $this->anggotabpdRepository->findWithoutFail($id);

        if (empty($anggotabpd)) {
            Flash::error('Anggotabpd not found');

            return redirect(route('anggotabpds.index'));
        }

        return view('anggotabpds.edit')->with('anggotabpd', $anggotabpd);
    }

    /**
     * Update the specified anggotabpd in storage.
     *
     * @param  int              $id
     * @param UpdateanggotabpdRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateanggotabpdRequest $request)
    {
        $anggotabpd = $this->anggotabpdRepository->findWithoutFail($id);

        if (empty($anggotabpd)) {
            Flash::error('Anggotabpd not found');

            return redirect(route('anggotabpds.index'));
        }

        $anggotabpd = $this->anggotabpdRepository->update($request->all(), $id);

        Flash::success('Anggotabpd berhasil diperbarui.');

        return redirect(route('anggotabpds.index'));
    }

    /**
     * Remove the specified anggotabpd from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $anggotabpd = $this->anggotabpdRepository->findWithoutFail($id);

        if (empty($anggotabpd)) {
            Flash::error('Anggotabpd not found');

            return redirect(route('anggotabpds.index'));
        }

        $this->anggotabpdRepository->delete($id);

        Flash::success('Anggotabpd deleted successfully.');

        return redirect(route('anggotabpds.index'));
    }
}
