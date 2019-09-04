<?php

namespace App\Http\Controllers;

use App\DataTables\posyanduDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateposyanduRequest;
use App\Http\Requests\UpdateposyanduRequest;
use App\Repositories\posyanduRepository;
use Flash;
// use App\Models\datapenduduk as Datapenduduk;
use App\Http\Controllers\AppBaseController;
use Response;

class PosyanduController extends AppBaseController
{
    /** @var  posyanduRepository */
    private $posyanduRepository;

    public function __construct(posyanduRepository $posyanduRepo)
    {
        $this->posyanduRepository = $posyanduRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the posyandu.
     *
     * @param posyanduDataTable $posyanduDataTable
     * @return Response
     */
    public function index(posyanduDataTable $posyanduDataTable)
    {
        return $posyanduDataTable->render('posyandu.index');
    }

    /**
     * Show the form for creating a new posyandu.
     *
     * @return Response
     */
    public function create()
    {
        // $data = Datapenduduk::all();
        return view('posyandu.create');
    }

    /**
     * Store a newly created posyandu in storage.
     *
     * @param CreateposyanduRequest $request
     *
     * @return Response
     */
    public function store(CreateposyanduRequest $request)
    {
        $input = $request->all();

        $posyandu = $this->posyanduRepository->create($input);

        Flash::success('posyandu berhasil ditambahkan.');

        return redirect(route('posyandu.index'));
    }

    /**
     * Display the specified posyandu.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $posyandu = $this->posyanduRepository->findWithoutFail($id);

        if (empty($posyandu)) {
            Flash::error('posyandu not found');

            return redirect(route('posyandu.index'));
        }

        return view('posyandu.show')->with('posyandu', $posyandu);
    }

    /**
     * Show the form for editing the specified posyandu.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $posyandu = $this->posyanduRepository->findWithoutFail($id);

        if (empty($posyandu)) {
            Flash::error('posyandu not found');

            return redirect(route('posyandu.index'));
        }
        // $data = Datapenduduk::All();
        return view('posyandu.edit')->with('posyandu', $posyandu);
    }

    /**
     * Update the specified posyandu in storage.
     *
     * @param  int              $id
     * @param UpdateposyanduRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateposyanduRequest $request)
    {
        $posyandu = $this->posyanduRepository->findWithoutFail($id);

        if (empty($posyandu)) {
            Flash::error('posyandu not found');

            return redirect(route('posyandu.index'));
        }

        $posyandu = $this->posyanduRepository->update($request->all(), $id);

        Flash::success('posyandu berhasil diperbarui.');

        return redirect(route('posyandu.index'));
    }

    /**
     * Remove the specified posyandu from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $posyandu = $this->posyanduRepository->findWithoutFail($id);

        if (empty($posyandu)) {
            Flash::error('posyandu not found');

            return redirect(route('posyandu.index'));
        }

        $this->posyanduRepository->delete($id);

        Flash::success('posyandu deleted successfully.');

        return redirect(route('posyandu.index'));
    }
}
