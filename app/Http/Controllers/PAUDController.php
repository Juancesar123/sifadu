<?php

namespace App\Http\Controllers;

use App\DataTables\paudDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatepaudRequest;
use App\Http\Requests\UpdatepaudRequest;
use App\Repositories\paudRepository;
use Flash;
// use App\Models\datapenduduk as Datapenduduk;
use App\Http\Controllers\AppBaseController;
use Response;

class PAUDController extends AppBaseController
{
    /** @var  paudRepository */
    private $paudRepository;

    public function __construct(paudRepository $paudRepo)
    {
        $this->paudRepository = $paudRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the paud.
     *
     * @param paudDataTable $paudDataTable
     * @return Response
     */
    public function index(paudDataTable $paudDataTable)
    {
        return $paudDataTable->render('paud.index');
    }

    /**
     * Show the form for creating a new paud.
     *
     * @return Response
     */
    public function create()
    {
        // $data = Datapenduduk::all();
        return view('paud.create');
    }

    /**
     * Store a newly created paud in storage.
     *
     * @param CreatepaudRequest $request
     *
     * @return Response
     */
    public function store(CreatepaudRequest $request)
    {
        $input = $request->all();

        $paud = $this->paudRepository->create($input);

        Flash::success('paud berhasil ditambahkan.');

        return redirect(route('paud.index'));
    }

    /**
     * Display the specified paud.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $paud = $this->paudRepository->findWithoutFail($id);

        if (empty($paud)) {
            Flash::error('paud not found');

            return redirect(route('paud.index'));
        }

        return view('paud.show')->with('paud', $paud);
    }

    /**
     * Show the form for editing the specified paud.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $paud = $this->paudRepository->findWithoutFail($id);

        if (empty($paud)) {
            Flash::error('paud not found');

            return redirect(route('paud.index'));
        }
        // $data = Datapenduduk::All();
        return view('paud.edit')->with('paud', $paud);
    }

    /**
     * Update the specified paud in storage.
     *
     * @param  int              $id
     * @param UpdatepaudRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatepaudRequest $request)
    {
        $paud = $this->paudRepository->findWithoutFail($id);

        if (empty($paud)) {
            Flash::error('paud not found');

            return redirect(route('paud.index'));
        }

        $paud = $this->paudRepository->update($request->all(), $id);

        Flash::success('paud berhasil diperbarui.');

        return redirect(route('paud.index'));
    }

    /**
     * Remove the specified paud from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $paud = $this->paudRepository->findWithoutFail($id);

        if (empty($paud)) {
            Flash::error('paud not found');

            return redirect(route('paud.index'));
        }

        $this->paudRepository->delete($id);

        Flash::success('paud deleted successfully.');

        return redirect(route('paud.index'));
    }
}
