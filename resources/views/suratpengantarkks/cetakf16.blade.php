<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style-suratpindah.css">
    <title>Document</title>
</head>
<style type="text/css">
    .label-daerah {
    width: 10%;
    text-align: left;
    margin-left: 100px;
    }

    .label-daerah-kec {
        width: 10%;
        text-align: left;
        margin-left: 100px;
    }
    .header-kanan {
        position: absolute;
        right: -2px;
        top: 167px;
    }
    .header-wni {
        text-align: center;
        margin-top: -15px;
    }
    .header-text-wni {
        margin-top: -15px;
    }
    img {
    float: left;
    padding: 0;
    width: 80px;
    height: 75px;
    margin: 0 auto;
}
</style>
<body style="font-size:11.60px">
<input type="text" value="F-1.16" class="code">
    <div id="header">
        <img src="img/logo-surat.png" alt="logo">
        <h2><b>PEMERINTAH KABUPATEN SUKABUMI<br>
        DINAS KEPENDUDUKAN DAN CATATAN SIPIL</b><br>
        </h2>
        <p>Jl. Raya Rambay No. 70 Cisaat Telp. (0266) 211075 Sukabumi</p>
        <hr id="header1">
        <hr id="header2">
    </div>
    <!-- HEADER -->
    <div class="header-wni">
        <h3><b>FORMULIR PERMOHONAN PERUBAHAN KARTU KELUARGA(KK) WARGA NEGARA INDONESIA</b></h3>
    </div>

    <div class="row" style="width: 1600px !important;margin-top: -13px;">
    <div class="col label" style="font-size:11px"><b>Perhatian :</b></div><br>
    <div class="col label" style="font-size:11px">1. Harus di isi dengan HURUF CETAK dan menggunakan TINTA HITAM</div><br>
    <div class="col label" style="font-size:11px">2. Setelah formulir diisi dan ditandatangani, harap diserahkan kembali ke kantor desa/kelurahan</div>
    </div>
    <hr>
    <div class="row">
        <div class="col label" style="font-size:11px">PEMERINTAH PROVINSI</div>
        <table class="nokk"><tr>
        <?php
                    $string = "32";
                    $panjang = strlen($string);
                    $split = str_split($string);
                    $a=0;
                ?>
                <?php while($a < $panjang){ ?>
                <td><?php echo $split[$a] ?></td>
                <?php $a++; }?>
        </tr></table>
    </div>
    <div class="row">
        <div class="col label" style="font-size:11px">PEMERINTAH KABUPATEN/KOTA</div>
        <table class="nokk"><tr>
        <?php
                    $string = "02";
                    $panjang = strlen($string);
                    $split = str_split($string);
                    $a=0;
                ?>
                <?php while($a < $panjang){ ?>
                <td><?php echo $split[$a] ?></td>
                <?php $a++; }?>
        </tr></table>
    </div>
    <div class="row">
        <div class="col label" style="font-size:11px">KECAMATAN</div>
        <table class="nokk"><tr>
        <?php
                    $string = "12";
                    $panjang = strlen($string);
                    $split = str_split($string);
                    $a=0;
                ?>
                <?php while($a < $panjang){ ?>
                <td><?php echo $split[$a] ?></td>
                <?php $a++; }?>
        </tr></table>
    </div>
    <div class="row">
        <div class="col label" style="font-size:11px">DESA KELURAHAN</div>
        <table class="nokk"><tr>
        <?php
                    $string = "2004";
                    $panjang = strlen($string);
                    $split = str_split($string);
                    $a=0;
                ?>
                <?php while($a < $panjang){ ?>
                <td><?php echo $split[$a] ?></td>
                <?php $a++; }?>
        </tr></table>
    </div>
    <div class="header-kanan">
        <div class="col number">*)</div>
        <input type="text" style="width:440px;border:1px solid;" value="JAWA BARAT">
        <br>
        <div class="col number">*)</div>
        <input type="text" style="width:440px;border:1px solid;" value="SUKABUMI">
        <br>
        <div class="col number">*)</div>
        <input type="text" style="width:440px;border:1px solid;" value="NAGRAK">
        <br>
        <div class="col number">*)</div>
        <input type="text" style="width:440px;border:1px solid;" value="{{ env('DESA_NAME') }}">
    </div>
    <div class="row" style="margin-top:-4px">
        <div class="col label" style="font-size:11px">DUSUN/DUKUH/KAMPUNG</div>
        <input type="text" style="width:538px;margin-left:-40px;border:1px solid;" value="{{ env('DESA_NAME') }}">
    </div>

    <!-- DATA DAERAH ASAL -->
    <div class="row">
        <div class="col number">1.</div>
        <div class="col label">Nama Lengkap Pemohon</div>
        <input type="text" class="data" value="{{$header['kepala']}}">
    </div>

    <div class="row">
        <div class="col number">2.</div>
        <div class="col label">Nik Pemohon</div>
        <table class="nokk"><tr>
        <?php
                    $string = '111111111111111';
                    $panjang = strlen($string);
                    $split = str_split($string);
                    $a=0;
                ?>
                <?php while($a < $panjang){ ?>
                <td><?php echo $split[$a] ?></td>
                <?php $a++; }?>
        </tr></table>
    </div>

    <div class="row">
        <div class="col number">3.</div>
        <div class="col label">Nama Kepala Keluarga</div>
        <input type="text" class="data" value="{{$header['kepala']}}">
    </div>

    <div class="row">
        <div class="col number">4.</div>
        <div class="col label">No KK</div>
        <table class="nokk"><tr>
        <?php
                    $string = '111111111111111';
                    $panjang = strlen($string);
                    $split = str_split($string);
                    $a=0;
                ?>
                <?php while($a < $panjang){ ?>
                <td><?php echo $split[$a] ?></td>
                <?php $a++; }?>
        </tr></table>
    </div>
    <div class="row" style="margin-top:8px;">
        <div class="col number">5.</div>
        <div class="col label">Alamat Pemohon</div>
        <input type="text" class="data" value="kkkkkkkk">
        <table class="RT">
            <tr>
                <td style="border:none">RT</td>
                <td>0</td>
                <td>0</td>
                <td>5</td>
                <td style="border:none">RW</td>
                <td>0</td>
                <td>0</td>
                <td>3</td>
            </tr>
        </table>
    </div>

    <div class="row">
        <div class="col label-daerah">a.Desa</div>
        <input type="text" class="data-daerah" value="{{ env('DESA_NAME') }}">
        <div class="col label-daerah-second">c.Kabupaten</div>
        <input type="text" class="data-daerah-second" value="SUKABUMI">
    </div>

    <div class="row">
        <div class="col label-daerah-kec">b.Kecamatan</div>
        <input type="text" class="data-daerah" value="NAGRAK">
        <div class="col label-daerah-second">d.Provinsi</div>
        <input type="text" class="data-daerah-second" value="JAWA BARAT">
    </div>

    <div class="row">
        <table id="kodepos">
            <tr>
                <td style="border:none">Kode Pos </td>
                <td>4</td>
                <td>3</td>
                <td>3</td>
                <td>5</td>
                <td>6</td>
            </tr>
        </table>
        <table id="telepon">
            <tr>
                <td style="border:none">Telepon </td>
                <td>0</td>
                <td>8</td>
                <td>2</td>
                <td>3</td>
                <td>4</td>
                <td>6</td>
                <td>7</td>
                <td>8</td>
                <td>9</td>
                <td>0</td>
                <td>8</td>
                <td>7</td>
            </tr>
        </table>
    </div>
    <br>
    <br>
    <div class="row">
        <div class="col number">6.</div>
        <div class="col label">Nama Kepala Keluarga Lama</div>
        <input type="text" class="data" value="kkkkkkk">
    </div>

    <div class="row" style="margin-top:10px;">
        <div class="col number">7.</div>
        <div class="col label">No KK Lama</div>
        <table class="nokk"><tr>
        <?php
                    $string = '111111111111111111';
                    $panjang = strlen($string);
                    $split = str_split($string);
                    $a=0;
                ?>
                <?php while($a < $panjang){ ?>
                <td><?php echo $split[$a] ?></td>
                <?php $a++; }?>
        </tr></table>
    </div>

    <div class="row" style="margin-top:8px;">
        <div class="col number">8.</div>
        <div class="col label">Alamat Keluarga Lama</div>
        <input type="text" class="data" value="kkkkkk">
        <table class="RT">
            <tr>
                <td style="border:none">RT</td>
                <td>0</td>
                <td>0</td>
                <td>5</td>
                <td style="border:none">RW</td>
                <td>0</td>
                <td>0</td>
                <td>3</td>
            </tr>
        </table>
    </div>

    <div class="row">
        <div class="col label-daerah">a.Desa</div>
        <input type="text" class="data-daerah" value="{{ env('DESA_NAME') }}">
        <div class="col label-daerah-second">c.Kabupaten</div>
        <input type="text" class="data-daerah-second" value="SUKABUMI">
    </div>

    <div class="row">
        <div class="col label-daerah-kec">b.Kecamatan</div>
        <input type="text" class="data-daerah" value="NAGRAK">
        <div class="col label-daerah-second">d.Provinsi</div>
        <input type="text" class="data-daerah-second" value="JAWA BARAT">
    </div>

    <div class="row">
        <table id="kodepos">
            <tr>
                <td style="border:none">Kode Pos </td>
                <td>4</td>
                <td>3</td>
                <td>3</td>
                <td>5</td>
                <td>6</td>
            </tr>
        </table>
        <table id="telepon">
            <tr>
                <td style="border:none">Telepon </td>
                <td>0</td>
                <td>8</td>
                <td>2</td>
                <td>3</td>
                <td>4</td>
                <td>6</td>
                <td>7</td>
                <td>8</td>
                <td>9</td>
                <td>0</td>
                <td>8</td>
                <td>7</td>
            </tr>
        </table>
    </div>
    <!-- DATA DAERAH TUJUAN -->
    <br>
    <br>
    <div class="row">
        <div class="col number">9.</div>
        <div class="col label">Alasan Pemohon</div>
        <div class="data-value">
        <input type="text" value="2" class="value">
        </div>
            <div class="ul-2" style="margin-top:-2px">
            <ul>
                <li style="width:400px">1. Karena Penambahan Anggota Keluarga(kelahiran,Kedatangan)</li><br>
                <li style="width:400px">2. Karena Pengurangan Anggota Keluarga(kematian,kepindahan)</li>
                <li style="width:100px;position: absolute;top: 0px;">3. Lainnya</li>
            </ul>
            </div>
    </div>

    <div class="row">
        <div class="col number">10.</div>
        <div class="col label">Jumlah Anggota Keluarga</div>
        <table class="nokk"><tr>
        <?php
                $string = "02";
                $panjang = strlen($string);
                $split = str_split($string);
        ?>
        <td><?php echo $split[0] ?></td>
        <td><?php echo $split[1] ?></td>
        </tr></table>
    </div>

    <div class="row">
        <div class="col number">11.</div>
        <div class="col">DAFTAR ANGGOTA KELUARGA PEMOHON (hanya diisi anggota keluarga saja)</div>
    </div>

    <!-- TABEL DATA DAFTAR PINDAH -->
    <table border="1" style="text-align:center">
        <thead>
            <tr>
                <th colspan="2" width="30">No</th>
                <th colspan="16" width="240">NIK</th>
                <th width="240">Nama Lengkap</th>
                <th colspan="2" width="30">SHDK</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                    <?php
                    $string = '01';
                    $panjang = strlen($string);
                    $split = str_split($string);
                    $a=0;
                ?>
                <?php while($a < $panjang){ ?>
                <td><?php echo $split[$a] ?></td>
                <?php $a++; }?>
                <?php
                    $string = '1111111111111111';
                    $panjang = strlen($string);
                    $split = str_split($string);
                    $a=0;
                ?>
                <?php while($a < $panjang){ ?>
                <td><?php echo $split[$a] ?></td>
                <?php $a++; }?>
                <td>dodi</td>
                    <?php
                    $string = '01';
                    $panjang = strlen($string);
                    $split = str_split($string);
                    $a=0;
                ?>
                <?php while($a < $panjang){ ?>
                <td><?php echo $split[$a] ?></td>
                <?php $a++; }?>
            </tr>
            <tr>
                    <?php
                    $string = '02';
                    $panjang = strlen($string);
                    $split = str_split($string);
                    $a=0;
                ?>
                <?php while($a < $panjang){ ?>
                <td><?php echo $split[$a] ?></td>
                <?php $a++; }?>
                <?php
                    $string = '1111111111111111';
                    $panjang = strlen($string);
                    $split = str_split($string);
                    $a=0;
                ?>
                <?php while($a < $panjang){ ?>
                <td><?php echo $split[$a] ?></td>
                <?php $a++; }?>
                <td>dodi</td>
                    <?php
                    $string = '02';
                    $panjang = strlen($string);
                    $split = str_split($string);
                    $a=0;
                ?>
                <?php while($a < $panjang){ ?>
                <td><?php echo $split[$a] ?></td>
                <?php $a++; }?>
            </tr>
            <tr>
                    <?php
                    $string = '03';
                    $panjang = strlen($string);
                    $split = str_split($string);
                    $a=0;
                ?>
                <?php while($a < $panjang){ ?>
                <td><?php echo $split[$a] ?></td>
                <?php $a++; }?>
                <?php
                    $string = '                ';
                    $panjang = strlen($string);
                    $split = str_split($string);
                    $a=0;
                ?>
                <?php while($a < $panjang){ ?>
                <td><?php echo $split[$a] ?></td>
                <?php $a++; }?>
                <td></td>
                    <?php
                    $string = '  ';
                    $panjang = strlen($string);
                    $split = str_split($string);
                    $a=0;
                ?>
                <?php while($a < $panjang){ ?>
                <td><?php echo $split[$a] ?></td>
                <?php $a++; }?>
            </tr>

            <tr>
                    <?php
                    $string = '04';
                    $panjang = strlen($string);
                    $split = str_split($string);
                    $a=0;
                ?>
                <?php while($a < $panjang){ ?>
                <td><?php echo $split[$a] ?></td>
                <?php $a++; }?>
                <?php
                    $string = '                ';
                    $panjang = strlen($string);
                    $split = str_split($string);
                    $a=0;
                ?>
                <?php while($a < $panjang){ ?>
                <td><?php echo $split[$a] ?></td>
                <?php $a++; }?>
                <td></td>
                    <?php
                    $string = '  ';
                    $panjang = strlen($string);
                    $split = str_split($string);
                    $a=0;
                ?>
                <?php while($a < $panjang){ ?>
                <td><?php echo $split[$a] ?></td>
                <?php $a++; }?>
            </tr>

            <tr>
                    <?php
                    $string = '05';
                    $panjang = strlen($string);
                    $split = str_split($string);
                    $a=0;
                ?>
                <?php while($a < $panjang){ ?>
                <td><?php echo $split[$a] ?></td>
                <?php $a++; }?>
                <?php
                    $string = '                ';
                    $panjang = strlen($string);
                    $split = str_split($string);
                    $a=0;
                ?>
                <?php while($a < $panjang){ ?>
                <td><?php echo $split[$a] ?></td>
                <?php $a++; }?>
                <td></td>
                    <?php
                    $string = '  ';
                    $panjang = strlen($string);
                    $split = str_split($string);
                    $a=0;
                ?>
                <?php while($a < $panjang){ ?>
                <td><?php echo $split[$a] ?></td>
                <?php $a++; }?>
            </tr>

            <tr>
                    <?php
                    $string = '06';
                    $panjang = strlen($string);
                    $split = str_split($string);
                    $a=0;
                ?>
                <?php while($a < $panjang){ ?>
                <td><?php echo $split[$a] ?></td>
                <?php $a++; }?>
                <?php
                    $string = '                ';
                    $panjang = strlen($string);
                    $split = str_split($string);
                    $a=0;
                ?>
                <?php while($a < $panjang){ ?>
                <td><?php echo $split[$a] ?></td>
                <?php $a++; }?>
                <td></td>
                    <?php
                    $string = '  ';
                    $panjang = strlen($string);
                    $split = str_split($string);
                    $a=0;
                ?>
                <?php while($a < $panjang){ ?>
                <td><?php echo $split[$a] ?></td>
                <?php $a++; }?>
            </tr>

            <tr>
                    <?php
                    $string = '07';
                    $panjang = strlen($string);
                    $split = str_split($string);
                    $a=0;
                ?>
                <?php while($a < $panjang){ ?>
                <td><?php echo $split[$a] ?></td>
                <?php $a++; }?>
                <?php
                    $string = '                ';
                    $panjang = strlen($string);
                    $split = str_split($string);
                    $a=0;
                ?>
                <?php while($a < $panjang){ ?>
                <td><?php echo $split[$a] ?></td>
                <?php $a++; }?>
                <td></td>
                    <?php
                    $string = '  ';
                    $panjang = strlen($string);
                    $split = str_split($string);
                    $a=0;
                ?>
                <?php while($a < $panjang){ ?>
                <td><?php echo $split[$a] ?></td>
                <?php $a++; }?>
            </tr>

            <tr>
                    <?php
                    $string = '08';
                    $panjang = strlen($string);
                    $split = str_split($string);
                    $a=0;
                ?>
                <?php while($a < $panjang){ ?>
                <td><?php echo $split[$a] ?></td>
                <?php $a++; }?>
                <?php
                    $string = '                ';
                    $panjang = strlen($string);
                    $split = str_split($string);
                    $a=0;
                ?>
                <?php while($a < $panjang){ ?>
                <td><?php echo $split[$a] ?></td>
                <?php $a++; }?>
                <td></td>
                    <?php
                    $string = '  ';
                    $panjang = strlen($string);
                    $split = str_split($string);
                    $a=0;
                ?>
                <?php while($a < $panjang){ ?>
                <td><?php echo $split[$a] ?></td>
                <?php $a++; }?>
            </tr>

            <tr>
                    <?php
                    $string = '09';
                    $panjang = strlen($string);
                    $split = str_split($string);
                    $a=0;
                ?>
                <?php while($a < $panjang){ ?>
                <td><?php echo $split[$a] ?></td>
                <?php $a++; }?>
                <?php
                    $string = '                ';
                    $panjang = strlen($string);
                    $split = str_split($string);
                    $a=0;
                ?>
                <?php while($a < $panjang){ ?>
                <td><?php echo $split[$a] ?></td>
                <?php $a++; }?>
                <td></td>
                    <?php
                    $string = '  ';
                    $panjang = strlen($string);
                    $split = str_split($string);
                    $a=0;
                ?>
                <?php while($a < $panjang){ ?>
                <td><?php echo $split[$a] ?></td>
                <?php $a++; }?>
            </tr>

            <tr>
                    <?php
                    $string = '10';
                    $panjang = strlen($string);
                    $split = str_split($string);
                    $a=0;
                ?>
                <?php while($a < $panjang){ ?>
                <td><?php echo $split[$a] ?></td>
                <?php $a++; }?>
                <?php
                    $string = '                ';
                    $panjang = strlen($string);
                    $split = str_split($string);
                    $a=0;
                ?>
                <?php while($a < $panjang){ ?>
                <td><?php echo $split[$a] ?></td>
                <?php $a++; }?>
                <td></td>
                    <?php
                    $string = '  ';
                    $panjang = strlen($string);
                    $split = str_split($string);
                    $a=0;
                ?>
                <?php while($a < $panjang){ ?>
                <td><?php echo $split[$a] ?></td>
                <?php $a++; }?>
            </tr>
        </tbody>
    </table>
    <!-- FOOTER -->
    <div class="footer">
            <div style="text-align: right;font-size: 12px;">
                <label>{{ env('DESA_NAME') }},09 Maret 2015</label>
            </div>
            <label style="font-size: 12px;"><center>Mengetahui,</center></label>
            <div style="width:23%;float:left;">
                <label>Kepala Desa Kependudukan dan Catatan Sipil</label>
                <br>
                <br>
                <br>
                <br>
                (......................) <br>
            </div>
            <div style="width:23%;float:left;margin-left:13px">
                <label>Camat</label>
                <br>
                <br>
                <br>
                <br>
                <br>
                (......................) <br>
            </div>
            <div style="width:23%;float:left;margin-left:13px">
                <label><center>Kepala Desa {{ env('DESA_NAME') }}</center></label>
                <br>
                <br>
                <br>
                <br>
                <center><b>KOSASIH</b></center>
            </div>
            <div style="width:23%;float:left;margin-left:13px">
                <label><center>Pemohon,</center></label>
                <br>
                <br>
                <br>
                <br>
                <center><b>ARIES</b></center>
            </div>
        </div>
        <br>
        <div style="width: 400px;clear: both;margin-left:350px;margin-top: 15px;">
            <label>Tanggal pemasukan Data</label><br>
            <div class="row">
                <table style="text-align: center;"><tr>
                <?php
                        $string = "020519";
                        $panjang = strlen($string);
                        $split = str_split($string);
                ?>
                <td style="border: none;">Tgl. </td>
                <td><?php echo $split[0] ?></td>
                <td><?php echo $split[1] ?></td>
                <td style="border: none;width: 10px;">Bln. </td>
                <td><?php echo $split[2] ?></td>
                <td><?php echo $split[3] ?></td>
                <td style="border: none;">Thn. </td>
                <td><?php echo $split[4] ?></td>
                <td><?php echo $split[5] ?></td>
                </tr></table>
            </div>
            <label>Paraf Petugas</label>
            <br>
            <div style="position: absolute;bottom: -25px;">
            <label><center>A.SURYANA</center>
                <hr style="width: 100px;"></label>
        </div>

        </div>


    <!-- <div class="footer">
            <div style="width:23%;float:left;text-align:center;">
                <label>Petugas Registrasi</label>
                <br>
                <br>
                <br>
                <br>
                <br>
                (......................) <br>
            </div>
            <div style="width:23%;float:right;margin-left:13px;text-align:center;">
                <label>{{ env('DESA_NAME') }},08 Januari 2018 <br>Pemohon</label>
                <br>
                <br>
                <br>
                <br>
                (......................) <br>
            </div>
    </div>
    <p style="position:absolute;bottom:-30px;clear:both"> Keterangan : <br>*)Diisi Oleh Petugas;</p> -->
</body>
</html>