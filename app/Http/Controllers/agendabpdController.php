<?php

namespace App\Http\Controllers;

use App\DataTables\agendabpdDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateagendabpdRequest;
use App\Http\Requests\UpdateagendabpdRequest;
use App\Repositories\agendabpdRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class agendabpdController extends AppBaseController
{
    /** @var  agendabpdRepository */
    private $agendabpdRepository;

    public function __construct(agendabpdRepository $agendabpdRepo)
    {
        $this->agendabpdRepository = $agendabpdRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the agendabpd.
     *
     * @param agendabpdDataTable $agendabpdDataTable
     * @return Response
     */
    public function index(agendabpdDataTable $agendabpdDataTable)
    {
        return $agendabpdDataTable->render('agendabpds.index');
    }

    /**
     * Show the form for creating a new agendabpd.
     *
     * @return Response
     */
    public function create()
    {
        return view('agendabpds.create');
    }

    /**
     * Store a newly created agendabpd in storage.
     *
     * @param CreateagendabpdRequest $request
     *
     * @return Response
     */
    public function store(CreateagendabpdRequest $request)
    {
        $input = $request->all();

        $agendabpd = $this->agendabpdRepository->create($input);

        Flash::success('Agenda BPBD saved successfully.');

        return redirect(route('agendabpds.index'));
    }

    /**
     * Display the specified agendabpd.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $agendabpd = $this->agendabpdRepository->findWithoutFail($id);

        if (empty($agendabpd)) {
            Flash::error('Agenda BPBD not found');

            return redirect(route('agendabpds.index'));
        }

        return view('agendabpds.show')->with('agendabpd', $agendabpd);
    }

    /**
     * Show the form for editing the specified agendabpd.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $agendabpd = $this->agendabpdRepository->findWithoutFail($id);

        if (empty($agendabpd)) {
            Flash::error('Agendabpd not found');

            return redirect(route('agendabpds.index'));
        }

        return view('agendabpds.edit')->with('agendabpd', $agendabpd);
    }

    /**
     * Update the specified agendabpd in storage.
     *
     * @param  int              $id
     * @param UpdateagendabpdRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateagendabpdRequest $request)
    {
        $agendabpd = $this->agendabpdRepository->findWithoutFail($id);

        if (empty($agendabpd)) {
            Flash::error('Agenda BPBD not found');

            return redirect(route('agendabpds.index'));
        }

        $agendabpd = $this->agendabpdRepository->update($request->all(), $id);

        Flash::success('Agenda BPBD updated successfully.');

        return redirect(route('agendabpds.index'));
    }

    /**
     * Remove the specified agendabpd from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $agendabpd = $this->agendabpdRepository->findWithoutFail($id);

        if (empty($agendabpd)) {
            Flash::error('Agenda BPBD not found');

            return redirect(route('agendabpds.index'));
        }

        $this->agendabpdRepository->delete($id);

        Flash::success('Agenda BPBD deleted successfully.');

        return redirect(route('agendabpds.index'));
    }
}
