<div class="form-group">
    <div style="text-align: left">
        <img style="width: 110px;height: auto" src="{{asset('img/2191f-lambang_kab_sukabumi.svg_-2-e1532000502726-232x300.png')}}" alt="">
    </div>
    <div style="text-align: center; margin-top:-115px">
        <div style="font-size: 20px;font-weight: bold">
            Pemerintah Kabupaten Sukabumi
            <p style="font-size:30px;font-weight:bold">
                DINAS KEPENDUDUKAN DAN CATATAN SIPIL
            </p>	
            <P style="font-size:12px;font-weight:normal">
                Jalan Raya Rambai No. 70 Cisaat Telp.(0266) 211075 sukabumi
            </P>  
            
        </div>
    </div>
</div>
<div class="text-center">
    <div>
        <td colspan="2" >
            <hr style="border-style:double;border-width: 2px; width:100%">  	
        </td>
    </div>
    <div class="form-group">
        <h5><u><b>SURAT PENGANTAR MOHON SKCK</b></u></h5>
        <p>Nomor : {{ $suratketeranganskck->nomor_surat }}/{{ date_format($suratketeranganskck->created_at, "Y") }}</p>
    </div>
</div>
<div style="margin-left:125px">
    <div class="form-group">
        <p>Dengan ini menerangkan bahwa :</p>
    </div>
    <div class="col-md-2" style="margin-left:40px">
        <p>Nama Lengkap</p> 
        <p>Jenis Kelamin</p> 
        <p>Agama</p> 
        <p>Status</p> 
        <p>No KTP / NIK</p> 
        <p>Tempat Tgl Lahir</p> 
        <p>Pekerjaan</p> 
        <p>Alamat</p> 
        <p>Keperluan</p>
        <p>Keterangan Lain</p> 
        <p>Berlaku mulai</p>  
    </div>
    <div class="col-md-1">
        <p>:</p>
        <p>:</p>
        <p>:</p>
        <p>:</p>
        <p>:</p>
        <p>:</p>
        <p>:</p>
        <p>:</p>
        <p>:</p>
        <p>:</p>
        <p>:</p>
    </div>
    <div class="col-md-4" style="margin-left:-78px">
        <p> {{ $suratketeranganskck->datapenduduk->nama_lengkap }}</p>
        <p>@if ($suratketeranganskck->datapenduduk->jenis_kelamin === '1')
            Laki-Laki
            @else
            Perempuan
            @endif
        </p>
        <p>{{ $suratketeranganskck->datapenduduk->agama }}</p>
        <p>{{ $suratketeranganskck->datapenduduk->status_kawin }}</p>
        <p>{{ $suratketeranganskck->datapenduduk->nik }}</p>
        <p>{{ $suratketeranganskck->datapenduduk->tempat_lahir }}, {{ $suratketeranganskck->datapenduduk->tanggal_lahir }}</p>
        <p></p>
        <p>{{ $suratketeranganskck->datapenduduk->alamat }}</p>
        <p>{{ $suratketeranganskck->keperluan }}</p>
        <p>{{ $suratketeranganskck->keterangan }}</p>
        <p>{{ $suratketeranganskck->start_date }} s/d {{ $suratketeranganskck->end_date }}</p>
    </div>
    <div class="col-md-12">
        <p>Demikian Surat Keterangan ini dibuat untuk digunakan seperlunya.</p>
    </div>
    <div class="col-md-6">
        <p>Pemohon</p>
        <br />
        <br>
        <p>{{ $suratketeranganskck->datapenduduk->nama_lengkap }}</p>
        
    </div>
    <div class="col-md-6">
        <p>Pada tanggal     : {{ date_format($suratketeranganskck->created_at, "d M Y") }}</p>
        <p>Kepala Desa Cisarua</p>
        <br />
        <br>
        <p>SUTARNO</p>
    </div>
    
</div>