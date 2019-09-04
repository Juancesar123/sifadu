<?php

namespace App\Http\Controllers;

use App\DataTables\madrasahDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatemadrasahRequest;
use App\Http\Requests\UpdatemadrasahRequest;
use App\Repositories\madrasahRepository;
use Flash;
// use App\Models\datapenduduk as Datapenduduk;
use App\Http\Controllers\AppBaseController;
use Response;

class MadrasahController extends AppBaseController
{
    /** @var  madrasahRepository */
    private $madrasahRepository;

    public function __construct(madrasahRepository $madrasahRepo)
    {
        $this->madrasahRepository = $madrasahRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the madrasah.
     *
     * @param madrasahDataTable $madrasahDataTable
     * @return Response
     */
    public function index(madrasahDataTable $madrasahDataTable)
    {
        return $madrasahDataTable->render('madrasah.index');
    }

    /**
     * Show the form for creating a new madrasah.
     *
     * @return Response
     */
    public function create()
    {
        // $data = Datapenduduk::all();
        return view('madrasah.create');
    }

    /**
     * Store a newly created madrasah in storage.
     *
     * @param CreatemadrasahRequest $request
     *
     * @return Response
     */
    public function store(CreatemadrasahRequest $request)
    {
        $input = $request->all();

        $madrasah = $this->madrasahRepository->create($input);

        Flash::success('madrasah berhasil ditambahkan.');

        return redirect(route('madrasah.index'));
    }

    /**
     * Display the specified madrasah.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $madrasah = $this->madrasahRepository->findWithoutFail($id);

        if (empty($madrasah)) {
            Flash::error('madrasah not found');

            return redirect(route('madrasah.index'));
        }

        return view('madrasah.show')->with('madrasah', $madrasah);
    }

    /**
     * Show the form for editing the specified madrasah.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $madrasah = $this->madrasahRepository->findWithoutFail($id);

        if (empty($madrasah)) {
            Flash::error('madrasah not found');

            return redirect(route('madrasah.index'));
        }
        // $data = Datapenduduk::All();
        return view('madrasah.edit')->with('madrasah', $madrasah);
    }

    /**
     * Update the specified madrasah in storage.
     *
     * @param  int              $id
     * @param UpdatemadrasahRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatemadrasahRequest $request)
    {
        $madrasah = $this->madrasahRepository->findWithoutFail($id);

        if (empty($madrasah)) {
            Flash::error('madrasah not found');

            return redirect(route('madrasah.index'));
        }

        $madrasah = $this->madrasahRepository->update($request->all(), $id);

        Flash::success('madrasah berhasil diperbarui.');

        return redirect(route('madrasah.index'));
    }

    /**
     * Remove the specified madrasah from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $madrasah = $this->madrasahRepository->findWithoutFail($id);

        if (empty($madrasah)) {
            Flash::error('madrasah not found');

            return redirect(route('madrasah.index'));
        }

        $this->madrasahRepository->delete($id);

        Flash::success('madrasah deleted successfully.');

        return redirect(route('madrasah.index'));
    }
}
