<?php

namespace App\Http\Controllers;

use App\DataTables\pendudukmeninggalDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatependudukmeninggalRequest;
use App\Http\Requests\UpdatependudukmeninggalRequest;
use App\Repositories\pendudukmeninggalRepository;
use Flash;
use App\Models\datapenduduk as Datapenduduk;
use App\Http\Controllers\AppBaseController;
use Response;

class pendudukmeninggalController extends AppBaseController
{
    /** @var  pendudukmeninggalRepository */
    private $pendudukmeninggalRepository;

    public function __construct(pendudukmeninggalRepository $pendudukmeninggalRepo)
    {
        $this->pendudukmeninggalRepository = $pendudukmeninggalRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the pendudukmeninggal.
     *
     * @param pendudukmeninggalDataTable $pendudukmeninggalDataTable
     * @return Response
     */
    public function index(pendudukmeninggalDataTable $pendudukmeninggalDataTable)
    {
        return $pendudukmeninggalDataTable->render('pendudukmeninggals.index');
    }

    /**
     * Show the form for creating a new pendudukmeninggal.
     *
     * @return Response
     */
    public function create()
    {
        $data = Datapenduduk::all();
        return view('pendudukmeninggals.create',['data'=>$data]);
    }

    /**
     * Store a newly created pendudukmeninggal in storage.
     *
     * @param CreatependudukmeninggalRequest $request
     *
     * @return Response
     */
    public function store(CreatependudukmeninggalRequest $request)
    {
        $input = $request->all();

        $pendudukmeninggal = $this->pendudukmeninggalRepository->create($input);

        Flash::success('Pendudukmeninggal saved successfully.');

        return redirect(route('pendudukmeninggals.index'));
    }

    /**
     * Display the specified pendudukmeninggal.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $pendudukmeninggal = $this->pendudukmeninggalRepository->findWithoutFail($id);

        if (empty($pendudukmeninggal)) {
            Flash::error('Pendudukmeninggal not found');

            return redirect(route('pendudukmeninggals.index'));
        }

        return view('pendudukmeninggals.show')->with('pendudukmeninggal', $pendudukmeninggal);
    }

    /**
     * Show the form for editing the specified pendudukmeninggal.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $pendudukmeninggal = $this->pendudukmeninggalRepository->findWithoutFail($id);

        if (empty($pendudukmeninggal)) {
            Flash::error('Pendudukmeninggal not found');

            return redirect(route('pendudukmeninggals.index'));
        }
        $data = Datapenduduk::all();
        return view('pendudukmeninggals.edit',['data'=>$data])->with('pendudukmeninggal', $pendudukmeninggal);
    }

    /**
     * Update the specified pendudukmeninggal in storage.
     *
     * @param  int              $id
     * @param UpdatependudukmeninggalRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatependudukmeninggalRequest $request)
    {
        $pendudukmeninggal = $this->pendudukmeninggalRepository->findWithoutFail($id);

        if (empty($pendudukmeninggal)) {
            Flash::error('Pendudukmeninggal not found');

            return redirect(route('pendudukmeninggals.index'));
        }

        $pendudukmeninggal = $this->pendudukmeninggalRepository->update($request->all(), $id);

        Flash::success('Pendudukmeninggal updated successfully.');

        return redirect(route('pendudukmeninggals.index'));
    }

    /**
     * Remove the specified pendudukmeninggal from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pendudukmeninggal = $this->pendudukmeninggalRepository->findWithoutFail($id);

        if (empty($pendudukmeninggal)) {
            Flash::error('Pendudukmeninggal not found');

            return redirect(route('pendudukmeninggals.index'));
        }

        $this->pendudukmeninggalRepository->delete($id);

        Flash::success('Pendudukmeninggal deleted successfully.');

        return redirect(route('pendudukmeninggals.index'));
    }
}
