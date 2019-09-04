<?php

namespace App\Http\Controllers;

use App\DataTables\pendudukpindahDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatependudukpindahRequest;
use App\Http\Requests\UpdatependudukpindahRequest;
use App\Repositories\pendudukpindahRepository;
use Flash;
use App\Models\datapenduduk as Datapenduduk;
use App\Http\Controllers\AppBaseController;
use Response;

class pendudukpindahController extends AppBaseController
{
    /** @var  pendudukpindahRepository */
    private $pendudukpindahRepository;

    public function __construct(pendudukpindahRepository $pendudukpindahRepo)
    {
        $this->pendudukpindahRepository = $pendudukpindahRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the pendudukpindah.
     *
     * @param pendudukpindahDataTable $pendudukpindahDataTable
     * @return Response
     */
    public function index(pendudukpindahDataTable $pendudukpindahDataTable)
    {
        return $pendudukpindahDataTable->render('pendudukpindahs.index');
    }

    /**
     * Show the form for creating a new pendudukpindah.
     *
     * @return Response
     */
    public function create()
    {
        $data = Datapenduduk::all();
        return view('pendudukpindahs.create',['data' => $data]);
    }

    /**
     * Store a newly created pendudukpindah in storage.
     *
     * @param CreatependudukpindahRequest $request
     *
     * @return Response
     */
    public function store(CreatependudukpindahRequest $request)
    {
        $input = $request->all();

        $pendudukpindah = $this->pendudukpindahRepository->create($input);

        Flash::success('Pendudukpindah saved successfully.');

        return redirect(route('pendudukpindahs.index'));
    }

    /**
     * Display the specified pendudukpindah.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $pendudukpindah = $this->pendudukpindahRepository->findWithoutFail($id);

        if (empty($pendudukpindah)) {
            Flash::error('Pendudukpindah not found');

            return redirect(route('pendudukpindahs.index'));
        }

        return view('pendudukpindahs.show')->with('pendudukpindah', $pendudukpindah);
    }

    /**
     * Show the form for editing the specified pendudukpindah.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $pendudukpindah = $this->pendudukpindahRepository->findWithoutFail($id);

        if (empty($pendudukpindah)) {
            Flash::error('Pendudukpindah not found');

            return redirect(route('pendudukpindahs.index'));
        }
        $data = Datapenduduk::All();
        return view('pendudukpindahs.edit',['data'=>$data])->with('pendudukpindah', $pendudukpindah);
    }

    /**
     * Update the specified pendudukpindah in storage.
     *
     * @param  int              $id
     * @param UpdatependudukpindahRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatependudukpindahRequest $request)
    {
        $pendudukpindah = $this->pendudukpindahRepository->findWithoutFail($id);

        if (empty($pendudukpindah)) {
            Flash::error('Pendudukpindah not found');

            return redirect(route('pendudukpindahs.index'));
        }

        $pendudukpindah = $this->pendudukpindahRepository->update($request->all(), $id);

        Flash::success('Pendudukpindah updated successfully.');

        return redirect(route('pendudukpindahs.index'));
    }

    /**
     * Remove the specified pendudukpindah from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pendudukpindah = $this->pendudukpindahRepository->findWithoutFail($id);

        if (empty($pendudukpindah)) {
            Flash::error('Pendudukpindah not found');

            return redirect(route('pendudukpindahs.index'));
        }

        $this->pendudukpindahRepository->delete($id);

        Flash::success('Pendudukpindah deleted successfully.');

        return redirect(route('pendudukpindahs.index'));
    }
}
