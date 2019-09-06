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
        <div class="form-group">
                <div style="text-align: left">
                    <img style="width: 70px;height: auto" src="{{asset('img/2191f-lambang_kab_sukabumi.svg_-2-e1532000502726-232x300.png')}}" alt="">
                </div>
                <div style="text-align: center; margin-top:-90px">
                    <div style="font-size: 16px;font-weight: bold">
                        Pemerintah Kabupaten Sukabumi
                        <p style="font-size:16px;font-weight:bold">
                            DINAS KEPENDUDUKAN DAN CATATAN SIPIL
                        </p>
                        <P style="font-size:12px;font-weight:normal">
                            Jalan Raya Rambai No. 70 Cisaat Telp.(0266) 211075 sukabumi
                        </P>

                                <div colspan="2" >
                                    <hr style="border-style:double;border-width: 2px; width:100%">
                                </div>

                    </div>
                    <div class="form-group">
                            <h5><u><b>SURAT PENGANTAR MOHON SKCK</b></u></h5>
                            <p>Nomor : {{ $coveringLetter->nomor_surat }}/{{ date_format($coveringLetter->created_at, "Y") }}</p>
                        </div>
                </div>
            </div>

    <table class="w-100">
        <tr>
            <td style="width:80%;">
                <p>Dengan ini menerangkan bahwa :</p>
            </td>
        </tr>
    </table>
    <br>
    <table class="w-40" style="margin-left:45px">
        <tr>
            <td style="width:40%;">
                <p>NAMA LENGKAP</p>
            </td>
            <td style="width:20%;">
                <table class="text-center">
                    <tr>
                        <td>
                            :
                        </td>
                    </tr>
                </table>
            </td>
            <td>
                <table class="w-10" style="margin-left:-78px">
                    <tr>
                        <td>{{ strtoupper($coveringLetter->datapenduduk->nama_lengkap) }}</td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td style="width:40%;">
                <p>JENIS KELAMIN</p>
            </td>
            <td style="width:20%;">
                <table class="text-center">
                    <tr>
                        <td>
                            :
                        </td>
                    </tr>
                </table>
            </td>
            <td style="width:40%;">
                <table class="w-100" style="margin-left:-78px">
                    <tr>
                        <td>
                            @if($coveringLetter->datapenduduk->jenis_kelamin === '1')
                                LAKI-LAKI
                            @else
                                PEREMPUAN
                            @endif
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
                <td style="width:40%;">
                    <p>JENIS KELAMIN</p>
                </td>
                <td style="width:20%;">
                    <table class="text-center">
                        <tr>
                            <td>
                                :
                            </td>
                        </tr>
                    </table>
                </td>
                <td style="width:40%;">
                    <table class="w-100" style="margin-left:-78px">
                        <tr>
                            <td>
                                {{ $coveringLetter->datapenduduk->agama }}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        <tr>
            <td style="width:40%;">
                <p>STATUS</p>
            </td>
            <td style="width:20%;">
                <table class="text-center">
                    <tr>
                        <td>
                         :
                        </td>
                    </tr>
                </table>
            </td>
            <td style="width:40%;">
                <table class="w-100" style="margin-left:-78px">
                    <tr>
                        <td>{{ $coveringLetter->datapenduduk->status_kawin }}</td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td style="width:30%;">
                <p>KTP</p>
            </td>
            <td style="width:20%;">
                <table class="text-center">
                    <tr>
                        <td>
                         :
                        </td>
                    </tr>
                </table>
            </td>
            <td style="width:40%;">
                <table class="w-100" style="margin-left:-78px">
                    <tr>
                        <td>{{ $coveringLetter->datapenduduk->nik }}</td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td style="width:30%;">
                <p>TEMPAT, TGL LAHIR</p>
            </td>
            <td style="width:20%;">
                <table class="text-center">
                    <tr>
                        <td>
                         :
                        </td>
                    </tr>
                </table>
            </td>
            <td style="width:40%;">
                <table class="w-100" style="margin-left:-78px">
                    <tr>
                        <td>{{ $coveringLetter->datapenduduk->tempat_lahir }}, {{ $coveringLetter->datapenduduk->tanggal_lahir }}</td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td style="width:30%;">
                <p>PEKERJAAN</p>
            </td>
            <td style="width:20%;">
                <table class="text-center">
                    <tr>
                        <td>
                         :
                        </td>
                    </tr>
                </table>
            </td>
            <td style="width:40%;">
                <table class="w-100" style="margin-left:-78px">
                    <tr>
                        <td></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td style="width:30%;">
                <p>ALAMAT</p>
            </td>
            <td style="width:20%;">
                <table class="text-center">
                    <tr>
                        <td>
                         :
                        </td>
                    </tr>
                </table>
            </td>
            <td style="width:40%;">
                <table class="w-100" style="margin-left:-78px">
                    <tr>
                        <td>{{ $coveringLetter->datapenduduk->alamat }}</td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td style="width:30%;">
                <p>KEPERLUAN</p>
            </td>
            <td style="width:20%;">
                <table class="text-center">
                    <tr>
                        <td>
                         :
                        </td>
                    </tr>
                </table>
            </td>
            <td style="width:40%;">
                <table class="w-100" style="margin-left:-78px">
                    <tr>
                        <td>{{ $coveringLetter->keperluan  }}</td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td style="width:30%;">
                <p>KETERANGAN LAIN</p>
            </td>
            <td style="width:20%;">
                <table class="text-center">
                    <tr>
                        <td>
                         :
                        </td>
                    </tr>
                </table>
            </td>
            <td style="width:40%;">
                <table class="w-100" style="margin-left:-78px">
                    <tr>
                        <td>{{ $coveringLetter->keterangan }}</td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td style="width:30%;">
                <p>BERLAKU MULAI</p>
            </td>
            <td style="width:20%;">
                <table class="text-center">
                    <tr>
                        <td>
                         :
                        </td>
                    </tr>
                </table>
            </td>
            <td style="width:40%;">
                <table class="w-100" style="margin-left:-78px">
                    <tr>
                        <td>{{ date_format(date_create($coveringLetter->start_date), "d M Y") }} s/d {{ date_format(date_create($coveringLetter->end_date), "d M Y") }}</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <br>
    <table class="w-100">
        <tr>
            <td style="width:80%;">
                <p>Demikian Surat Keterangan ini dibuat untuk digunakan seperlunya.</p>
            </td>
        </tr>
    </table>
    <br>
    <table class="w-100">
        <tr>
            <td class="text-left" width="60%">
                <table>
                    <tr>
                        <td>
                            Pemohon
                        </td>
                    </tr>
                    <tr>
                        <td>
                        &nbsp;
                        </td>
                    </tr>
                    <tr>
                            <td>
                            &nbsp;
                            </td>
                        </tr>
                        <tr>
                                <td>
                                &nbsp;
                                </td>
                            </tr>
                    <tr>
                      <td>
                          <b>{{ $coveringLetter->datapenduduk->nama_lengkap }}</b>
                        </td>
                    </tr>
                </table>
            </td>
            <td class="text-right">
                <table class="text-center"  width="250px">
                    <tr rowspan="2">
                        <td>
                            Pada Tanggal, {{ date_format(date_create($coveringLetter->created_at), "d M Y")}}
                        </td>
                    </tr>
                    <tr><td>Kepala Desa {{ env('DESA_NAME') }}</td></tr>
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>
                            <b>SUTELO</b>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

</body>
</html>