<?php

namespace App\Http\Controllers;

use App\DataTables\parameterstatuskawinDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateparameterstatuskawinRequest;
use App\Http\Requests\UpdateparameterstatuskawinRequest;
use App\Repositories\parameterstatuskawinRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class parameterstatuskawinController extends AppBaseController
{
    /** @var  parameterstatuskawinRepository */
    private $parameterstatuskawinRepository;

    public function __construct(parameterstatuskawinRepository $parameterstatuskawinRepo)
    {
        $this->parameterstatuskawinRepository = $parameterstatuskawinRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the parameterstatuskawin.
     *
     * @param parameterstatuskawinDataTable $parameterstatuskawinDataTable
     * @return Response
     */
    public function index(parameterstatuskawinDataTable $parameterstatuskawinDataTable)
    {
        return $parameterstatuskawinDataTable->render('parameterstatuskawins.index');
    }

    /**
     * Show the form for creating a new parameterstatuskawin.
     *
     * @return Response
     */
    public function create()
    {
        return view('parameterstatuskawins.create');
    }

    /**
     * Store a newly created parameterstatuskawin in storage.
     *
     * @param CreateparameterstatuskawinRequest $request
     *
     * @return Response
     */
    public function store(CreateparameterstatuskawinRequest $request)
    {
        $input = $request->all();

        $parameterstatuskawin = $this->parameterstatuskawinRepository->create($input);

        Flash::success('Parameterstatuskawin saved successfully.');

        return redirect(route('parameterstatuskawins.index'));
    }

    /**
     * Display the specified parameterstatuskawin.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $parameterstatuskawin = $this->parameterstatuskawinRepository->findWithoutFail($id);

        if (empty($parameterstatuskawin)) {
            Flash::error('Parameterstatuskawin not found');

            return redirect(route('parameterstatuskawins.index'));
        }

        return view('parameterstatuskawins.show')->with('parameterstatuskawin', $parameterstatuskawin);
    }

    /**
     * Show the form for editing the specified parameterstatuskawin.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $parameterstatuskawin = $this->parameterstatuskawinRepository->findWithoutFail($id);

        if (empty($parameterstatuskawin)) {
            Flash::error('Parameterstatuskawin not found');

            return redirect(route('parameterstatuskawins.index'));
        }

        return view('parameterstatuskawins.edit')->with('parameterstatuskawin', $parameterstatuskawin);
    }

    /**
     * Update the specified parameterstatuskawin in storage.
     *
     * @param  int              $id
     * @param UpdateparameterstatuskawinRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateparameterstatuskawinRequest $request)
    {
        $parameterstatuskawin = $this->parameterstatuskawinRepository->findWithoutFail($id);

        if (empty($parameterstatuskawin)) {
            Flash::error('Parameterstatuskawin not found');

            return redirect(route('parameterstatuskawins.index'));
        }

        $parameterstatuskawin = $this->parameterstatuskawinRepository->update($request->all(), $id);

        Flash::success('Parameterstatuskawin updated successfully.');

        return redirect(route('parameterstatuskawins.index'));
    }

    /**
     * Remove the specified parameterstatuskawin from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $parameterstatuskawin = $this->parameterstatuskawinRepository->findWithoutFail($id);

        if (empty($parameterstatuskawin)) {
            Flash::error('Parameterstatuskawin not found');

            return redirect(route('parameterstatuskawins.index'));
        }

        $this->parameterstatuskawinRepository->delete($id);

        Flash::success('Parameterstatuskawin deleted successfully.');

        return redirect(route('parameterstatuskawins.index'));
    }
}
