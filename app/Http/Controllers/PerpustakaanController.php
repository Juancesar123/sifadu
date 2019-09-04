<?php

namespace App\Http\Controllers;

use App\DataTables\perpustakaanDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateperpustakaanRequest;
use App\Http\Requests\UpdateperpustakaanRequest;
use App\Repositories\perpustakaanRepository;
use Flash;
// use App\Models\datapenduduk as Datapenduduk;
use App\Http\Controllers\AppBaseController;
use Response;

class PerpustakaanController extends AppBaseController
{
    /** @var  perpustakaanRepository */
    private $perpustakaanRepository;

    public function __construct(perpustakaanRepository $perpustakaanRepo)
    {
        $this->perpustakaanRepository = $perpustakaanRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the perpustakaan.
     *
     * @param perpustakaanDataTable $perpustakaanDataTable
     * @return Response
     */
    public function index(perpustakaanDataTable $perpustakaanDataTable)
    {
        return $perpustakaanDataTable->render('perpustakaan.index');
    }

    /**
     * Show the form for creating a new perpustakaan.
     *
     * @return Response
     */
    public function create()
    {
        // $data = Datapenduduk::all();
        return view('perpustakaan.create');
    }

    /**
     * Store a newly created perpustakaan in storage.
     *
     * @param CreateperpustakaanRequest $request
     *
     * @return Response
     */
    public function store(CreateperpustakaanRequest $request)
    {
        $input = $request->all();

        $perpustakaan = $this->perpustakaanRepository->create($input);

        Flash::success('perpustakaan berhasil ditambahkan.');

        return redirect(route('perpustakaan.index'));
    }

    /**
     * Display the specified perpustakaan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $perpustakaan = $this->perpustakaanRepository->findWithoutFail($id);

        if (empty($perpustakaan)) {
            Flash::error('perpustakaan not found');

            return redirect(route('perpustakaan.index'));
        }

        return view('perpustakaan.show')->with('perpustakaan', $perpustakaan);
    }

    /**
     * Show the form for editing the specified perpustakaan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $perpustakaan = $this->perpustakaanRepository->findWithoutFail($id);

        if (empty($perpustakaan)) {
            Flash::error('perpustakaan not found');

            return redirect(route('perpustakaan.index'));
        }
        // $data = Datapenduduk::All();
        return view('perpustakaan.edit')->with('perpustakaan', $perpustakaan);
    }

    /**
     * Update the specified perpustakaan in storage.
     *
     * @param  int              $id
     * @param UpdateperpustakaanRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateperpustakaanRequest $request)
    {
        $perpustakaan = $this->perpustakaanRepository->findWithoutFail($id);

        if (empty($perpustakaan)) {
            Flash::error('perpustakaan not found');

            return redirect(route('perpustakaan.index'));
        }

        $perpustakaan = $this->perpustakaanRepository->update($request->all(), $id);

        Flash::success('perpustakaan berhasil diperbarui.');

        return redirect(route('perpustakaan.index'));
    }

    /**
     * Remove the specified perpustakaan from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $perpustakaan = $this->perpustakaanRepository->findWithoutFail($id);

        if (empty($perpustakaan)) {
            Flash::error('perpustakaan not found');

            return redirect(route('perpustakaan.index'));
        }

        $this->perpustakaanRepository->delete($id);

        Flash::success('perpustakaan deleted successfully.');

        return redirect(route('perpustakaan.index'));
    }
}
