<?php

namespace App\Http\Controllers;

use App\DataTables\pendidikanDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatependidikanRequest;
use App\Http\Requests\UpdatependidikanRequest;
use App\Repositories\pendidikanRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class pendidikanController extends AppBaseController
{
    /** @var  pendidikanRepository */
    private $pendidikanRepository;

    public function __construct(pendidikanRepository $pendidikanRepo)
    {
        $this->pendidikanRepository = $pendidikanRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the pendidikan.
     *
     * @param pendidikanDataTable $pendidikanDataTable
     * @return Response
     */
    public function index(pendidikanDataTable $pendidikanDataTable)
    {
        return $pendidikanDataTable->render('pendidikans.index');
    }

    /**
     * Show the form for creating a new pendidikan.
     *
     * @return Response
     */
    public function create()
    {
        return view('pendidikans.create');
    }

    /**
     * Store a newly created pendidikan in storage.
     *
     * @param CreatependidikanRequest $request
     *
     * @return Response
     */
    public function store(CreatependidikanRequest $request)
    {
        $input = $request->all();

        $pendidikan = $this->pendidikanRepository->create($input);

        Flash::success('Pendidikan berhasil ditambahkan.');

        return redirect(route('pendidikans.index'));
    }

    /**
     * Display the specified pendidikan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $pendidikan = $this->pendidikanRepository->findWithoutFail($id);

        if (empty($pendidikan)) {
            Flash::error('Pendidikan not found');

            return redirect(route('pendidikans.index'));
        }

        return view('pendidikans.show')->with('pendidikan', $pendidikan);
    }

    /**
     * Show the form for editing the specified pendidikan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $pendidikan = $this->pendidikanRepository->findWithoutFail($id);

        if (empty($pendidikan)) {
            Flash::error('Pendidikan not found');

            return redirect(route('pendidikans.index'));
        }

        return view('pendidikans.edit')->with('pendidikan', $pendidikan);
    }

    /**
     * Update the specified pendidikan in storage.
     *
     * @param  int              $id
     * @param UpdatependidikanRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatependidikanRequest $request)
    {
        $pendidikan = $this->pendidikanRepository->findWithoutFail($id);

        if (empty($pendidikan)) {
            Flash::error('Pendidikan not found');

            return redirect(route('pendidikans.index'));
        }

        $pendidikan = $this->pendidikanRepository->update($request->all(), $id);

        Flash::success('Pendidikan berhasil diperbarui.');

        return redirect(route('pendidikans.index'));
    }

    /**
     * Remove the specified pendidikan from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pendidikan = $this->pendidikanRepository->findWithoutFail($id);

        if (empty($pendidikan)) {
            Flash::error('Pendidikan not found');

            return redirect(route('pendidikans.index'));
        }

        $this->pendidikanRepository->delete($id);

        Flash::success('Pendidikan deleted successfully.');

        return redirect(route('pendidikans.index'));
    }
}
