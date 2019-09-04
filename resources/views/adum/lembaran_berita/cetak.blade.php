<html>
    <head>
        <title>Cetak</title>
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    </head>
    <body>
        <div class="row">
            <div class="col-md-8">
                <p style="margin-top: 10px;font-size: 12px; text-align: center;font-weight: bold">BUKU AGENDA DESA</p>
                <table class="table table-bordered table-condensed" style="font-size: 10px">
                    <tr>
                        <th rowspan="2" style="width: 25px;text-align: center">NOMOR URUT</th>
                        <th rowspan="2" style="width: 100px; text-align: center">TANGGAL PENERIMAAN/PENGIRIMAN SURAT</th>
                        <th colspan="4" style="text-align: center">SURAT MASUK</th>
                        <th colspan="4" style="text-align: center">SURAT KELUAR</th>
                        <th rowspan="2" style="width: 110px; text-align: center">KET</th>
                    </tr>
                    <tr>
                        <th style="text-align:center;vertical-align: middle">NOMOR SURAT</th>
                        <th style="text-align:center;vertical-align: middle">TANGGAL SURAT</th>
                        <th style="text-align:center;vertical-align: middle">PENGIRIM</th>
                        <th style="text-align:center;vertical-align: middle">ISI SINGKAT</th>
                        <th style="text-align:center;vertical-align: middle">NOMOR SURAT</th>
                        <th style="text-align:center;vertical-align: middle">TANGGAL SURAT</th>
                        <th style="text-align:center;vertical-align: middle;width: 90px">DITUJUKAN KEPADA</th>
                        <th style="text-align:center;vertical-align: middle">ISI SINGKAT</th>
                    </tr>
                    @php
                        $no = 1
                    @endphp
                    @foreach ($buku as $value)
                        <tr>
                            <td style="text-align: center">{{ $no++ }}</td>
                            <td>{{ $value->aba_tanggal }}</td>
                            @if ($value->aba_jenis_surat == 1)
                                <td>{{ $value->aba_nomor_surat }}</td>
                                <td>{{ $value->aba_tanggal_surat }}</td>
                                <td>{{ $value->aba_pengirim_surat }}</td>
                                <td>{{ $value->aba_isi_surat }}</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            @else
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>{{ $value->aba_nomor_surat }}</td>
                                <td>{{ $value->aba_tanggal_surat }}</td>
                                <td>{{ $value->aba_penerima_surat }}</td>
                                <td>{{ $value->aba_isi_surat }}</td>
                            @endif
                            <td>{{ $value->aba_keterangan_surat }}</td>
                        </tr>
                    @endforeach
                </table>
                <br>
                <table class="table table-condensed" style="font-size: 12px;">
                    <tr>
                        <td style="text-align: center;border: 0"><u>MENGETAHUI</u><br>KEPALA DESA</td>
                        <td style="text-align: center;border: 0">..............., ....................<br>SEKRETARIS DESA</td>
                    </tr>
                    <tr>
                        <td style="text-align:center;border: 0"><br><br><br>(.........................................)</td>
                        <td style="text-align:center;border: 0"><br><br><br>(.........................................)</td>
                    </tr>
                </table>
            </div>
        </div>
    </body>
</html>