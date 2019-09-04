<?php

namespace App\Http\Controllers;

use App\DataTables\tkDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatetkRequest;
use App\Http\Requests\UpdatetkRequest;
use App\Repositories\tkRepository;
use Flash;
// use App\Models\datapenduduk as Datapenduduk;
use App\Http\Controllers\AppBaseController;
use Response;

class TKController extends AppBaseController
{
    /** @var  tkRepository */
    private $tkRepository;

    public function __construct(tkRepository $tkRepo)
    {
        $this->tkRepository = $tkRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the tk.
     *
     * @param tkDataTable $tkDataTable
     * @return Response
     */
    public function index(tkDataTable $tkDataTable)
    {
        return $tkDataTable->render('tk.index');
    }

    /**
     * Show the form for creating a new tk.
     *
     * @return Response
     */
    public function create()
    {
        // $data = Datapenduduk::all();
        return view('tk.create');
    }

    /**
     * Store a newly created tk in storage.
     *
     * @param CreatetkRequest $request
     *
     * @return Response
     */
    public function store(CreatetkRequest $request)
    {
        $input = $request->all();

        $tk = $this->tkRepository->create($input);

        Flash::success('TK berhasil ditambahkan.');

        return redirect(route('tk.index'));
    }

    /**
     * Display the specified tk.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tk = $this->tkRepository->findWithoutFail($id);

        if (empty($tk)) {
            Flash::error('TK not found');

            return redirect(route('tk.index'));
        }

        return view('tk.show')->with('tk', $tk);
    }

    /**
     * Show the form for editing the specified tk.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tk = $this->tkRepository->findWithoutFail($id);

        if (empty($tk)) {
            Flash::error('TK not found');

            return redirect(route('tk.index'));
        }
        // $data = Datapenduduk::All();
        return view('tk.edit')->with('tk', $tk);
    }

    /**
     * Update the specified tk in storage.
     *
     * @param  int              $id
     * @param UpdatetkRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatetkRequest $request)
    {
        $tk = $this->tkRepository->findWithoutFail($id);

        if (empty($tk)) {
            Flash::error('TK not found');

            return redirect(route('tk.index'));
        }

        $tk = $this->tkRepository->update($request->all(), $id);

        Flash::success('TK berhasil diperbarui.');

        return redirect(route('tk.index'));
    }

    /**
     * Remove the specified tk from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tk = $this->tkRepository->findWithoutFail($id);

        if (empty($tk)) {
            Flash::error('TK not found');

            return redirect(route('tk.index'));
        }

        $this->tkRepository->delete($id);

        Flash::success('TK deleted successfully.');

        return redirect(route('tk.index'));
    }
}
