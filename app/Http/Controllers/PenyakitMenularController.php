<?php

namespace App\Http\Controllers;

use App\DataTables\penyakitmenularDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatepenyakitmenularRequest;
use App\Http\Requests\UpdatepenyakitmenularRequest;
use App\Repositories\penyakitmenularRepository;
use Flash;
// use App\Models\datapenduduk as Datapenduduk;
use App\Http\Controllers\AppBaseController;
use Response;

class PenyakitMenularController extends AppBaseController
{
    /** @var  penyakitmenularRepository */
    private $penyakitmenularRepository;

    public function __construct(penyakitmenularRepository $penyakitmenularRepo)
    {
        $this->penyakitmenularRepository = $penyakitmenularRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the penyakitmenular.
     *
     * @param penyakitmenularDataTable $penyakitmenularDataTable
     * @return Response
     */
    public function index(penyakitmenularDataTable $penyakitmenularDataTable)
    {
        return $penyakitmenularDataTable->render('penyakitmenular.index');
    }

    /**
     * Show the form for creating a new penyakitmenular.
     *
     * @return Response
     */
    public function create()
    {
        // $data = Datapenduduk::all();
        return view('penyakitmenular.create');
    }

    /**
     * Store a newly created penyakitmenular in storage.
     *
     * @param CreatepenyakitmenularRequest $request
     *
     * @return Response
     */
    public function store(CreatepenyakitmenularRequest $request)
    {
        $input = $request->all();

        $penyakitmenular = $this->penyakitmenularRepository->create($input);

        Flash::success('penyakitmenular saved successfully.');

        return redirect(route('penyakitmenular.index'));
    }

    /**
     * Display the specified penyakitmenular.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $penyakitmenular = $this->penyakitmenularRepository->findWithoutFail($id);

        if (empty($penyakitmenular)) {
            Flash::error('penyakitmenular not found');

            return redirect(route('penyakitmenular.index'));
        }

        return view('penyakitmenular.show')->with('penyakitmenular', $penyakitmenular);
    }

    /**
     * Show the form for editing the specified penyakitmenular.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $penyakitmenular = $this->penyakitmenularRepository->findWithoutFail($id);

        if (empty($penyakitmenular)) {
            Flash::error('penyakitmenular not found');

            return redirect(route('penyakitmenular.index'));
        }
        // $data = Datapenduduk::All();
        return view('penyakitmenular.edit')->with('penyakitmenular', $penyakitmenular);
    }

    /**
     * Update the specified penyakitmenular in storage.
     *
     * @param  int              $id
     * @param UpdatepenyakitmenularRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatepenyakitmenularRequest $request)
    {
        $penyakitmenular = $this->penyakitmenularRepository->findWithoutFail($id);

        if (empty($penyakitmenular)) {
            Flash::error('penyakitmenular not found');

            return redirect(route('penyakitmenular.index'));
        }

        $penyakitmenular = $this->penyakitmenularRepository->update($request->all(), $id);

        Flash::success('penyakitmenular updated successfully.');

        return redirect(route('penyakitmenular.index'));
    }

    /**
     * Remove the specified penyakitmenular from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $penyakitmenular = $this->penyakitmenularRepository->findWithoutFail($id);

        if (empty($penyakitmenular)) {
            Flash::error('penyakitmenular not found');

            return redirect(route('penyakitmenular.index'));
        }

        $this->penyakitmenularRepository->delete($id);

        Flash::success('penyakitmenular deleted successfully.');

        return redirect(route('penyakitmenular.index'));
    }
}
