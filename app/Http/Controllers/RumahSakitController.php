<?php

namespace App\Http\Controllers;

use App\DataTables\rumahsakitDataTable;
use App\Http\Requests;
use App\Http\Requests\CreaterumahsakitRequest;
use App\Http\Requests\UpdaterumahsakitRequest;
use App\Repositories\rumahsakitRepository;
use Flash;
// use App\Models\datapenduduk as Datapenduduk;
use App\Http\Controllers\AppBaseController;
use Response;

class RumahSakitController extends AppBaseController
{
    /** @var  rumahsakitRepository */
    private $rumahsakitRepository;

    public function __construct(rumahsakitRepository $rumahsakitRepo)
    {
        $this->rumahsakitRepository = $rumahsakitRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the rumahsakit.
     *
     * @param rumahsakitDataTable $rumahsakitDataTable
     * @return Response
     */
    public function index(rumahsakitDataTable $rumahsakitDataTable)
    {
        return $rumahsakitDataTable->render('rumahsakit.index');
    }

    /**
     * Show the form for creating a new rumahsakit.
     *
     * @return Response
     */
    public function create()
    {
        // $data = Datapenduduk::all();
        return view('rumahsakit.create');
    }

    /**
     * Store a newly created rumahsakit in storage.
     *
     * @param CreaterumahsakitRequest $request
     *
     * @return Response
     */
    public function store(CreaterumahsakitRequest $request)
    {
        $input = $request->all();

        $rumahsakit = $this->rumahsakitRepository->create($input);

        Flash::success('Rumah Sakit berhasil ditambahkan.');

        return redirect(route('rumahsakit.index'));
    }

    /**
     * Display the specified rumahsakit.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $rumahsakit = $this->rumahsakitRepository->findWithoutFail($id);

        if (empty($rumahsakit)) {
            Flash::error('Rumah Sakit not found');

            return redirect(route('rumahsakit.index'));
        }

        return view('rumahsakit.show')->with('rumahsakit', $rumahsakit);
    }

    /**
     * Show the form for editing the specified rumahsakit.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $rumahsakit = $this->rumahsakitRepository->findWithoutFail($id);

        if (empty($rumahsakit)) {
            Flash::error('Rumah Sakit not found');

            return redirect(route('rumahsakit.index'));
        }
        // $data = Datapenduduk::All();
        return view('rumahsakit.edit')->with('rumahsakit', $rumahsakit);
    }

    /**
     * Update the specified rumahsakit in storage.
     *
     * @param  int              $id
     * @param UpdaterumahsakitRequest $request
     *
     * @return Response
     */
    public function update($id, UpdaterumahsakitRequest $request)
    {
        $rumahsakit = $this->rumahsakitRepository->findWithoutFail($id);

        if (empty($rumahsakit)) {
            Flash::error('Rumah Sakit not found');

            return redirect(route('rumahsakit.index'));
        }

        $rumahsakit = $this->rumahsakitRepository->update($request->all(), $id);

        Flash::success('Rumah Sakit berhasil diperbarui.');

        return redirect(route('rumahsakit.index'));
    }

    /**
     * Remove the specified rumahsakit from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $rumahsakit = $this->rumahsakitRepository->findWithoutFail($id);

        if (empty($rumahsakit)) {
            Flash::error('Rumah Sakit not found');

            return redirect(route('rumahsakit.index'));
        }

        $this->rumahsakitRepository->delete($id);

        Flash::success('Rumah Sakit deleted successfully.');

        return redirect(route('rumahsakit.index'));
    }
}
