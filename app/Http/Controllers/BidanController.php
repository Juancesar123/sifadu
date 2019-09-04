<?php

namespace App\Http\Controllers;

use App\DataTables\bidanDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatebidanRequest;
use App\Http\Requests\UpdatebidanRequest;
use App\Repositories\bidanRepository;
use Flash;
// use App\Models\datapenduduk as Datapenduduk;
use App\Http\Controllers\AppBaseController;
use Response;

class BidanController extends AppBaseController
{
    /** @var  bidanRepository */
    private $bidanRepository;

    public function __construct(bidanRepository $bidanRepo)
    {
        $this->bidanRepository = $bidanRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the bidan.
     *
     * @param bidanDataTable $bidanDataTable
     * @return Response
     */
    public function index(bidanDataTable $bidanDataTable)
    {
        return $bidanDataTable->render('bidan.index');
    }

    /**
     * Show the form for creating a new bidan.
     *
     * @return Response
     */
    public function create()
    {
        // $data = Datapenduduk::all();
        return view('bidan.create');
    }

    /**
     * Store a newly created bidan in storage.
     *
     * @param CreatebidanRequest $request
     *
     * @return Response
     */
    public function store(CreatebidanRequest $request)
    {
        $input = $request->all();

        $bidan = $this->bidanRepository->create($input);

        Flash::success('bidan saved successfully.');

        return redirect(route('bidan.index'));
    }

    /**
     * Display the specified bidan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $bidan = $this->bidanRepository->findWithoutFail($id);

        if (empty($bidan)) {
            Flash::error('bidan not found');

            return redirect(route('bidan.index'));
        }

        return view('bidan.show')->with('bidan', $bidan);
    }

    /**
     * Show the form for editing the specified bidan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $bidan = $this->bidanRepository->findWithoutFail($id);

        if (empty($bidan)) {
            Flash::error('bidan not found');

            return redirect(route('bidan.index'));
        }
        // $data = Datapenduduk::All();
        return view('bidan.edit')->with('bidan', $bidan);
    }

    /**
     * Update the specified bidan in storage.
     *
     * @param  int              $id
     * @param UpdatebidanRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatebidanRequest $request)
    {
        $bidan = $this->bidanRepository->findWithoutFail($id);

        if (empty($bidan)) {
            Flash::error('bidan not found');

            return redirect(route('bidan.index'));
        }

        $bidan = $this->bidanRepository->update($request->all(), $id);

        Flash::success('bidan updated successfully.');

        return redirect(route('bidan.index'));
    }

    /**
     * Remove the specified bidan from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $bidan = $this->bidanRepository->findWithoutFail($id);

        if (empty($bidan)) {
            Flash::error('bidan not found');

            return redirect(route('bidan.index'));
        }

        $this->bidanRepository->delete($id);

        Flash::success('bidan deleted successfully.');

        return redirect(route('bidan.index'));
    }
}
