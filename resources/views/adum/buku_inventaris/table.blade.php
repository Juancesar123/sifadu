@section('css')
    @include('layouts.datatables_css')
    <style>
        table.dataTable thead th {
            vertical-align: middle !important;
            text-align: center !important;
        }
    </style>
@endsection
<table id="table-data2" class="table table-responsive table-bordered">
    <thead>
        <tr>
            <th rowspan="3">No</th>
            <th rowspan="3">Jenis Barang/Bangunan</th>
            <th colspan="5">Asal Barang/Bangunan</th>
            <th colspan="2">Keadaan di awal tahun</th>
            <th colspan="4">Penghapusan Barang/Bangunan</th>
            <th colspan="2">Keadaan di akhir tahun</th>
            <th rowspan="3">Ket</th>
            <th rowspan="3">Action</th>
        </tr>
        <tr>
            <th rowspan="2">Dibeli Sendiri</th>
            <th colspan="3">Bantuan</th>
            <th rowspan="2">Sumbangan</th>
            <th rowspan="2">Baik</th>
            <th rowspan="2">Rusak</th>
            <th rowspan="2">Rusak</th>
            <th rowspan="2">Dijual</th>
            <th rowspan="2">Disumbangkan</th>
            <th rowspan="2">Tanggal Penghapusan</th>
            <th rowspan="2">Baik</th>
            <th rowspan="2">Rusak</th>
        </tr>
        <tr>
            <th>Pemerintah</th>
            <th>Provinsi</th>
            <th>Kab/Kota</th>
        </tr>
    </thead>
    <tbody></tbody>
</table>
@section('scripts')
    @include('layouts.datatables_js')
@endsection
@push('script')
    <script>
        $(function() {
            var table = $('#table-data2').DataTable({
                processing: true,
                serverSide: true,
                scrollX: true,
                ajax : {
                    url: '{{ url('adum/inventaris/data') }}',
                    type: 'get'
                },
                columns: [
                    { "data" : "abi_nomor_urut", sClass: 'text-center',"defaultContent": "-"},
                    { "data" : "abi_jenis_inventaris","defaultContent": "-"},
                    { "data" : "abi_dibeli_sendiri","defaultContent": "-"},
                    { "data" : "abi_bantuan_pemerintah","defaultContent": "-"},
                    { "data" : "abi_bantuan_provinsi","defaultContent": "-"},
                    { "data" : "abi_bantuan_kabkota","defaultContent": "-"},
                    { "data" : "abi_sumbangan","defaultContent": "-"},
                    { "data" : "abi_awal_baik","defaultContent": "-"},
                    { "data" : "abi_awal_rusak","defaultContent": "-"},
                    { "data" : "abi_hapus_rusak","defaultContent": "-"},
                    { "data" : "abi_hapus_dijual","defaultContent": "-"},
                    { "data" : "abi_hapus_disumbangkan","defaultContent": "-"},
                    { "data" : "abi_tanggal_hapus","defaultContent": "-"},
                    { "data" : "abi_akhir_baik","defaultContent": "-"},
                    { "data" : "abi_akhir_rusak","defaultContent": "-"},
                    { "data" : "ket","defaultContent": "-"},
                    { "data" : "action", orderable: false, searchable: false}
                ]
            });

            $(table.table().container()).on('keyup', 'thead input', function() {
            table
                .column($(this).data('index'))
                .search(this.value)
                .draw();
            });
        });
    </script>
@endpush