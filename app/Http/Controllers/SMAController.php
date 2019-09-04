<?php

namespace App\Http\Controllers;

use App\DataTables\smaDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatesmaRequest;
use App\Http\Requests\UpdatesmaRequest;
use App\Repositories\smaRepository;
use Flash;
// use App\Models\datapenduduk as Datapenduduk;
use App\Http\Controllers\AppBaseController;
use Response;

class SMAController extends AppBaseController
{
    /** @var  smaRepository */
    private $smaRepository;

    public function __construct(smaRepository $smaRepo)
    {
        $this->smaRepository = $smaRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the sma.
     *
     * @param smaDataTable $smaDataTable
     * @return Response
     */
    public function index(smaDataTable $smaDataTable)
    {
        return $smaDataTable->render('sma.index');
    }

    /**
     * Show the form for creating a new sma.
     *
     * @return Response
     */
    public function create()
    {
        // $data = Datapenduduk::all();
        return view('sma.create');
    }

    /**
     * Store a newly created sma in storage.
     *
     * @param CreatesmaRequest $request
     *
     * @return Response
     */
    public function store(CreatesmaRequest $request)
    {
        $input = $request->all();

        $sma = $this->smaRepository->create($input);

        Flash::success('sma saved successfully.');

        return redirect(route('sma.index'));
    }

    /**
     * Display the specified sma.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $sma = $this->smaRepository->findWithoutFail($id);

        if (empty($sma)) {
            Flash::error('sma not found');

            return redirect(route('sma.index'));
        }

        return view('sma.show')->with('sma', $sma);
    }

    /**
     * Show the form for editing the specified sma.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $sma = $this->smaRepository->findWithoutFail($id);

        if (empty($sma)) {
            Flash::error('sma not found');

            return redirect(route('sma.index'));
        }
        // $data = Datapenduduk::All();
        return view('sma.edit')->with('sma', $sma);
    }

    /**
     * Update the specified sma in storage.
     *
     * @param  int              $id
     * @param UpdatesmaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatesmaRequest $request)
    {
        $sma = $this->smaRepository->findWithoutFail($id);

        if (empty($sma)) {
            Flash::error('sma not found');

            return redirect(route('sma.index'));
        }

        $sma = $this->smaRepository->update($request->all(), $id);

        Flash::success('sma updated successfully.');

        return redirect(route('sma.index'));
    }

    /**
     * Remove the specified sma from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $sma = $this->smaRepository->findWithoutFail($id);

        if (empty($sma)) {
            Flash::error('sma not found');

            return redirect(route('sma.index'));
        }

        $this->smaRepository->delete($id);

        Flash::success('sma deleted successfully.');

        return redirect(route('sma.index'));
    }
}
