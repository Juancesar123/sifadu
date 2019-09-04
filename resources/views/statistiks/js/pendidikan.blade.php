<script>
    $(function() {
        var date = new Date();
        var yearNow = date.getFullYear();
        $('#diagram-pendidikan').highcharts({
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
                        @foreach($pendidikan as $key => $row)
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