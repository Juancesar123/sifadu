<script>
    $(function() {
        var date = new Date();
        var yearNow = date.getFullYear();
        $('#diagram-kawin').highcharts({
            chart: {
                type: 'bar'
            },
            title: {
                text: 'Jumlah Penduduk Berdasarkan Status Perkawinan (' + yearNow + ')'
            },
            subtitle: {
                text: 'Total Penduduk : '+ total_penduduk
            },
            theme: 'grid',
            xAxis: {
                categories: [
                    @foreach($kawin as $key => $row)
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
                    text: 'Jumlah',
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
                    name: 'Jumlah',
                    showInLegend: false,
                    data: [
                        @foreach($kawin as $key => $row)
                            {{ $row }},
                        @endforeach
                    ],
                    colorByPoint: true
                }
            ]
        });
    });
</script>