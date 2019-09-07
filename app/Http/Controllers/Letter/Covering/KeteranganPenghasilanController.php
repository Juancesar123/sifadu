<?php

namespace App\Http\Controllers;

use App\DataTables\KeteranganPenghasilanDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatebidanRequest;
use App\Http\Requests\UpdatebidanRequest;
use App\Repositories\KeteranganPenghasilanRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class KeteranganPenghasilanController extends AppBaseController
{
	private $keterangan_penghasilan_repo;

	public function __construct(KeteranganPenghasilanRepository $keterangan_penghasilan_repo) {
		$this->keterangan_penghasilan_repo = $keterangan_penghasilan_repo;
		$this->middleware('auth');
	}

	public function index(KeteranganPenghasilanDataTable $keterangan_penghasilan_data_table) {
		return $keterangan_penghasilan_data_table->render('bidan.index');
	}
	public function cetak($id) {
		$data = compact([
			// 'letter_number',
		]);
		$pdf = PDF::loadView('pdf.letter.covering.keterangan_penghasilan', $data, [], [
			'format'		=> 'folio',
			'margin_left'	=> 10,
			'margin_right'	=> 10,
			'margin_top'	=> 10,
			'margin_bottom'	=> 0,
		]);

		$pdf = $pdf->output();
		return response($pdf, 200,
			[
				'Content-Type'        => 'application/pdf',
				'Content-Length'      =>  strlen($pdf),
				'Content-Disposition' => 'inline; filename="Surat Pengantar KK.pdf"',
				'Cache-Control'       => 'private, max-age=0, must-revalidate',
				'Pragma'              => 'public'
			]
		);
	}

	public function create() {
		// $data = Datapenduduk::all();
		return view('bidan.create');
	}

	public function store(CreatebidanRequest $request) {
		$input = $request->all();

		$bidan = $this->keterangan_penghasilan_repo->create($input);

		Flash::success('bidan berhasil ditambahkan.');

		return redirect(route('bidan.index'));
	}

	public function show($id) {
		$bidan = $this->keterangan_penghasilan_repo->findWithoutFail($id);

		if (empty($bidan)) {
			Flash::error('bidan not found');

			return redirect(route('bidan.index'));
		}

		return view('bidan.show')->with('bidan', $bidan);
	}

	public function edit($id) {
		$bidan = $this->keterangan_penghasilan_repo->findWithoutFail($id);

		if (empty($bidan)) {
			Flash::error('bidan not found');

			return redirect(route('bidan.index'));
		}
        // $data = Datapenduduk::All();
		return view('bidan.edit')->with('bidan', $bidan);
	}

	public function update($id, UpdatebidanRequest $request) {
		$bidan = $this->keterangan_penghasilan_repo->findWithoutFail($id);

		if (empty($bidan)) {
			Flash::error('bidan not found');

			return redirect(route('bidan.index'));
		}

		$bidan = $this->keterangan_penghasilan_repo->update($request->all(), $id);

		Flash::success('bidan berhasil diperbarui.');

		return redirect(route('bidan.index'));
	}

	public function destroy($id) {
		$bidan = $this->keterangan_penghasilan_repo->findWithoutFail($id);

		if (empty($bidan)) {
			Flash::error('bidan not found');

			return redirect(route('bidan.index'));
		}

		$this->keterangan_penghasilan_repo->delete($id);

		Flash::success('bidan deleted successfully.');

		return redirect(route('bidan.index'));
	}
}