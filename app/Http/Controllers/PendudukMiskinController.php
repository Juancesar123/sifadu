<?php

namespace App\Http\Controllers;

use App\DataTables\PendudukMiskinDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatePendudukMiskinRequest;
use App\Http\Requests\UpdatePendudukMiskinRequest;
use App\Models\datapenduduk as Penduduk;
use App\Repositories\PendudukMiskinRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use DB;

class PendudukMiskinController extends AppBaseController
{
    private $pendudukMiskinRepository;

    public function __construct(PendudukMiskinRepository $pendudukMiskinRepo)
    {
        $this->pendudukMiskinRepository = $pendudukMiskinRepo;
    }
    public function index(PendudukMiskinDataTable $pendudukMiskinDataTable)
    {
        return $pendudukMiskinDataTable->render('penduduk_miskins.index');
    }

    public function create()
    {
        return view('penduduk_miskins.create');
    }
    public function store(CreatePendudukMiskinRequest $request)
    {
        $input = $request->all();

        $pendudukMiskin = $this->pendudukMiskinRepository->create($input);

        Flash::success('Penduduk Miskin saved successfully.');

        return redirect(route('kemiskinan.index'));
    }
    public function show($id_penduduk)
    {
        $penduduk = Penduduk::findWithoutFail($id_penduduk);

        if (empty($penduduk)) {
            Flash::error('Penduduk Miskin not found');

            return redirect(route('kemiskinan.index'));
        }
        dd($penduduk);
        return view('penduduk_miskins.show')->with('penduduk', $penduduk);
    }
    public function edit($id)
    {
        $pendudukMiskin = $this->pendudukMiskinRepository->findWithoutFail($id);

        if (empty($pendudukMiskin)) {
            Flash::error('Penduduk Miskin not found');

            return redirect(route('kemiskinan.index'));
        }

        return view('penduduk_miskins.edit')->with('pendudukMiskin', $pendudukMiskin);
    }
    public function update($id, UpdatePendudukMiskinRequest $request)
    {
        $pendudukMiskin = $this->pendudukMiskinRepository->findWithoutFail($id);

        if (empty($pendudukMiskin)) {
            Flash::error('Penduduk Miskin not found');

            return redirect(route('kemiskinan.index'));
        }

        $pendudukMiskin = $this->pendudukMiskinRepository->update($request->all(), $id);

        Flash::success('Penduduk Miskin updated successfully.');

        return redirect(route('kemiskinan.index'));
    }
    public function destroy($id)
    {
        $pendudukMiskin = $this->pendudukMiskinRepository->findWithoutFail($id);

        if (empty($pendudukMiskin)) {
            Flash::error('Penduduk Miskin not found');

            return redirect(route('kemiskinan.index'));
        }

        $this->pendudukMiskinRepository->delete($id);

        Flash::success('Penduduk Miskin deleted successfully.');

        return redirect(route('kemiskinan.index'));
    }
}