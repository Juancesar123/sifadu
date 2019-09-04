<?php

namespace App\Http\Controllers;

use App\DataTables\suratketeranganusahaDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatesuratketeranganusahaRequest;
use App\Http\Requests\UpdatesuratketeranganusahaRequest;
use App\Repositories\suratketeranganusahaRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Models\datapenduduk as Datapenduduk;
class suratketeranganusahaController extends AppBaseController
{
    /** @var  suratketeranganusahaRepository */
    private $suratketeranganusahaRepository;

    public function __construct(suratketeranganusahaRepository $suratketeranganusahaRepo)
    {
        $this->suratketeranganusahaRepository = $suratketeranganusahaRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the suratketeranganusaha.
     *
     * @param suratketeranganusahaDataTable $suratketeranganusahaDataTable
     * @return Response
     */
    public function index(suratketeranganusahaDataTable $suratketeranganusahaDataTable)
    {
        return $suratketeranganusahaDataTable->render('suratketeranganusahas.index');
    }

    /**
     * Show the form for creating a new suratketeranganusaha.
     *
     * @return Response
     */
    public function create()
    {
        $data = Datapenduduk::all();
        return view('suratketeranganusahas.create',['data' => $data]);
    }

    /**
     * Store a newly created suratketeranganusaha in storage.
     *
     * @param CreatesuratketeranganusahaRequest $request
     *
     * @return Response
     */
    public function store(CreatesuratketeranganusahaRequest $request)
    {
        $input = $request->all();

        $suratketeranganusaha = $this->suratketeranganusahaRepository->create($input);

        Flash::success('Suratketeranganusaha saved successfully.');

        return redirect(route('suratketeranganusahas.index'));
    }

    /**
     * Display the specified suratketeranganusaha.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $suratketeranganusaha = $this->suratketeranganusahaRepository->findWithoutFail($id);

        if (empty($suratketeranganusaha)) {
            Flash::error('Suratketeranganusaha not found');

            return redirect(route('suratketeranganusahas.index'));
        }

        return view('suratketeranganusahas.show')->with('suratketeranganusaha', $suratketeranganusaha);
    }

    /**
     * Show the form for editing the specified suratketeranganusaha.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $suratketeranganusaha = $this->suratketeranganusahaRepository->findWithoutFail($id);

        if (empty($suratketeranganusaha)) {
            Flash::error('Suratketeranganusaha not found');

            return redirect(route('suratketeranganusahas.index'));
        }
        $data = Datapenduduk::all();
        return view('suratketeranganusahas.edit',['data' => $data])->with('suratketeranganusaha', $suratketeranganusaha);
    }

    /**
     * Update the specified suratketeranganusaha in storage.
     *
     * @param  int              $id
     * @param UpdatesuratketeranganusahaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatesuratketeranganusahaRequest $request)
    {
        $suratketeranganusaha = $this->suratketeranganusahaRepository->findWithoutFail($id);

        if (empty($suratketeranganusaha)) {
            Flash::error('Suratketeranganusaha not found');

            return redirect(route('suratketeranganusahas.index'));
        }

        $suratketeranganusaha = $this->suratketeranganusahaRepository->update($request->all(), $id);

        Flash::success('Suratketeranganusaha updated successfully.');

        return redirect(route('suratketeranganusahas.index'));
    }

    /**
     * Remove the specified suratketeranganusaha from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $suratketeranganusaha = $this->suratketeranganusahaRepository->findWithoutFail($id);

        if (empty($suratketeranganusaha)) {
            Flash::error('Suratketeranganusaha not found');

            return redirect(route('suratketeranganusahas.index'));
        }

        $this->suratketeranganusahaRepository->delete($id);

        Flash::success('Suratketeranganusaha deleted successfully.');

        return redirect(route('suratketeranganusahas.index'));
    }
}
