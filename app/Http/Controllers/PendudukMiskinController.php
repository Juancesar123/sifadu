<?php

namespace App\Http\Controllers;

use App\DataTables\PendudukMiskinDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatePendudukMiskinRequest;
use App\Http\Requests\UpdatePendudukMiskinRequest;
use App\Models\datapenduduk as Penduduk;
use App\Models\PendudukMiskin;
use App\Models\ParameterIndikatorKemiskinan;
use App\Repositories\PendudukMiskinRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

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
    public function show($id_penduduk)
    {
        $penduduk = Penduduk::with('kemiskinan.indikator')->findOrFail($id_penduduk);
        // dd(json_decode($penduduk));
        return view('penduduk_miskins.show')->with('penduduk', $penduduk);
    }
    public function edit($id)
    {
        $penduduk = Penduduk::with('kemiskinan')->findOrFail($id);
        $indikator = ParameterIndikatorKemiskinan::select('id','indikator_kemiskinan')->get();
        // dd(
        // 	json_decode($penduduk),
        // 	array_column($penduduk->kemiskinan->toArray(), 'id_indikator_kemiskinan'),
        // 	json_decode($indikator),
        // );
        return view('penduduk_miskins.edit', compact('penduduk', 'indikator'));
    }
    public function update($id, UpdatePendudukMiskinRequest $request)
    {
    	// dd($request->all());
        PendudukMiskin::where('id_penduduk', $request->id_penduduk)->delete();
        foreach ($request->id_indikator_kemiskinan as $key => $value) {
	        PendudukMiskin::create([
	        	'id_penduduk'=>$request->id_penduduk,
	        	'id_indikator_kemiskinan'=>$value
	        ]);
        }

        Flash::success('Penduduk Miskin updated successfully.');

        return redirect(route('kemiskinan.index'));
    }
    public function destroy($id)
    {
        $penduduk = $this->pendudukMiskinRepository->findWithoutFail($id);

        if (empty($penduduk)) {
            Flash::error('Penduduk Miskin not found');

            return redirect(route('kemiskinan.index'));
        }

        $this->pendudukMiskinRepository->delete($id);

        Flash::success('Penduduk Miskin deleted successfully.');

        return redirect(route('kemiskinan.index'));
    }
}