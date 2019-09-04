@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Statistik Agama</h3>
                    </div>
                    <div class="box-body">
                        <div id="diagram" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
<script src="{{ asset('js/highcharts.js') }}"></script>
<script src="{{ asset('js/modules/exporting.js') }}"></script>
<script>
    $(function() {
        var date = new Date();
        var yearNow = date.getFullYear();
        $('#diagram').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'Jumlah Penduduk Berdasarkan Agama (' + yearNow + ')'
            },
            xAxis: {
                categories: [
                    'Agama'
                ]
            },
            yAxis: {
                min: 0,
                max: 1000,
                title: {
                    text: 'Jumlah Penduduk'
                }
            },
            plotOptions: {
                column: {
                    depth: 25,
                }
            },
            series: [
                @foreach($statistik as $key => $row)
                    {
                        "name":"{{ $key }}",
                        "data": [{{ $row }}]
                    },
                @endforeach
            ]
        });
    });
</script>
@endpush