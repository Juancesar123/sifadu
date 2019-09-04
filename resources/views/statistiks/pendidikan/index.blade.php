@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Statistik Pendidikan</h3>
                    </div>
                    <div class="box-body table-responsive">
                        <div id="diagram" style="min-width: 310px; height: 500px; margin: 0 auto"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
<script src="{{ asset('js/highcharts.js') }}"></script>
<script src="{{ asset('js/modules/exporting.js') }}"></script>
<script src="{{ asset('js/themes/grid.js') }}"></script>
<script>
    $(function() {
        var date = new Date();
        var total_penduduk = '{{ $penduduk }}';
        var yearNow = date.getFullYear();
        $('#diagram').highcharts({
            chart: {
                type: 'pie',
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false
            },
            title: {
                text: 'Jumlah Penduduk Berdasarkan Pendidikan Terakhir (' + yearNow + ')'
            },
            subtitle: {
                text: 'Total Penduduk : '+ total_penduduk
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b><br>{point.y} Orang'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    depth: 35,
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.percentage:.1f}%</b><br>{point.y} Orang',
                        style: {
                            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                        }
                    }

                }
            },
            credits: {
                enabled: false
            },
            series: [{
                    name: 'Jumlah',
                    data: [
                        @foreach($statistik as $key => $row)
							{
                                name: '{{ $key }}',
                                y: {{ $row }}
                            },
						@endforeach
                    ],
                    colorByPoint: true
                }
            ]
        });
    });
</script>
@endpush