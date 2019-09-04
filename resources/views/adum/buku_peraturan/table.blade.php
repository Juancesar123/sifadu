@section('css')
    @include('layouts.datatables_css')
@endsection
<table id="table-data2" class="table table-responsive table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Jenis Peraturan</th>
            <th>Nomor dan Tanggal Ditetapkan</th>
            <th>Tentang</th>
            <th>Uraian Singkat</th>
            <th>Tanggal Kesepakatan</th>
            <th>Nomor dan Tanggal Dilaporkan</th>
            <th>Nomor dan Tanggal Diundangkan dalam Lembaran</th>
            <th>Nomor dan Tanggal Diundangkan dalam Berita</th>
            <th>Ket</th>
            <th>Action</th>
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
                ajax : {
                    url: '{{ url('adum/peraturan/data') }}',
                    type: 'get'
                },
                columns: [
                    { "data" : "abp_nomor_urut", sClass: 'text-center'},
                    { "data" : "abp_jenis_peraturan"},
                    { "data" : "abp_tanggal_tetap"},
                    { "data" : "abp_tentang"},
                    { "data" : "abp_uraian_singkat"},
                    { "data" : "abp_tanggal_sepakat"},
                    { "data" : "abp_tanggal_lapor"},
                    { "data" : "abp_tanggal_undang_lembaran"},
                    { "data" : "abp_tanggal_undang_berita"},
                    { "data" : "abp_keterangan"},
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