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
            <td>No</td>
            <td>Nomor Buku</td>
            <td>Nama</td>
            <td>Niap</td>
            <td>Nip</td>
            <td>Jenis Kelamin</td>
            <td>Tempat Dan Tgl Lahir</td>
            <td>Agama</td>
            <td>Pangkat Golongan</td>
            <td>Jabatan</td>
            <td>Pendidikan Terakhir</td>
            <td>Nomor Dan Tanggal Keputusan Pengangkatan</td>
            <td>Nomor Dan Tanggal Keputusan Pemberhentian</td>
            <td>Ket</td>
            <td>Action</td>
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
                    url: '{{ url('adum/aparat/data') }}',
                    type: 'get'
                },
                columns: [
                    { "data" : "abap_nomor", sClass: 'text-center',"defaultContent": "-"},
                    { "data" : "abap_nomor_urut", "defaultContent": "-"},
                    { "data" : "abap_nama","defaultContent": "-"},
                    { "data" : "abap_no_aparat","defaultContent": "-"},
                    { "data" : "abap_no_pegawai","defaultContent": "-"},
                    { "data" : "abap_jenis_kelamin","defaultContent": "-"},
                    { "data" : "abap_ttl","defaultContent": "-"},
                    { "data" : "abap_agama","defaultContent": "-"},
                    { "data" : "abap_golongan","defaultContent": "-"},
                    { "data" : "abap_jabatan","defaultContent": "-"},
                    { "data" : "abap_pendidikan","defaultContent": "-"},
                    { "data" : "abap_no_tanggal_pengangkatan","defaultContent": "-"},
                    { "data" : "abap_no_tanggal_pemberhentian","defaultContent": "-"},
                    { "data" : "abap_ket","defaultContent": "-"},
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