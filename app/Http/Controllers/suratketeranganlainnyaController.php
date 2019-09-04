<?php

namespace App\Http\Controllers;

use App\DataTables\suratketeranganlainnyaDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatesuratketeranganlainnyaRequest;
use App\Http\Requests\UpdatesuratketeranganlainnyaRequest;
use App\Repositories\suratketeranganlainnyaRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

use App\Models\datapenduduk as Datapenduduk;
class suratketeranganlainnyaController extends AppBaseController
{
    /** @var  suratketeranganlainnyaRepository */
    private $suratketeranganlainnyaRepository;

    public function __construct(suratketeranganlainnyaRepository $suratketeranganlainnyaRepo)
    {
        $this->suratketeranganlainnyaRepository = $suratketeranganlainnyaRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the suratketeranganlainnya.
     *
     * @param suratketeranganlainnyaDataTable $suratketeranganlainnyaDataTable
     * @return Response
     */
    public function index(suratketeranganlainnyaDataTable $suratketeranganlainnyaDataTable)
    {
        return $suratketeranganlainnyaDataTable->render('suratketeranganlainnyas.index');
    }

    /**
     * Show the form for creating a new suratketeranganlainnya.
     *
     * @return Response
     */
    public function create()
    {
        $data = Datapenduduk::all();
        return view('suratketeranganlainnyas.create',['data' => $data]);
    }

    /**
     * Store a newly created suratketeranganlainnya in storage.
     *
     * @param CreatesuratketeranganlainnyaRequest $request
     *
     * @return Response
     */
    public function store(CreatesuratketeranganlainnyaRequest $request)
    {
        $input = $request->all();

        $suratketeranganlainnya = $this->suratketeranganlainnyaRepository->create($input);

        Flash::success('Suratketeranganlainnya berhasil ditambahkan.');

        return redirect(route('suratketeranganlainnyas.index'));
    }

    /**
     * Display the specified suratketeranganlainnya.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $suratketeranganlainnya = $this->suratketeranganlainnyaRepository->findWithoutFail($id);

        if (empty($suratketeranganlainnya)) {
            Flash::error('Suratketeranganlainnya not found');

            return redirect(route('suratketeranganlainnyas.index'));
        }

        return view('suratketeranganlainnyas.show')->with('suratketeranganlainnya', $suratketeranganlainnya);
    }

    /**
     * Show the form for editing the specified suratketeranganlainnya.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $suratketeranganlainnya = $this->suratketeranganlainnyaRepository->findWithoutFail($id);

        if (empty($suratketeranganlainnya)) {
            Flash::error('Suratketeranganlainnya not found');

            return redirect(route('suratketeranganlainnyas.index'));
        }
        $data = Datapenduduk::all();
        return view('suratketeranganlainnyas.edit',['data' => $data])->with('suratketeranganlainnya', $suratketeranganlainnya);
    }

    /**
     * Update the specified suratketeranganlainnya in storage.
     *
     * @param  int              $id
     * @param UpdatesuratketeranganlainnyaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatesuratketeranganlainnyaRequest $request)
    {
        $suratketeranganlainnya = $this->suratketeranganlainnyaRepository->findWithoutFail($id);

        if (empty($suratketeranganlainnya)) {
            Flash::error('Suratketeranganlainnya not found');

            return redirect(route('suratketeranganlainnyas.index'));
        }

        $suratketeranganlainnya = $this->suratketeranganlainnyaRepository->update($request->all(), $id);

        Flash::success('Suratketeranganlainnya berhasil diperbarui.');

        return redirect(route('suratketeranganlainnyas.index'));
    }

    /**
     * Remove the specified suratketeranganlainnya from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $suratketeranganlainnya = $this->suratketeranganlainnyaRepository->findWithoutFail($id);

        if (empty($suratketeranganlainnya)) {
            Flash::error('Suratketeranganlainnya not found');

            return redirect(route('suratketeranganlainnyas.index'));
        }

        $this->suratketeranganlainnyaRepository->delete($id);

        Flash::success('Suratketeranganlainnya deleted successfully.');

        return redirect(route('suratketeranganlainnyas.index'));
    }
}
