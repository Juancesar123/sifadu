<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-size: 11pt;
            font-family: "Source Sans Pro" sans-serif !important;
        }
        table {
           border-collapse: collapse;
        }
        .w-100 {
            width: 100% !important;
        }
        .text-center {
            text-align: center;
        }
        .text-right {
            text-align: right;
        }
        .p-0 {
            padding: 0 !important;
        }
        .p-1 {
            padding: .5em !important;
        }
        .py-1 {
            padding: .5em initial !important;
        }
        .px-1 {
            padding: initial .5em !important;
        }
        body {
            margin-left: -50px;
        }
        .b-1 {
            border: 1px solid #333;
        }
        .fs-12 {
            font-size: 12pt !important;
        } 
        .fs-10 {
            font-size: 10pt !important;
        } 
        .fs-8 {
            font-size: 8pt !important;
        } 
    </style>
    <style>
        .box tr td {
            width: 20px;
            height: 10px;
            border: .5px solid #333;
            font-size: 10pt !important;
        }
    </style>
</head>
<body>
    <div class="w-100 text-center p-1">
        <b>FORMULIR PERMOHONAN PEREKAMAN KARTU TANDA PENDUDUK ELEKTRONIK (KTP-EL)</b>
    </div>
    <div class="b-1 p-1 fs-8">
        <b>Perhatian :</b><br>
        <i>
            1. Harus di isi dengan HURUP CETAK dan menggunakan TINTA HITAM.<br>
            2. Untuk kolom pilihan, harap beri tansa silang (X) pada kolom pilihan.<br>																				
            3. Setelah formulir diisi dan ditandatangani, harap diserahkan kembali ke kantor desa/kelurahan.<br>
        </i>
    </div>
    <br>
    <table class="w-100">
        <tr>
            <td style="width:40%;">
                <b>PEMERINTAH PROVINSI</b>
            </td>
            <td style="width:20%;">
                <table class="box text-center">
                    <tr>
                        <td>
                            3
                        </td>
                        <td>
                            2
                        </td>
                    </tr>
                </table>
            </td>
            <td style="width:40%;">
                <table class="w-100 box">
                    <tr>
                        <td>JAWA BARAT</td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td style="width:40%;">
                <b>PEMERINTAH KABUPATEN/KOTA</b>
            </td>
            <td style="width:20%;">
                <table class="box text-center">
                    <tr>
                        <td>
                            0
                        </td>
                        <td>
                            2
                        </td>
                    </tr>
                </table>
            </td>
            <td style="width:40%;">
                <table class="w-100 box">
                    <tr>
                        <td>SUKABUMI</td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td style="width:40%;">
                <b>KECAMATAN</b>
            </td>
            <td style="width:20%;">
                <table class="box text-center">
                    <tr>
                        <td>
                            1
                        </td>
                        <td>
                            2
                        </td>
                    </tr>
                </table>
            </td>
            <td style="width:40%;">
                <table class="w-100 box">
                    <tr>
                        <td>NAGRAK</td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td style="width:40%;">
                <b>DESA/KELURAHAN</b>
            </td>
            <td style="width:20%;">
                <table class="box text-center">
                    <tr>
                        <td>
                            2
                        </td>
                        <td>
                            0
                        </td>
                        <td>
                            0
                        </td>
                        <td>
                            4
                        </td>
                    </tr>
                </table>
            </td>
            <td style="width:40%;">
                <table class="w-100 box">
                    <tr>
                        <td>CISARUA</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <br>
    <table class="w-100">
        <tr>
            <td style="width:28%;">
                <table class="w-100 box">
                    <tr>
                        <td class="px-1">NAMA</td>
                    </tr>
                </table>
            </td>
            <td style="width:2%;">
            </td>
            <td style="width:68%;">
                <table class="w-100 box">
                    <tr>
                        <td class="px-1">{{ $name }}</td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td style="width:28%;">
                <table class="w-100 box">
                    <tr>
                        <td class="px-1">NO. KK</td>
                    </tr>
                </table>
            </td>
            <td style="width:2%;">
            </td>
            <td style="width:68%;">
                <table class="w-100 box">
                    <tr>
                        <td class="px-1">{{ $familyCode }}</td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td style="width:28%;">
                <table class="w-100 box">
                    <tr>
                        <td class="px-1">NIK</td>
                    </tr>
                </table>
            </td>
            <td style="width:2%;">
            </td>
            <td style="width:68%;">
                <table class="w-100 box">
                    <tr>
                        <td class="px-1">{{ $code }}</td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td style="width:28%;">
                <table class="w-100 box">
                    <tr>
                        <td class="px-1">ALAMAT</td>
                    </tr>
                </table>
            </td>
            <td style="width:2%;">
            </td>
            <td style="width:68%;">
                <table class="w-100 box">
                    <tr>
                        <td class="px-1">{{ $address }}</td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td style="width:28%;">
            </td>
            <td style="width:2%;">
            </td>
            <td style="width:68%;">
                <table class="w-100">
                    <tr>
                        <td>
                            <table class="box">
                                <tr>
                                    <td class="px-1">RT</td>
                                </tr>
                            </table>
                        </td>
                        <td>
                            <table class="box">
                                <tr>
                                    @foreach($neighborhoodAssn as $char)
                                    <td class="px-1">{{ $char }}</td>
                                    @endforeach
                                </tr>
                            </table>
                        </td>
                        <td>
                            <table class="box">
                                <tr>
                                    <td class="px-1">RW</td>
                                </tr>
                            </table>
                        </td>
                        <td>
                            <table class="box">
                                <tr>
                                    @foreach($citizenhoodAssn as $char)
                                    <td class="px-1">{{ $char }}</td>
                                    @endforeach
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>

            </td>
        </tr>
    </table>
    <br>
    <table class="w-100">
        <tr>
            <td width="60%">
                <table>
                    <tr>
                        <td>
                            No. Registrasi
                        </td>
                        <td>
                            :
                        </td>
                        <td>
                            {{ $letterNumber }}/DESA/{{date_format($datecreate, 'Y') }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Tanggal
                        </td>
                        <td>
                            :
                        </td>
                        <td>
                            {{ date_format($datecreate, 'd M Y') }}
                        </td>
                    </tr>
                </table>
            </td>
            <td class="text-right">
                <table class="text-center"  width="250px">
                    <tr rowspan="2">
                        <td>
                            Pemohon,
                        </td>
                    </tr>
                    <tr><td>&nbsp;</td></tr>
                    <tr>
                        <td>
                            <b>{{ $name }}</b>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <br>
    <table class="w-100">
        <tr>
            <td width="60%">
                <div class="fs-8">
                    Catatan : <br>
                    <i>
                        * Membawa Pas Foto Berwarana terbaru 4x6 ( 2 Lembar ) <br>             
                        * Bagi KTP yang hilang harap membawa surat kehilangan dari kepolisian <br>
                        * Untuk perbaikan Status harap membawa Foto Copy Surat Nikah <br>
                    </i>
                </div>
            </td>
            <td class="text-right">
                <table class="text-center" width="250px">
                    <tr rowspan="3">
                        <td class="fs-12">
                            Mengetahui, <br>
                            <b>Kepala Desa Cisarua</b>
                        </td>
                    </tr>
                    <tr><td>&nbsp;</td></tr>
                    <tr><td>&nbsp;</td></tr>
                    <tr>
                        <td class="fs-12">
                            <b>KOSASIH</b>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>