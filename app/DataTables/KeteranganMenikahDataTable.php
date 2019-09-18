<?php

namespace App\DataTables;

use App\Models\KeteranganMenikah;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class KeteranganMenikahDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'keterangan_menikahs.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Post $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(KeteranganMenikah $model)
    {
        return $model->newQuery()
        ->join('datapenduduks as ms', 'keterangan_menikahs.nik_mempelai_satu', '=', 'ms.id')
        ->join('datapenduduks as md', 'keterangan_menikahs.nik_mempelai_dua', '=', 'md.id')
        ->select('keterangan_menikahs.*', 'ms.nama_lengkap as ml', 'md.nama_lengkap as mp')
        ;
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
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

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'nomor',
            [
                'name' => 'ms.nama_lengkap',
                'data'  => 'ml',
                'title' => 'Mempelai Laki-laki',
                'defaultContent'    => ''
            ],
            [
                'name' => 'md.nama_lengkap',
                'data'  => 'mp',
                'title' => 'Mempelai Perempuan',
                'defaultContent'    => ''
            ],
            'saksi_satu',
            'saksi_dua',
            'tanggal_menikah',
            'pembantu_ppn',
            'footer',
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'keterangan_menikahsdatatable_' . time();
    }
}