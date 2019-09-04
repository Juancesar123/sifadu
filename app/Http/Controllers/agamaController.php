<?php

namespace App\Http\Controllers;

use App\DataTables\agamaDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateagamaRequest;
use App\Http\Requests\UpdateagamaRequest;
use App\Repositories\agamaRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class agamaController extends AppBaseController
{
    /** @var  agamaRepository */
    private $agamaRepository;

    public function __construct(agamaRepository $agamaRepo)
    {
        $this->agamaRepository = $agamaRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the agama.
     *
     * @param agamaDataTable $agamaDataTable
     * @return Response
     */
    public function index(agamaDataTable $agamaDataTable)
    {
        return $agamaDataTable->render('agamas.index');
    }

    /**
     * Show the form for creating a new agama.
     *
     * @return Response
     */
    public function create()
    {
        return view('agamas.create');
    }

    /**
     * Store a newly created agama in storage.
     *
     * @param CreateagamaRequest $request
     *
     * @return Response
     */
    public function store(CreateagamaRequest $request)
    {
        $input = $request->all();

        $agama = $this->agamaRepository->create($input);

        Flash::success('Data Agama saved successfully.');

        return redirect(route('agamas.index'));
    }

    /**
     * Display the specified agama.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $agama = $this->agamaRepository->findWithoutFail($id);

        if (empty($agama)) {
            Flash::error('Agama not found');

            return redirect(route('agamas.index'));
        }

        return view('agamas.show')->with('agama', $agama);
    }

    /**
     * Show the form for editing the specified agama.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $agama = $this->agamaRepository->findWithoutFail($id);

        if (empty($agama)) {
            Flash::error('Agama not found');

            return redirect(route('agamas.index'));
        }

        return view('agamas.edit')->with('agama', $agama);
    }

    /**
     * Update the specified agama in storage.
     *
     * @param  int              $id
     * @param UpdateagamaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateagamaRequest $request)
    {
        $agama = $this->agamaRepository->findWithoutFail($id);

        if (empty($agama)) {
            Flash::error('Agama not found');

            return redirect(route('agamas.index'));
        }

        $agama = $this->agamaRepository->update($request->all(), $id);

        Flash::success('Agama updated successfully.');

        return redirect(route('agamas.index'));
    }

    /**
     * Remove the specified agama from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $agama = $this->agamaRepository->findWithoutFail($id);

        if (empty($agama)) {
            Flash::error('Agama not found');

            return redirect(route('agamas.index'));
        }

        $this->agamaRepository->delete($id);

        Flash::success('Agama deleted successfully.');

        return redirect(route('agamas.index'));
    }
}
