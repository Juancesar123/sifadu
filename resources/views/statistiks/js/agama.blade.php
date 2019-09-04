<script>
    $(function() {
        var date = new Date();
        var yearNow = date.getFullYear();
        $('#diagram-agama').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'Jumlah Penduduk Berdasarkan Agama (' + yearNow + ')'
            },
            subtitle: {
                text: 'Total Penduduk : '+ total_penduduk
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
            credits: {
                enabled: false
            },
            series: [
                @foreach($agama as $key => $row)
                    {
                        "name":"{{ $key }}",
                        "data": [{{ $row }}]
                    },
                @endforeach
            ]
        });
    });
</script>