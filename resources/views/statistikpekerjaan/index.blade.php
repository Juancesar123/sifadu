@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Statistik Pekerjaan</h1>
    </section>
    <div class="content">
            <div class="clearfix"></div>

            <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-header">
                   
            </div>
            <div class="box-body">
                    <img class="load" style="display: block;
                        margin-left: auto;
                        margin-right: auto;
                        width: 50%;"
                        src="{{asset('img/loading.gif')}}"
                    >
                    <canvas id="myChart" width="400" height="400"></canvas>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
$('document').ready(function(){
    var data;
    $('.load').hide();
    $.ajax({
        url:'getstatistik',
        method:'GET',
        beforeSend:function(){
            $('.load').show();
        },
        success:function(val){
            var items = {}, base, key;
            $.each(val, function(index, data) {
                key = data.jenis_pekerjaan;
                if (!items[key]) {
                    items[key] = 0;
                }
                items[key] += 1;
            });

            var outputArr = [];
            var labelArr = [];
            $.each(items, function(key, data) {
                outputArr.push(data);
            });
            console.log(labelArr);
            $('.load').hide();
            var ctx = $("#myChart");
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: [
                        "Belum/Tidak Bekerja", 
                        "Mengurus Rumah Tangga", 
                        "Pelajar/Mahasiswa", 
                        "Pensinuan", 
                        "Pegawai Negri Sipil", 
                        "Tentara Nasional Indonesia",
                        "Kepolisian RI",
                        "Perdagangan",
                        "Petani/Pekebun",
                        "Peternak",
                        "Industri",
                        "Konstruksi",
                        "Transportasi",
                        "Karyawan Swasta",
                        "Karyawan BUMN",
                        "Karyawan BUMD",
                        "Karyawan Honorer",
                        "Buruh Harian Lepas",
                        "Buruh Tani / Perkebunan",
                        "Buruh Nelayan / Perikanan",
                        "Buruh Peternakan",
                        "Pembantu Rumah Tangga",
                        "Penata Rambut",
                        "Seniman",
                        "Pendeta",
                        "Wartawan",
                        "Ustadz/Mubaligh",
                        "Dosen",
                        "Guru",
                        "Bidan",
                        "Perawat",
                        "Penyiar Televisi",
                        "Pelaut",
                        "Sopir",
                        "Pedagang",
                        "Perangkat Desa",
                        "Wiraswasta",
                    ],
                    datasets: [{
                        label: 'Total',
                        data: outputArr,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                        ],
                        borderColor: [
                            'rgba(255,99,132,1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(255,99,132,1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(255,99,132,1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(255,99,132,1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(75, 192, 192, 0.2)',
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true
                            }
                        }]
                    }
                }
            });
        }
    })
    
})
</script>        
@endsection