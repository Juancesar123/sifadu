<?php

namespace App\Http\Controllers;

use App\DataTables\dusunDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatedusunRequest;
use App\Http\Requests\UpdatedusunRequest;
use App\Repositories\dusunRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class dusunController extends AppBaseController
{
    /** @var  dusunRepository */
    private $dusunRepository;

    public function __construct(dusunRepository $dusunRepo)
    {
        $this->dusunRepository = $dusunRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the dusun.
     *
     * @param dusunDataTable $dusunDataTable
     * @return Response
     */
    public function index(dusunDataTable $dusunDataTable)
    {
        return $dusunDataTable->render('dusuns.index');
    }

    /**
     * Show the form for creating a new dusun.
     *
     * @return Response
     */
    public function create()
    {
        return view('dusuns.create');
    }

    /**
     * Store a newly created dusun in storage.
     *
     * @param CreatedusunRequest $request
     *
     * @return Response
     */
    public function store(CreatedusunRequest $request)
    {
        $input = $request->all();

        $dusun = $this->dusunRepository->create($input);

        $dusun->input_dusun_koordinate($input);
        $dusun->save();
        Flash::success('Dusun saved successfully.');

        return redirect(route('dusuns.index'));
    }

    /**
     * Display the specified dusun.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $dusun = $this->dusunRepository->findWithoutFail($id);

        if (empty($dusun)) {
            Flash::error('Dusun not found');

            return redirect(route('dusuns.index'));
        }

        return view('dusuns.show')->with('dusun', $dusun);
    }

    /**
     * Show the form for editing the specified dusun.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $dusun = $this->dusunRepository->findWithoutFail($id);

        if (empty($dusun)) {
            Flash::error('Dusun not found');

            return redirect(route('dusuns.index'));
        }

        return view('dusuns.edit')->with('dusun', $dusun);
    }

    /**
     * Update the specified dusun in storage.
     *
     * @param  int              $id
     * @param UpdatedusunRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatedusunRequest $request)
    {
        $dusun = $this->dusunRepository->findWithoutFail($id);

        if (empty($dusun)) {
            Flash::error('Dusun not found');

            return redirect(route('dusuns.index'));
        }

        $dusun->input_dusun_koordinate($request->all());
        $dusun->save();

        $dusun = $this->dusunRepository->update($request->all(), $id);

        Flash::success('Dusun updated successfully.');

        return redirect(route('dusuns.index'));
    }

    /**
     * Remove the specified dusun from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $dusun = $this->dusunRepository->findWithoutFail($id);

        if (empty($dusun)) {
            Flash::error('Dusun not found');

            return redirect(route('dusuns.index'));
        }

        $this->dusunRepository->delete($id);

        Flash::success('Dusun deleted successfully.');

        return redirect(route('dusuns.index'));
    }
}
