<?php

namespace App\Http\Controllers;

use App\DataTables\keputusanbpdDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatekeputusanbpdRequest;
use App\Http\Requests\UpdatekeputusanbpdRequest;
use App\Repositories\keputusanbpdRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class keputusanbpdController extends AppBaseController
{
    /** @var  keputusanbpdRepository */
    private $keputusanbpdRepository;

    public function __construct(keputusanbpdRepository $keputusanbpdRepo)
    {
        $this->keputusanbpdRepository = $keputusanbpdRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the keputusanbpd.
     *
     * @param keputusanbpdDataTable $keputusanbpdDataTable
     * @return Response
     */
    public function index(keputusanbpdDataTable $keputusanbpdDataTable)
    {
        return $keputusanbpdDataTable->render('keputusanbpds.index');
    }

    /**
     * Show the form for creating a new keputusanbpd.
     *
     * @return Response
     */
    public function create()
    {
        return view('keputusanbpds.create');
    }

    /**
     * Store a newly created keputusanbpd in storage.
     *
     * @param CreatekeputusanbpdRequest $request
     *
     * @return Response
     */
    public function store(CreatekeputusanbpdRequest $request)
    {
        $input = $request->all();

        $keputusanbpd = $this->keputusanbpdRepository->create($input);

        Flash::success('Keputusanbpd saved successfully.');

        return redirect(route('keputusanbpds.index'));
    }

    /**
     * Display the specified keputusanbpd.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $keputusanbpd = $this->keputusanbpdRepository->findWithoutFail($id);

        if (empty($keputusanbpd)) {
            Flash::error('Keputusanbpd not found');

            return redirect(route('keputusanbpds.index'));
        }

        return view('keputusanbpds.show')->with('keputusanbpd', $keputusanbpd);
    }

    /**
     * Show the form for editing the specified keputusanbpd.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $keputusanbpd = $this->keputusanbpdRepository->findWithoutFail($id);

        if (empty($keputusanbpd)) {
            Flash::error('Keputusanbpd not found');

            return redirect(route('keputusanbpds.index'));
        }

        return view('keputusanbpds.edit')->with('keputusanbpd', $keputusanbpd);
    }

    /**
     * Update the specified keputusanbpd in storage.
     *
     * @param  int              $id
     * @param UpdatekeputusanbpdRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatekeputusanbpdRequest $request)
    {
        $keputusanbpd = $this->keputusanbpdRepository->findWithoutFail($id);

        if (empty($keputusanbpd)) {
            Flash::error('Keputusanbpd not found');

            return redirect(route('keputusanbpds.index'));
        }

        $keputusanbpd = $this->keputusanbpdRepository->update($request->all(), $id);

        Flash::success('Keputusanbpd updated successfully.');

        return redirect(route('keputusanbpds.index'));
    }

    /**
     * Remove the specified keputusanbpd from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $keputusanbpd = $this->keputusanbpdRepository->findWithoutFail($id);

        if (empty($keputusanbpd)) {
            Flash::error('Keputusanbpd not found');

            return redirect(route('keputusanbpds.index'));
        }

        $this->keputusanbpdRepository->delete($id);

        Flash::success('Keputusanbpd deleted successfully.');

        return redirect(route('keputusanbpds.index'));
    }
}
