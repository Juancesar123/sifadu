@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Statistik Pekerjaan</h3>
                    </div>
                    <div class="box-body table-responsive">
                        <div id="diagram" style="min-width: 310px; height: 800px; margin: 0 auto"></div>
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
                type: 'bar',
                marginLeft: 150,
            },
            title: {
                text: 'Jumlah Penduduk Berdasarkan Status Jenis Pekerjaan (' + yearNow + ')'
            },
            subtitle: {
                text: 'Total Penduduk : '+ total_penduduk
            },
            tooltip: {
                formatter: function() {
                    var pcnt = (this.point.y / total_penduduk) * 100;
                    return 'Jumlah : <b>'+ Highcharts.numberFormat(pcnt, 2) + '%</b>' + '<br>' + Highcharts.numberFormat(this.point.y, 0) + ' Orang';
                }
            },
            xAxis: {
                categories: [
                    @foreach($pekerjaan as $key => $row)
						'{{ $row }}',
					@endforeach
                ],
                title: {
                    text: null
                },
                min: 0,
                scrollbar: {
                    enabled: true
                },
                tickLength: 0,
            },
            yAxis: {
                min: 0,
                endOnTick: true,
                maxPadding: 0.2,
                title: {
                    text: 'Jumlah',
                    align: 'high'
                }
            },
            plotOptions: {
                bar: {
                    dataLabels: {
                        enabled: true,
                        formatter: function () {
                            return Highcharts.numberFormat(Math.abs(this.y), 0) + ' ('+Highcharts.numberFormat(Math.abs((this.y / total_penduduk)*100),2)+'%)';
                        },
                        style: {
                            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                        }
                    }
                }
            },
            legend: {
                enabled: false
            },
            credits: {
                enabled: false
            },
            series: [{
                    name: 'Jumlah',
                    data: [
                        @foreach($statistik as $key => $row)
							{{ $row }},
						@endforeach
                    ],
                    colorByPoint: true,
                    cursor: 'pointer'
                }
            ]
        });
    });
</script>
@endpush