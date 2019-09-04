<?php

namespace App\Http\Controllers;

use App\DataTables\PeternakanDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatePeternakanRequest;
use App\Http\Requests\UpdatePeternakanRequest;
use App\Repositories\PeternakanRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class PeternakanController extends AppBaseController
{
    /** @var  PeternakanRepository */
    private $peternakanRepository;

    public function __construct(PeternakanRepository $peternakanRepo)
    {
        $this->peternakanRepository = $peternakanRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the Peternakan.
     *
     * @param PeternakanDataTable $peternakanDataTable
     * @return Response
     */
    public function index(PeternakanDataTable $peternakanDataTable)
    {
        return $peternakanDataTable->render('peternakans.index');
    }

    /**
     * Show the form for creating a new Peternakan.
     *
     * @return Response
     */
    public function create()
    {
        return view('peternakans.create');
    }

    /**
     * Store a newly created Peternakan in storage.
     *
     * @param CreatePeternakanRequest $request
     *
     * @return Response
     */
    public function store(CreatePeternakanRequest $request)
    {
        $input = $request->all();

        $peternakan = $this->peternakanRepository->create($input);

        $peternakan->input_peternakan_koordinate($input);
        $peternakan->save();
        Flash::success('Peternakan saved successfully.');

        return redirect(route('peternakans.index'));
    }

    /**
     * Display the specified Peternakan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $peternakan = $this->peternakanRepository->findWithoutFail($id);

        if (empty($peternakan)) {
            Flash::error('Peternakan not found');

            return redirect(route('peternakans.index'));
        }

        return view('peternakans.show')->with('peternakan', $peternakan);
    }

    /**
     * Show the form for editing the specified Peternakan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $peternakan = $this->peternakanRepository->findWithoutFail($id);

        if (empty($peternakan)) {
            Flash::error('Peternakan not found');

            return redirect(route('peternakans.index'));
        }

        return view('peternakans.edit')->with('peternakan', $peternakan);
    }

    /**
     * Update the specified Peternakan in storage.
     *
     * @param  int              $id
     * @param UpdatePeternakanRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePeternakanRequest $request)
    {
        $peternakan = $this->peternakanRepository->findWithoutFail($id);

        if (empty($peternakan)) {
            Flash::error('Peternakan not found');

            return redirect(route('peternakans.index'));
        }

        $peternakan->input_peternakan_koordinate($request->all());
        $peternakan->save();

        $peternakan = $this->peternakanRepository->update($request->all(), $id);

        Flash::success('Peternakan updated successfully.');

        return redirect(route('peternakans.index'));
    }

    /**
     * Remove the specified Peternakan from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $peternakan = $this->peternakanRepository->findWithoutFail($id);

        if (empty($peternakan)) {
            Flash::error('Peternakan not found');

            return redirect(route('peternakans.index'));
        }

        $this->peternakanRepository->delete($id);

        Flash::success('Peternakan deleted successfully.');

        return redirect(route('peternakans.index'));
    }
}
