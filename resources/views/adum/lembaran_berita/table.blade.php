@section('css')
    @include('layouts.datatables_css')
@endsection
<table id="table-data2" class="table table-responsive table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Jenis Peraturan</th>
            <th>Nomor Ditetapkan</th>
            <th>Tanggal Ditetapkan</th>
            <th>Tentang</th>
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
                serverSide: false,
                lengthChange: false,
                ajax : {
                    url: '{{ url('adum/lember/data') }}',
                    type: 'GET'
                },
                columns: [
                    { "data" : "no", sClass: 'text-center'},
                    { "data" : "jenis"},
                    { "data" : "nomor"},
                    { "data" : "tanggal"},
                    { "data" : "tentang"},
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