<?php

namespace App\Http\Controllers;

use App\DataTables\KeteranganPenghasilanDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateKeteranganPenghasilanRequest;
use App\Http\Requests\UpdateKeteranganPenghasilanRequest;
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
		return $keterangan_penghasilan_data_table->render('keterangan-penghasilan.index');
	}
	public function create() {
		// $data = Datapenduduk::all();
		return view('keterangan_penghasilan.create');
	}

	public function store(CreateKeteranganPenghasilanRequest $request) {
		$input = $request->all();

		$keterangan_penghasilan = $this->keterangan_penghasilan_repo->create($input);

		Flash::success('keterangan_penghasilan berhasil ditambahkan.');

		return redirect(route('keterangan_penghasilan.index'));
	}

	public function show($id) {
		$keterangan_penghasilan = $this->keterangan_penghasilan_repo->findWithoutFail($id);

		if (empty($keterangan_penghasilan)) {
			Flash::error('keterangan_penghasilan not found');

			return redirect(route('keterangan_penghasilan.index'));
		}

		return view('keterangan_penghasilan.show')->with('keterangan_penghasilan', $keterangan_penghasilan);
	}

	public function edit($id) {
		$keterangan_penghasilan = $this->keterangan_penghasilan_repo->findWithoutFail($id);

		if (empty($keterangan_penghasilan)) {
			Flash::error('keterangan_penghasilan not found');

			return redirect(route('keterangan_penghasilan.index'));
		}
		// $data = Datapenduduk::All();
		return view('keterangan_penghasilan.edit')->with('keterangan_penghasilan', $keterangan_penghasilan);
	}

	public function update($id, UpdatebidanRequest $request) {
		$keterangan_penghasilan = $this->keterangan_penghasilan_repo->findWithoutFail($id);

		if (empty($keterangan_penghasilan)) {
			Flash::error('KeteranganPenghasilan not found');

			return redirect(route('keterangan_penghasilan.index'));
		}

		$keterangan_penghasilan = $this->keterangan_penghasilan_repo->update($request->all(), $id);

		Flash::success('KeteranganPenghasilan berhasil diperbarui.');

		return redirect(route('keterangan_penghasilan.index'));
	}

	public function destroy($id) {
		$keterangan_penghasilan = $this->keterangan_penghasilan_repo->findWithoutFail($id);

		if (empty($keterangan_penghasilan)) {
			Flash::error('keterangan_penghasilan not found');

			return redirect(route('keterangan_penghasilan.index'));
		}

		$this->keterangan_penghasilan_repo->delete($id);

		Flash::success('KeteranganPenghasilan deleted successfully.');

		return redirect(route('keterangan_penghasilan.index'));
	}
}