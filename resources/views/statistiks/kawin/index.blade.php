@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Statistik Perkawinan</h3>
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
<script src="{{ asset('js/themes/grid.js') }}"></script>
<script>
    $(function() {
        var date = new Date();
        var yearNow = date.getFullYear();
        $('#diagram').highcharts({
            chart: {
                type: 'bar'
            },
            renderTo:'yw0',
            title: {
                text: 'Jumlah Penduduk Berdasarkan Status Perkawinan (' + yearNow + ')'
            },
            theme: 'grid',
            xAxis: {
                categories: [
                    @foreach($statistik as $key => $row)
						'{{ $key }}',
					@endforeach
                ],
                title: {
                    text: null
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Population (millions)',
                    align: 'high'
                },
                labels: {
                    overflow: 'justify'
                }
            },
            plotOptions: {
                bar: {
                    dataLabels: {
                        enabled: true
                    }
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'top',
                x: -40,
                y: 80,
                floating: true,
                borderWidth: 0,
                backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
                shadow: true
            },
            credits: {
                enabled: false
            },
            series: [{
                    name: null,
                    showInLegend: false,
                    data: [
                        @foreach($statistik as $key => $row)
							{{ $row }},
						@endforeach
                    ],
                    colorByPoint: true
                }
            ]
        });
    });
</script>
@endpush