<?php

namespace App\Http\Controllers;

use App\DataTables\suratketerangandomisiliDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatesuratketerangandomisiliRequest;
use App\Http\Requests\UpdatesuratketerangandomisiliRequest;
use App\Repositories\suratketerangandomisiliRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Models\datapenduduk as Datapenduduk;
class suratketerangandomisiliController extends AppBaseController
{
    /** @var  suratketerangandomisiliRepository */
    private $suratketerangandomisiliRepository;

    public function __construct(suratketerangandomisiliRepository $suratketerangandomisiliRepo)
    {
        $this->suratketerangandomisiliRepository = $suratketerangandomisiliRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the suratketerangandomisili.
     *
     * @param suratketerangandomisiliDataTable $suratketerangandomisiliDataTable
     * @return Response
     */
    public function index(suratketerangandomisiliDataTable $suratketerangandomisiliDataTable)
    {
        return $suratketerangandomisiliDataTable->render('suratketerangandomisilis.index');
    }

    /**
     * Show the form for creating a new suratketerangandomisili.
     *
     * @return Response
     */
    public function create()
    {
        $data = Datapenduduk::all();
        return view('suratketerangandomisilis.create',['data' => $data]);
    }

    /**
     * Store a newly created suratketerangandomisili in storage.
     *
     * @param CreatesuratketerangandomisiliRequest $request
     *
     * @return Response
     */
    public function store(CreatesuratketerangandomisiliRequest $request)
    {
        $input = $request->all();

        $suratketerangandomisili = $this->suratketerangandomisiliRepository->create($input);

        Flash::success('Suratketerangandomisili saved successfully.');

        return redirect(route('suratketerangandomisilis.index'));
    }

    /**
     * Display the specified suratketerangandomisili.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $suratketerangandomisili = $this->suratketerangandomisiliRepository->findWithoutFail($id);

        if (empty($suratketerangandomisili)) {
            Flash::error('Suratketerangandomisili not found');

            return redirect(route('suratketerangandomisilis.index'));
        }

        return view('suratketerangandomisilis.show')->with('suratketerangandomisili', $suratketerangandomisili);
    }

    /**
     * Show the form for editing the specified suratketerangandomisili.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $suratketerangandomisili = $this->suratketerangandomisiliRepository->findWithoutFail($id);

        if (empty($suratketerangandomisili)) {
            Flash::error('Suratketerangandomisili not found');

            return redirect(route('suratketerangandomisilis.index'));
        }
        $data = Datapenduduk::all();
        return view('suratketerangandomisilis.edit',['data' => $data])->with('suratketerangandomisili', $suratketerangandomisili);
    }

    /**
     * Update the specified suratketerangandomisili in storage.
     *
     * @param  int              $id
     * @param UpdatesuratketerangandomisiliRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatesuratketerangandomisiliRequest $request)
    {
        $suratketerangandomisili = $this->suratketerangandomisiliRepository->findWithoutFail($id);

        if (empty($suratketerangandomisili)) {
            Flash::error('Suratketerangandomisili not found');

            return redirect(route('suratketerangandomisilis.index'));
        }

        $suratketerangandomisili = $this->suratketerangandomisiliRepository->update($request->all(), $id);

        Flash::success('Suratketerangandomisili updated successfully.');

        return redirect(route('suratketerangandomisilis.index'));
    }

    /**
     * Remove the specified suratketerangandomisili from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $suratketerangandomisili = $this->suratketerangandomisiliRepository->findWithoutFail($id);

        if (empty($suratketerangandomisili)) {
            Flash::error('Suratketerangandomisili not found');

            return redirect(route('suratketerangandomisilis.index'));
        }

        $this->suratketerangandomisiliRepository->delete($id);

        Flash::success('Suratketerangandomisili deleted successfully.');

        return redirect(route('suratketerangandomisilis.index'));
    }
}
