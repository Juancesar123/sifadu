<?php

namespace App\Http\Controllers;

use App\DataTables\suratketerangantidakmampuDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatesuratketerangantidakmampuRequest;
use App\Http\Requests\UpdatesuratketerangantidakmampuRequest;
use App\Repositories\suratketerangantidakmampuRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Models\datapenduduk as Datapenduduk;
class suratketerangantidakmampuController extends AppBaseController
{
    /** @var  suratketerangantidakmampuRepository */
    private $suratketerangantidakmampuRepository;

    public function __construct(suratketerangantidakmampuRepository $suratketerangantidakmampuRepo)
    {
        $this->suratketerangantidakmampuRepository = $suratketerangantidakmampuRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the suratketerangantidakmampu.
     *
     * @param suratketerangantidakmampuDataTable $suratketerangantidakmampuDataTable
     * @return Response
     */
    public function index(suratketerangantidakmampuDataTable $suratketerangantidakmampuDataTable)
    {
        return $suratketerangantidakmampuDataTable->render('suratketerangantidakmampus.index');
    }

    /**
     * Show the form for creating a new suratketerangantidakmampu.
     *
     * @return Response
     */
    public function create()
    {
        $data = Datapenduduk::all();
        return view('suratketerangantidakmampus.create',['data' => $data]);
    }

    /**
     * Store a newly created suratketerangantidakmampu in storage.
     *
     * @param CreatesuratketerangantidakmampuRequest $request
     *
     * @return Response
     */
    public function store(CreatesuratketerangantidakmampuRequest $request)
    {
        $input = $request->all();

        $suratketerangantidakmampu = $this->suratketerangantidakmampuRepository->create($input);

        Flash::success('Suratketerangantidakmampu berhasil ditambahkan.');

        return redirect(route('suratketerangantidakmampus.index'));
    }

    /**
     * Display the specified suratketerangantidakmampu.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $suratketerangantidakmampu = $this->suratketerangantidakmampuRepository->findWithoutFail($id);

        if (empty($suratketerangantidakmampu)) {
            Flash::error('Suratketerangantidakmampu not found');

            return redirect(route('suratketerangantidakmampus.index'));
        }

        return view('suratketerangantidakmampus.show')->with('suratketerangantidakmampu', $suratketerangantidakmampu);
    }

    /**
     * Show the form for editing the specified suratketerangantidakmampu.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $suratketerangantidakmampu = $this->suratketerangantidakmampuRepository->findWithoutFail($id);

        if (empty($suratketerangantidakmampu)) {
            Flash::error('Suratketerangantidakmampu not found');

            return redirect(route('suratketerangantidakmampus.index'));
        }
        $data = Datapenduduk::all();
        return view('suratketerangantidakmampus.edit',['data' => $data])->with('suratketerangantidakmampu', $suratketerangantidakmampu);
    }

    /**
     * Update the specified suratketerangantidakmampu in storage.
     *
     * @param  int              $id
     * @param UpdatesuratketerangantidakmampuRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatesuratketerangantidakmampuRequest $request)
    {
        $suratketerangantidakmampu = $this->suratketerangantidakmampuRepository->findWithoutFail($id);

        if (empty($suratketerangantidakmampu)) {
            Flash::error('Suratketerangantidakmampu not found');

            return redirect(route('suratketerangantidakmampus.index'));
        }

        $suratketerangantidakmampu = $this->suratketerangantidakmampuRepository->update($request->all(), $id);

        Flash::success('Suratketerangantidakmampu berhasil diperbarui.');

        return redirect(route('suratketerangantidakmampus.index'));
    }

    /**
     * Remove the specified suratketerangantidakmampu from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $suratketerangantidakmampu = $this->suratketerangantidakmampuRepository->findWithoutFail($id);

        if (empty($suratketerangantidakmampu)) {
            Flash::error('Suratketerangantidakmampu not found');

            return redirect(route('suratketerangantidakmampus.index'));
        }

        $this->suratketerangantidakmampuRepository->delete($id);

        Flash::success('Suratketerangantidakmampu deleted successfully.');

        return redirect(route('suratketerangantidakmampus.index'));
    }
}
