<?php

namespace App\DataTables;

use App\Models\datapenduduk as Penduduk;
use App\Models\PendudukMiskin;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class PendudukMiskinDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable->addColumn('action', 'penduduk_miskins.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Post $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Penduduk $model)
    {
        return $model->newQuery()
    			->select(
        			'datapenduduks.id',
        			'datapenduduks.nik',
        			'datapenduduks.nama_lengkap',
        			'datapenduduks.jenis_kelamin',
        			'datapenduduks.alamat',
        			\DB::raw('(SELECT COUNT(penduduk_miskins.id_penduduk) FROM penduduk_miskins WHERE penduduk_miskins.id_penduduk=datapenduduks.id) AS jumlah_indikator_kemiskinan')
        		)
    }
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px'])
            ->parameters([
                'dom'     => 'Bfrtip',
                'order'   => [[0, 'desc']],
                'buttons' => [
                    ['extend' => 'create', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'export', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'print', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reset', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reload', 'className' => 'btn btn-default btn-sm no-corner',],
                ],
            ]);
    }
    protected function getColumns()
    {
        return [
        	'id',
            'nik',
            // 'nama_lengkap',
            // 'jenis_kelamin',
            // 'alamat',
            // 'jumlah_indikator_kemiskinan',
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'penduduk_miskinsdatatable_' . time();
    }
}