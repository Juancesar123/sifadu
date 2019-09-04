<?php

namespace App\Http\Controllers;

use App\DataTables\PotensiPertambanganDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatePotensiPertambanganRequest;
use App\Http\Requests\UpdatePotensiPertambanganRequest;
use App\Repositories\PotensiPertambanganRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class PotensiPertambanganController extends AppBaseController
{
    /** @var  PotensiPertambanganRepository */
    private $potensiPertambanganRepository;

    public function __construct(PotensiPertambanganRepository $potensiPertambanganRepo)
    {
        $this->potensiPertambanganRepository = $potensiPertambanganRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the PotensiPertambangan.
     *
     * @param PotensiPertambanganDataTable $potensiPertambanganDataTable
     * @return Response
     */
    public function index(PotensiPertambanganDataTable $potensiPertambanganDataTable)
    {
        return $potensiPertambanganDataTable->render('potensi_pertambangans.index');
    }

    /**
     * Show the form for creating a new PotensiPertambangan.
     *
     * @return Response
     */
    public function create()
    {
        return view('potensi_pertambangans.create');
    }

    /**
     * Store a newly created PotensiPertambangan in storage.
     *
     * @param CreatePotensiPertambanganRequest $request
     *
     * @return Response
     */
    public function store(CreatePotensiPertambanganRequest $request)
    {
        $input = $request->all();

        $potensiPertambangan = $this->potensiPertambanganRepository->create($input);

        $potensiPertambangan->input_koordinate($input);
        $potensiPertambangan->save();
        Flash::success('Potensi Pertambangan saved successfully.');

        return redirect(route('potensiPertambangans.index'));
    }

    /**
     * Display the specified PotensiPertambangan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $potensiPertambangan = $this->potensiPertambanganRepository->findWithoutFail($id);

        if (empty($potensiPertambangan)) {
            Flash::error('Potensi Pertambangan not found');

            return redirect(route('potensiPertambangans.index'));
        }

        return view('potensi_pertambangans.show')->with('potensiPertambangan', $potensiPertambangan);
    }

    /**
     * Show the form for editing the specified PotensiPertambangan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $potensiPertambangan = $this->potensiPertambanganRepository->findWithoutFail($id);

        if (empty($potensiPertambangan)) {
            Flash::error('Potensi Pertambangan not found');

            return redirect(route('potensiPertambangans.index'));
        }

        return view('potensi_pertambangans.edit')->with('potensiPertambangan', $potensiPertambangan);
    }

    /**
     * Update the specified PotensiPertambangan in storage.
     *
     * @param  int              $id
     * @param UpdatePotensiPertambanganRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePotensiPertambanganRequest $request)
    {
        $potensiPertambangan = $this->potensiPertambanganRepository->findWithoutFail($id);

        if (empty($potensiPertambangan)) {
            Flash::error('Potensi Pertambangan not found');

            return redirect(route('potensiPertambangans.index'));
        }

        $potensiPertambangan->input_koordinate($request->all());
        $potensiPertambangan->save();

        $potensiPertambangan = $this->potensiPertambanganRepository->update($request->all(), $id);

        Flash::success('Potensi Pertambangan updated successfully.');

        return redirect(route('potensiPertambangans.index'));
    }

    /**
     * Remove the specified PotensiPertambangan from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $potensiPertambangan = $this->potensiPertambanganRepository->find($id);

        if (empty($potensiPertambangan)) {
            Flash::error('Potensi Pertambangan not found');

            return redirect(route('potensiPertambangans.index'));
        }

        $this->potensiPertambanganRepository->delete($id);

        Flash::success('Potensi Pertambangan deleted successfully.');

        return redirect(route('potensiPertambangans.index'));
    }
}
