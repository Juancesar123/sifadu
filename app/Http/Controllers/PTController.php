<?php

namespace App\Http\Controllers;

use App\DataTables\ptDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateptRequest;
use App\Http\Requests\UpdateptRequest;
use App\Repositories\ptRepository;
use Flash;
// use App\Models\datapenduduk as Datapenduduk;
use App\Http\Controllers\AppBaseController;
use Response;

class PTController extends AppBaseController
{
    /** @var  ptRepository */
    private $ptRepository;

    public function __construct(ptRepository $ptRepo)
    {
        $this->ptRepository = $ptRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the pt.
     *
     * @param ptDataTable $ptDataTable
     * @return Response
     */
    public function index(ptDataTable $ptDataTable)
    {
        return $ptDataTable->render('pt.index');
    }

    /**
     * Show the form for creating a new pt.
     *
     * @return Response
     */
    public function create()
    {
        // $data = Datapenduduk::all();
        return view('pt.create');
    }

    /**
     * Store a newly created pt in storage.
     *
     * @param CreateptRequest $request
     *
     * @return Response
     */
    public function store(CreateptRequest $request)
    {
        $input = $request->all();

        $pt = $this->ptRepository->create($input);

        Flash::success('perguruan tinggi berhasil ditambahkan.');

        return redirect(route('pt.index'));
    }

    /**
     * Display the specified pt.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $pt = $this->ptRepository->findWithoutFail($id);

        if (empty($pt)) {
            Flash::error('perguruan tinggi not found');

            return redirect(route('pt.index'));
        }

        return view('pt.show')->with('pt', $pt);
    }

    /**
     * Show the form for editing the specified pt.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $pt = $this->ptRepository->findWithoutFail($id);

        if (empty($pt)) {
            Flash::error('perguruan tinggi not found');

            return redirect(route('pt.index'));
        }
        // $data = Datapenduduk::All();
        return view('pt.edit')->with('pt', $pt);
    }

    /**
     * Update the specified pt in storage.
     *
     * @param  int              $id
     * @param UpdateptRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateptRequest $request)
    {
        $pt = $this->ptRepository->findWithoutFail($id);

        if (empty($pt)) {
            Flash::error('perguruan tinggi not found');

            return redirect(route('pt.index'));
        }

        $pt = $this->ptRepository->update($request->all(), $id);

        Flash::success('perguruan tinggi berhasil diperbarui.');

        return redirect(route('pt.index'));
    }

    /**
     * Remove the specified pt from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pt = $this->ptRepository->findWithoutFail($id);

        if (empty($pt)) {
            Flash::error('perguruan tinggi not found');

            return redirect(route('pt.index'));
        }

        $this->ptRepository->delete($id);

        Flash::success('perguruan tinggi deleted successfully.');

        return redirect(route('pt.index'));
    }
}
