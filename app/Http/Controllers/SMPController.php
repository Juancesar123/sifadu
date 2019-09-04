<?php

namespace App\Http\Controllers;

use App\DataTables\smpDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatesmpRequest;
use App\Http\Requests\UpdatesmpRequest;
use App\Repositories\smpRepository;
use Flash;
// use App\Models\datapenduduk as Datapenduduk;
use App\Http\Controllers\AppBaseController;
use Response;

class SMPController extends AppBaseController
{
    /** @var  smpRepository */
    private $smpRepository;

    public function __construct(smpRepository $smpRepo)
    {
        $this->smpRepository = $smpRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the smp.
     *
     * @param smpDataTable $smpDataTable
     * @return Response
     */
    public function index(smpDataTable $smpDataTable)
    {
        return $smpDataTable->render('smp.index');
    }

    /**
     * Show the form for creating a new smp.
     *
     * @return Response
     */
    public function create()
    {
        // $data = Datapenduduk::all();
        return view('smp.create');
    }

    /**
     * Store a newly created smp in storage.
     *
     * @param CreatesmpRequest $request
     *
     * @return Response
     */
    public function store(CreatesmpRequest $request)
    {
        $input = $request->all();

        $smp = $this->smpRepository->create($input);

        Flash::success('SMP saved successfully.');

        return redirect(route('smp.index'));
    }

    /**
     * Display the specified smp.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $smp = $this->smpRepository->findWithoutFail($id);

        if (empty($smp)) {
            Flash::error('SMP not found');

            return redirect(route('smp.index'));
        }

        return view('smp.show')->with('smp', $smp);
    }

    /**
     * Show the form for editing the specified smp.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $smp = $this->smpRepository->findWithoutFail($id);

        if (empty($smp)) {
            Flash::error('SMP not found');

            return redirect(route('smp.index'));
        }
        // $data = Datapenduduk::All();
        return view('smp.edit')->with('smp', $smp);
    }

    /**
     * Update the specified smp in storage.
     *
     * @param  int              $id
     * @param UpdatesmpRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatesmpRequest $request)
    {
        $smp = $this->smpRepository->findWithoutFail($id);

        if (empty($smp)) {
            Flash::error('SMP not found');

            return redirect(route('smp.index'));
        }

        $smp = $this->smpRepository->update($request->all(), $id);

        Flash::success('SMP updated successfully.');

        return redirect(route('smp.index'));
    }

    /**
     * Remove the specified smp from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $smp = $this->smpRepository->findWithoutFail($id);

        if (empty($smp)) {
            Flash::error('SMP not found');

            return redirect(route('smp.index'));
        }

        $this->smpRepository->delete($id);

        Flash::success('SMP deleted successfully.');

        return redirect(route('smp.index'));
    }
}
