<?php

namespace App\Http\Controllers;

use App\DataTables\musholaDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatemusholaRequest;
use App\Http\Requests\UpdatemusholaRequest;
use App\Repositories\musholaRepository;
use Flash;
// use App\Models\datapenduduk as Datapenduduk;
use App\Http\Controllers\AppBaseController;
use Response;

class MusholaController extends AppBaseController
{
    /** @var  musholaRepository */
    private $musholaRepository;

    public function __construct(musholaRepository $musholaRepo)
    {
        $this->musholaRepository = $musholaRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the mushola.
     *
     * @param musholaDataTable $musholaDataTable
     * @return Response
     */
    public function index(musholaDataTable $musholaDataTable)
    {
        return $musholaDataTable->render('mushola.index');
    }

    /**
     * Show the form for creating a new mushola.
     *
     * @return Response
     */
    public function create()
    {
        // $data = Datapenduduk::all();
        return view('mushola.create');
    }

    /**
     * Store a newly created mushola in storage.
     *
     * @param CreatemusholaRequest $request
     *
     * @return Response
     */
    public function store(CreatemusholaRequest $request)
    {
        $input = $request->all();

        $mushola = $this->musholaRepository->create($input);

        Flash::success('mushola berhasil ditambahkan.');

        return redirect(route('mushola.index'));
    }

    /**
     * Display the specified mushola.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $mushola = $this->musholaRepository->findWithoutFail($id);

        if (empty($mushola)) {
            Flash::error('mushola not found');

            return redirect(route('mushola.index'));
        }

        return view('mushola.show')->with('mushola', $mushola);
    }

    /**
     * Show the form for editing the specified mushola.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $mushola = $this->musholaRepository->findWithoutFail($id);

        if (empty($mushola)) {
            Flash::error('mushola not found');

            return redirect(route('mushola.index'));
        }
        // $data = Datapenduduk::All();
        return view('mushola.edit')->with('mushola', $mushola);
    }

    /**
     * Update the specified mushola in storage.
     *
     * @param  int              $id
     * @param UpdatemusholaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatemusholaRequest $request)
    {
        $mushola = $this->musholaRepository->findWithoutFail($id);

        if (empty($mushola)) {
            Flash::error('mushola not found');

            return redirect(route('mushola.index'));
        }

        $mushola = $this->musholaRepository->update($request->all(), $id);

        Flash::success('mushola berhasil diperbarui.');

        return redirect(route('mushola.index'));
    }

    /**
     * Remove the specified mushola from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $mushola = $this->musholaRepository->findWithoutFail($id);

        if (empty($mushola)) {
            Flash::error('mushola not found');

            return redirect(route('mushola.index'));
        }

        $this->musholaRepository->delete($id);

        Flash::success('mushola deleted successfully.');

        return redirect(route('mushola.index'));
    }
}
