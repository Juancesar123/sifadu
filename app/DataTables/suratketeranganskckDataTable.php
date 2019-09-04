<?php

namespace App\DataTables;

use App\Models\suratketeranganskck;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class suratketeranganskckDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'suratketeranganskcks.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Post $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(suratketeranganskck $model)
    {
        return $model->newQuery()->join('datapenduduks', 'suratketeranganskcks.nik', '=', 'datapenduduks.id')
        ->select('suratketeranganskcks.*','datapenduduks.nama_lengkap','datapenduduks.nik');
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
            ->addAction(['width' => '200px'])
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
            [
               'name'           => 'datapenduduks.nama_lengkap',
               'data'           => 'nama_lengkap',
               'title'          => 'Nama Lengkap',
               'defaultContent' => ''
            ],
            [
                'name'          => 'datapenduduks.nik',
                'data'          => 'nik',
                'title'         => 'KTP',
                'defaultContent'=> ''
            ],
            'nomor_surat',
            'footer_cetak_data'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'suratketeranganskcksdatatable_' . time();
    }
}
