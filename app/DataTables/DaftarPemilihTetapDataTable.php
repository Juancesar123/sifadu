<?php

namespace App\DataTables;

use App\Models\datapenduduk as Penduduk;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class DaftarPemilihTetapDataTable extends DataTable
{
	public function dataTable($query) {
		$dataTable = new EloquentDataTable($query);
		return $dataTable;
		// ->addColumn('action', 'daftar_pemilih_tetaps.datatables_actions');
	}
	public function query(Penduduk $model) {
		return $model
		->newQuery()
		->where(\DB::raw('YEAR(tanggal_lahir)'), '>=', 17)
		->orWhere('status_kawin', '=', 'KAWIN');
	}
	public function html() {
		return $this->builder()
		->columns($this->getColumns())
		->minifiedAjax()
		->addAction(['width' => '120px'])
		->parameters([
			'dom'     => 'Bfrtip',
			'order'   => [[0, 'desc']],
			'buttons' => [
				// ['extend' => 'create', 'className' => 'btn btn-default btn-sm no-corner',],
				['extend' => 'export', 'className' => 'btn btn-default btn-sm no-corner',],
				['extend' => 'print', 'className' => 'btn btn-default btn-sm no-corner',],
				['extend' => 'reset', 'className' => 'btn btn-default btn-sm no-corner',],
				['extend' => 'reload', 'className' => 'btn btn-default btn-sm no-corner',],
			],
		]);
	}
	protected function getColumns() {
		return [
			'nik',
			'nama_lengkap',
			'status_kawin',
			'tanggal_lahir',
			'alamat',
		];
	}
	protected function filename() {
		return 'daftar_pemilih_tetapsdatatable_' . time();
	}
}