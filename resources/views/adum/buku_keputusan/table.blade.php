@section('css')
    @include('layouts.datatables_css')
@endsection
<table id="table-data2" class="table table-responsive table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nomor dan Tanggal Keputusan</th>
            <th>Tentang</th>
            <th>Uraian Singkat</th>
            <th>Nomor dan Tanggal Dilaporkan</th>
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
                    url: '{{ url('adum/keputusan/data') }}',
                    type: 'get'
                },
                columns: [
                    { "data" : "no", sClass: 'text-center'},
                    { "data" : "no_tanggal_keputusan"},
                    { "data" : "tentang"},
                    { "data" : "uraian"},
                    { "data" : "no_tanggal_dilaporkan"},
                    { "data" : "ket"},
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