<?php

namespace App\Http\Controllers;

use App\DataTables\majlisDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatemajlisRequest;
use App\Http\Requests\UpdatemajlisRequest;
use App\Repositories\majlisRepository;
use Flash;
// use App\Models\datapenduduk as Datapenduduk;
use App\Http\Controllers\AppBaseController;
use Response;

class MajlisController extends AppBaseController
{
    /** @var  majlisRepository */
    private $majlisRepository;

    public function __construct(majlisRepository $majlisRepo)
    {
        $this->majlisRepository = $majlisRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the majlis.
     *
     * @param majlisDataTable $majlisDataTable
     * @return Response
     */
    public function index(majlisDataTable $majlisDataTable)
    {
        return $majlisDataTable->render('majlis.index');
    }

    /**
     * Show the form for creating a new majlis.
     *
     * @return Response
     */
    public function create()
    {
        // $data = Datapenduduk::all();
        return view('majlis.create');
    }

    /**
     * Store a newly created majlis in storage.
     *
     * @param CreatemajlisRequest $request
     *
     * @return Response
     */
    public function store(CreatemajlisRequest $request)
    {
        $input = $request->all();

        $majlis = $this->majlisRepository->create($input);

        Flash::success('majlis saved successfully.');

        return redirect(route('majlis.index'));
    }

    /**
     * Display the specified majlis.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $majlis = $this->majlisRepository->findWithoutFail($id);

        if (empty($majlis)) {
            Flash::error('majlis not found');

            return redirect(route('majlis.index'));
        }

        return view('majlis.show')->with('majlis', $majlis);
    }

    /**
     * Show the form for editing the specified majlis.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $majlis = $this->majlisRepository->findWithoutFail($id);

        if (empty($majlis)) {
            Flash::error('majlis not found');

            return redirect(route('majlis.index'));
        }
        // $data = Datapenduduk::All();
        return view('majlis.edit')->with('majlis', $majlis);
    }

    /**
     * Update the specified majlis in storage.
     *
     * @param  int              $id
     * @param UpdatemajlisRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatemajlisRequest $request)
    {
        $majlis = $this->majlisRepository->findWithoutFail($id);

        if (empty($majlis)) {
            Flash::error('majlis not found');

            return redirect(route('majlis.index'));
        }

        $majlis = $this->majlisRepository->update($request->all(), $id);

        Flash::success('majlis updated successfully.');

        return redirect(route('majlis.index'));
    }

    /**
     * Remove the specified majlis from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $majlis = $this->majlisRepository->findWithoutFail($id);

        if (empty($majlis)) {
            Flash::error('majlis not found');

            return redirect(route('majlis.index'));
        }

        $this->majlisRepository->delete($id);

        Flash::success('majlis deleted successfully.');

        return redirect(route('majlis.index'));
    }
}
