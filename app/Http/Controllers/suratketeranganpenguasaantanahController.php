<?php

namespace App\Http\Controllers;

use App\DataTables\suratketeranganpenguasaantanahDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatesuratketeranganpenguasaantanahRequest;
use App\Http\Requests\UpdatesuratketeranganpenguasaantanahRequest;
use App\Repositories\suratketeranganpenguasaantanahRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Models\datapenduduk as Datapenduduk;
class suratketeranganpenguasaantanahController extends AppBaseController
{
    /** @var  suratketeranganpenguasaantanahRepository */
    private $suratketeranganpenguasaantanahRepository;

    public function __construct(suratketeranganpenguasaantanahRepository $suratketeranganpenguasaantanahRepo)
    {
        $this->suratketeranganpenguasaantanahRepository = $suratketeranganpenguasaantanahRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the suratketeranganpenguasaantanah.
     *
     * @param suratketeranganpenguasaantanahDataTable $suratketeranganpenguasaantanahDataTable
     * @return Response
     */
    public function index(suratketeranganpenguasaantanahDataTable $suratketeranganpenguasaantanahDataTable)
    {
        return $suratketeranganpenguasaantanahDataTable->render('suratketeranganpenguasaantanahs.index');
    }

    /**
     * Show the form for creating a new suratketeranganpenguasaantanah.
     *
     * @return Response
     */
    public function create()
    {
        $data = Datapenduduk::all();
        return view('suratketeranganpenguasaantanahs.create',['data' => $data]);
    }

    /**
     * Store a newly created suratketeranganpenguasaantanah in storage.
     *
     * @param CreatesuratketeranganpenguasaantanahRequest $request
     *
     * @return Response
     */
    public function store(CreatesuratketeranganpenguasaantanahRequest $request)
    {
        $input = $request->all();

        $suratketeranganpenguasaantanah = $this->suratketeranganpenguasaantanahRepository->create($input);

        Flash::success('Suratketeranganpenguasaantanah berhasil ditambahkan.');

        return redirect(route('suratketeranganpenguasaantanahs.index'));
    }

    /**
     * Display the specified suratketeranganpenguasaantanah.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $suratketeranganpenguasaantanah = $this->suratketeranganpenguasaantanahRepository->findWithoutFail($id);

        if (empty($suratketeranganpenguasaantanah)) {
            Flash::error('Suratketeranganpenguasaantanah not found');

            return redirect(route('suratketeranganpenguasaantanahs.index'));
        }

        return view('suratketeranganpenguasaantanahs.show')->with('suratketeranganpenguasaantanah', $suratketeranganpenguasaantanah);
    }

    /**
     * Show the form for editing the specified suratketeranganpenguasaantanah.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $suratketeranganpenguasaantanah = $this->suratketeranganpenguasaantanahRepository->findWithoutFail($id);

        if (empty($suratketeranganpenguasaantanah)) {
            Flash::error('Suratketeranganpenguasaantanah not found');

            return redirect(route('suratketeranganpenguasaantanahs.index'));
        }
        $data = Datapenduduk::all();
        return view('suratketeranganpenguasaantanahs.edit',['data' => $data])->with('suratketeranganpenguasaantanah', $suratketeranganpenguasaantanah);
    }

    /**
     * Update the specified suratketeranganpenguasaantanah in storage.
     *
     * @param  int              $id
     * @param UpdatesuratketeranganpenguasaantanahRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatesuratketeranganpenguasaantanahRequest $request)
    {
        $suratketeranganpenguasaantanah = $this->suratketeranganpenguasaantanahRepository->findWithoutFail($id);

        if (empty($suratketeranganpenguasaantanah)) {
            Flash::error('Suratketeranganpenguasaantanah not found');

            return redirect(route('suratketeranganpenguasaantanahs.index'));
        }

        $suratketeranganpenguasaantanah = $this->suratketeranganpenguasaantanahRepository->update($request->all(), $id);

        Flash::success('Suratketeranganpenguasaantanah berhasil diperbarui.');

        return redirect(route('suratketeranganpenguasaantanahs.index'));
    }

    /**
     * Remove the specified suratketeranganpenguasaantanah from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $suratketeranganpenguasaantanah = $this->suratketeranganpenguasaantanahRepository->findWithoutFail($id);

        if (empty($suratketeranganpenguasaantanah)) {
            Flash::error('Suratketeranganpenguasaantanah not found');

            return redirect(route('suratketeranganpenguasaantanahs.index'));
        }

        $this->suratketeranganpenguasaantanahRepository->delete($id);

        Flash::success('Suratketeranganpenguasaantanah deleted successfully.');

        return redirect(route('suratketeranganpenguasaantanahs.index'));
    }
}
