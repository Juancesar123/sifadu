<table style="width:100%">
        <tbody>
            <tr>
                <td style="text-align: center;padding-bottom: 30px">
                    <img style="width: 110px;height: auto" src="{{asset('img/garuda-bhineka-tunggal-ika.png')}}" alt="">
                </td>
            </tr>
            <tr>
                <td style="text-align: center;padding-top: 20px">
                    <div style="font-size: 20px;font-weight: bold">
                        KEPALA DESA {{ env('DESA_NAME') }}		    						</div>
                </td>
            </tr>
            <tr>
                <td style="text-align: center;padding-top: 30px">
                    <div style="font-size: 20px;">
                        <strong>S U R A T &nbsp;  P E N G A N T A R </strong><br>
                        <span style="font-size: 15px">Nomor : {{$suratpengantarkk->nomor_surat}}</span>
                    </div>
                </td>
            </tr>
            <tr style="padding-left: 30px;">
                <td style="text-align: left;padding-top: 20px;padding-bottom: 20px">
                    <div style="font-size: 15px;">
                        Yang bertandatangan dibawah ini :
                        <br>
                        <br>
                        <table style="width: 100%">
                            <tbody>
                                <tr>
                                    <td style="width: 150px;padding-left: 20px">Nama</td>
                                    <td>: <strong>ASEP SAEPUDIN</strong></td>
                                </tr>
                                <tr>
                                    <td style="width: 150px;padding-left: 20px">Jabatan</td>
                                    <td>: KEPALA DESA</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </td>
            </tr>
            <tr style="padding-left: 30px;">
                <td style="text-align: left;padding-bottom: 20px">
                    <div style="font-size: 15px;">
                        Dengan ini menerangkan bahwa :
                        <br>
                        <br>
                        <table style="width: 100%">
                            <tbody>
                                <tr>
                                    <td style="width: 150px;">Nama</td>
                                <td>: <strong>{{$suratpengantarkk->nik_atau_nama}}</strong></td>
                                </tr>
                                <tr>
                                    <td style="width: 150px;">Kelahiran</td>
                                    <td>: jakarta, 2010-06-01</td>
                                </tr>
                                <tr>
                                    <td style="width: 150px;">Jenis Kelamin</td>
                                    <td>: Laki-laki</td>
                                </tr>
                                <tr>
                                    <td style="width: 150px;">Warga Negara</td>
                                    <td>: WNI</td>
                                </tr>
                                <tr>
                                    <td style="width: 150px;">Agama</td>
                                    <td>: Islam</td>
                                </tr>
                                <tr>
                                    <td style="width: 150px;">NIK</td>
                                    <td>: </td>
                                </tr>
                                <tr>
                                    <td style="width: 150px;">Pekerjaan</td>
                                    <td>: Buruh</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </td>
            </tr>
            <tr style="padding-left: 30px;">
                <td style="text-align: left;padding-bottom: 20px">
                    <div style="font-size: 15px">
                        Orang  tersebut diatas, adalah benar Warga Desa {{ env('DESA_NAME') }} Kecamatan NAGRAK Kabupaten SUKABUMI berdomisili di DUSUN II. Surat pengantar ini dibuat sebagai kelengkapan pengurusan <strong>KK (Kartu Keluarga)</strong>.
                    </div>
                </td>
            </tr>
            <tr style="padding-left: 30px;">
                <td style="text-align: left;padding-bottom: 20px">
                    <div style="font-size: 15px">
                        Demikian Surat Pengantar ini dibuat untuk dipergunakan seperlunya.
                    </div>
                </td>
            </tr>
            <tr style="padding-left: 30px;">
                <td style="text-align: center;padding-bottom: 20px">
                    <div style="font-size: 15px;margin-left: 50%">
                        <p>Karang Mulya</p>

                        KEPALA DESA {{ env('DESA_NAME') }}										<br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <strong><u>ASEP SAEPUDIN</u></strong>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>