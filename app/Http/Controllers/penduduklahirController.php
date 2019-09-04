<?php

namespace App\Http\Controllers;

use App\DataTables\penduduklahirDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatependuduklahirRequest;
use App\Http\Requests\UpdatependuduklahirRequest;
use App\Repositories\penduduklahirRepository;
use Flash;
use App\Models\datapenduduk as Datapenduduk;
use App\Http\Controllers\AppBaseController;
use Response;

class penduduklahirController extends AppBaseController
{
    /** @var  penduduklahirRepository */
    private $penduduklahirRepository;

    public function __construct(penduduklahirRepository $penduduklahirRepo)
    {
        $this->penduduklahirRepository = $penduduklahirRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the penduduklahir.
     *
     * @param penduduklahirDataTable $penduduklahirDataTable
     * @return Response
     */
    public function index(penduduklahirDataTable $penduduklahirDataTable)
    {
        return $penduduklahirDataTable->render('penduduklahirs.index');
    }

    /**
     * Show the form for creating a new penduduklahir.
     *
     * @return Response
     */
    public function create()
    {
        $data = Datapenduduk::all();
        return view('penduduklahirs.create',['data'=>$data]);
    }

    /**
     * Store a newly created penduduklahir in storage.
     *
     * @param CreatependuduklahirRequest $request
     *
     * @return Response
     */
    public function store(CreatependuduklahirRequest $request)
    {
        $input = $request->all();

        $penduduklahir = $this->penduduklahirRepository->create($input);

        Flash::success('Penduduklahir berhasil ditambahkan.');

        return redirect(route('penduduklahirs.index'));
    }

    /**
     * Display the specified penduduklahir.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $penduduklahir = $this->penduduklahirRepository->findWithoutFail($id);

        if (empty($penduduklahir)) {
            Flash::error('Penduduklahir not found');

            return redirect(route('penduduklahirs.index'));
        }

        return view('penduduklahirs.show')->with('penduduklahir', $penduduklahir);
    }

    /**
     * Show the form for editing the specified penduduklahir.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $penduduklahir = $this->penduduklahirRepository->findWithoutFail($id);

        if (empty($penduduklahir)) {
            Flash::error('Penduduklahir not found');

            return redirect(route('penduduklahirs.index'));
        }
        $data = Datapenduduk::all();
        return view('penduduklahirs.edit',['data'=>$data])->with('penduduklahir', $penduduklahir);
    }

    /**
     * Update the specified penduduklahir in storage.
     *
     * @param  int              $id
     * @param UpdatependuduklahirRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatependuduklahirRequest $request)
    {
        $penduduklahir = $this->penduduklahirRepository->findWithoutFail($id);

        if (empty($penduduklahir)) {
            Flash::error('Penduduklahir not found');

            return redirect(route('penduduklahirs.index'));
        }

        $penduduklahir = $this->penduduklahirRepository->update($request->all(), $id);

        Flash::success('Penduduklahir berhasil diperbarui.');

        return redirect(route('penduduklahirs.index'));
    }

    /**
     * Remove the specified penduduklahir from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $penduduklahir = $this->penduduklahirRepository->findWithoutFail($id);

        if (empty($penduduklahir)) {
            Flash::error('Penduduklahir not found');

            return redirect(route('penduduklahirs.index'));
        }

        $this->penduduklahirRepository->delete($id);

        Flash::success('Penduduklahir deleted successfully.');

        return redirect(route('penduduklahirs.index'));
    }
}
