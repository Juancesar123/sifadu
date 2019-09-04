<?php

namespace App\Http\Controllers;

use App\DataTables\puskesmasDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatepuskesmasRequest;
use App\Http\Requests\UpdatepuskesmasRequest;
use App\Repositories\puskesmasRepository;
use Flash;
// use App\Models\datapenduduk as Datapenduduk;
use App\Http\Controllers\AppBaseController;
use Response;

class PuskesmasController extends AppBaseController
{
    /** @var  puskesmasRepository */
    private $puskesmasRepository;

    public function __construct(puskesmasRepository $puskesmasRepo)
    {
        $this->puskesmasRepository = $puskesmasRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the puskesmas.
     *
     * @param puskesmasDataTable $puskesmasDataTable
     * @return Response
     */
    public function index(puskesmasDataTable $puskesmasDataTable)
    {
        return $puskesmasDataTable->render('puskesmas.index');
    }

    /**
     * Show the form for creating a new puskesmas.
     *
     * @return Response
     */
    public function create()
    {
        // $data = Datapenduduk::all();
        return view('puskesmas.create');
    }

    /**
     * Store a newly created puskesmas in storage.
     *
     * @param CreatepuskesmasRequest $request
     *
     * @return Response
     */
    public function store(CreatepuskesmasRequest $request)
    {
        $input = $request->all();

        $puskesmas = $this->puskesmasRepository->create($input);

        Flash::success('puskesmas berhasil ditambahkan.');

        return redirect(route('puskesmas.index'));
    }

    /**
     * Display the specified puskesmas.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $puskesmas = $this->puskesmasRepository->findWithoutFail($id);

        if (empty($puskesmas)) {
            Flash::error('puskesmas not found');

            return redirect(route('puskesmas.index'));
        }

        return view('puskesmas.show')->with('puskesmas', $puskesmas);
    }

    /**
     * Show the form for editing the specified puskesmas.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $puskesmas = $this->puskesmasRepository->findWithoutFail($id);

        if (empty($puskesmas)) {
            Flash::error('puskesmas not found');

            return redirect(route('puskesmas.index'));
        }
        // $data = Datapenduduk::All();
        return view('puskesmas.edit')->with('puskesmas', $puskesmas);
    }

    /**
     * Update the specified puskesmas in storage.
     *
     * @param  int              $id
     * @param UpdatepuskesmasRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatepuskesmasRequest $request)
    {
        $puskesmas = $this->puskesmasRepository->findWithoutFail($id);

        if (empty($puskesmas)) {
            Flash::error('puskesmas not found');

            return redirect(route('puskesmas.index'));
        }

        $puskesmas = $this->puskesmasRepository->update($request->all(), $id);

        Flash::success('puskesmas berhasil diperbarui.');

        return redirect(route('puskesmas.index'));
    }

    /**
     * Remove the specified puskesmas from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $puskesmas = $this->puskesmasRepository->findWithoutFail($id);

        if (empty($puskesmas)) {
            Flash::error('puskesmas not found');

            return redirect(route('puskesmas.index'));
        }

        $this->puskesmasRepository->delete($id);

        Flash::success('puskesmas deleted successfully.');

        return redirect(route('puskesmas.index'));
    }
}
