<script>
    $(function() {
        var date = new Date();
        var yearNow = date.getFullYear();
        $('#diagram-pekerjaan').highcharts({
            chart: {
                type: 'bar',
                marginLeft: 200,
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
                    @foreach($getPekerjaan as $key => $row)
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
                max: 3000,
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
                        @foreach($pekerjaan as $key => $row)
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