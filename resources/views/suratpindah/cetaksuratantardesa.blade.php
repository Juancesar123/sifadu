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
    width: 20%;
    text-align: left;
    margin-left: 50px;
    }

    .label-daerah-kec {
        width: 20%;
        text-align: left;
        margin-left: 50px;
    }
    .header-kanan {
        position: absolute;
        right: -2px;
        top: 90px;
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
<input type="text" value="F.1-23" class="code">
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
    <div class="row">
        <div class="col label" style="font-size:11px">PROVINSI</div>
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
        <div class="col label" style="font-size:11px">KABUPATEN/KOTA</div>
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

    <div class="header-wni">
        <h3><b>FORMULIR PERMOHONAN PINDAH DATANG WNI</b></h3>
        <p class="header-text-wni">Antar Desa / Kelurahan Dalam Satu Kecamatan <br>
         NOMOR: 4+A175/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/ Pemdes/ 20l8</p>
    </div>

    <!-- DATA DAERAH ASAL -->
    <h5 class="caption"><b>DATA DAERAH ASAL</b></h5>
    <div class="row">
        <div class="col number">1.</div>
        <div class="col label">Nomor Kartu Keluarga</div>
        <table class="nokk"><tr>
        <?php
                    $string = $nokk;
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
        <div class="col number">2.</div>
        <div class="col label">Nama Kepala Keluarga</div>
        <input type="text" class="data" value="{{$nama_ayah}}">
    </div>
    <div class="row" style="margin-top:8px;">
        <div class="col number">3.</div>
        <div class="col label">Alamat</div>
        <input type="text" class="data" value="{{$alamat}}">
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
        <div class="col label-daerah">Dusun/Dukuh/Kampung</div>
        <input type="text" class="data-daerah" value="{{ env('DESA_NAME') }}" style="width:530px;">
    </div>

    <div class="row">
        <div class="col label-daerah">a.Desa/Kelurahan</div>
        <input type="text" class="data-daerah" value="{{ env('DESA_NAME') }}">
        <div class="col label-daerah-second">c.Kab/Kota</div>
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
    <div class="row" style="margin-top:10px;">
        <div class="col number">4.</div>
        <div class="col label">NIK Pemohon</div>
        <table class="nokk"><tr>
        <?php
                    $string = $nik;
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
        <div class="col number">5.</div>
        <div class="col label">Nama Lengkap</div>
        <input type="text" class="data" value="{{$nama}}">
    </div>

    <!-- DATA DAERAH TUJUAN -->
    <br>
    <br>
    <h5 class="caption"><b>DATA DAERAH TUJUAN</b></h5>
    <div class="row">
        <div class="col number-5">1.</div>
        <div class="col label">Status No KK <br> Bagi Yang Pindah</div>
        <div class="data-value">
        <input type="text" value="2" class="value">
        </div>
            <div class="ul-2" style="margin-top:8px">
            <ul>
                <li style="width:100px">1. Numpang KK</li>
                <li>2. Membuat KK Baru</li>
                <li style="width:230px">3. Nama Kep.Keirg dan No.KK Tetap</li>
            </ul>
            </div>
    </div>
    <div class="row" style="margin-top:-5px;">
        <div class="col number">2.</div>
        <div class="col label">Nomor Kartu Keluarga</div>
        <table class="nokk"><tr>
        <?php
                    $string = $nokk;
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
        <div class="col label">NIK Kepala Keluarga</div>
        <table class="nokk"><tr>
        <?php
                    $string = $nik;
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
        <div class="col number">4.</div>
        <div class="col label">Nomor Kartu Keluarga</div>
        <table class="nokk"><tr>
        <?php
                    $string = $nokk;
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
        <div class="col number">5.</div>
        <div class="col label">Tanggal Kedatangan</div>
        <table class="nokk"><tr>
        <?php
                $string = "090989";
                $panjang = strlen($string);
                $split = str_split($string);
        ?>
        <td><?php echo $split[0] ?></td>
        <td><?php echo $split[1] ?></td>
        <td style="border:none">&nbsp;</td>
        <td><?php echo $split[2] ?></td>
        <td><?php echo $split[3] ?></td>
        <td style="border:none">&nbsp;</td>
        <td><?php echo $split[4] ?></td>
        <td><?php echo $split[5] ?></td>
        </tr></table>
    </div>
        <div class="row">
        <div class="col number">6.</div>
        <div class="col label">Alamat</div>
        <input type="text" class="data-pindah" value="KP.{{ env('DESA_NAME') }} GIRANG">
        <table class="RT">
            <tr>
                <td style="border:none">RT</td>
                <td>0</td>
                <td>1</td>
                <td>4</td>
                <td style="border:none">RW</td>
                <td>0</td>
                <td>0</td>
                <td>6</td>
            </tr>
        </table>
    </div>
    <div class="row">
        <div class="col label-daerah">Dusun/Dukuh/Kampung</div>
        <input type="text" class="data-daerah" value="{{ env('DESA_NAME') }}" style="width:530px;">
    </div>
    <div class="row">
        <div class="col label-daerah">a.Desa/Kelurahan</div>
        <input type="text" class="data-daerah" value="NAGRAK UTARA">
        <div class="col label-daerah-second">c.Kab/Kota</div>
        <input type="text" class="data-daerah-second" value="SUKABUMI">
    </div>

    <div class="row">
        <div class="col label-daerah-kec">b.Kecamatan</div>
        <input type="text" class="data-daerah" value="NAGRAK">
        <div class="col label-daerah-second">d.Provinsi</div>
        <input type="text" class="data-daerah-second" value="JAWA BARAT">
    </div>
    <br>
    <div class="row">
        <div class="col number">7.</div>
        <div class="col label">Keluarga Yang Datang</div>
    </div>

    <!-- TABEL DATA DAFTAR PINDAH -->
    <table border="1" style="text-align:center">
        <thead>
            <tr>
                <th>No</th>
                <th colspan="16">NIK</th>
                <th width="150">NAMA</th>
                <th width="150">MASA BERLAKU <br>KTP S/D</th>
                <th>SHDK</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <?php
                    $string = $nik;
                    $panjang = strlen($string);
                    $split = str_split($string);
                    $a=0;
                ?>
                <?php while($a < $panjang){ ?>
                <td><?php echo $split[$a] ?></td>
                <?php $a++; }?>
                <td>{{$nama}}</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>2</td>
                <td>&nbsp;</td>
                <?php
                    $string = "                ";
                    $panjang = strlen($string);
                    $split = str_split($string);
                    $a=0;
                ?>
                <?php while($a < $panjang){ ?>
                <td><?php echo $split[$a] ?></td>
                <?php $a++; }?>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>3</td>
                <td>&nbsp;</td>
                <?php
                    $string = "                ";
                    $panjang = strlen($string);
                    $split = str_split($string);
                    $a=0;
                ?>
                <?php while($a < $panjang){ ?>
                <td><?php echo $split[$a] ?></td>
                <?php $a++; }?>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>4</td>
                <td>&nbsp;</td>
                <?php
                    $string = "                ";
                    $panjang = strlen($string);
                    $split = str_split($string);
                    $a=0;
                ?>
                <?php while($a < $panjang){ ?>
                <td><?php echo $split[$a] ?></td>
                <?php $a++; }?>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>5</td>
                <td>&nbsp;</td>
                <?php
                    $string = "                ";
                    $panjang = strlen($string);
                    $split = str_split($string);
                    $a=0;
                ?>
                <?php while($a < $panjang){ ?>
                <td><?php echo $split[$a] ?></td>
                <?php $a++; }?>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>6</td>
                <td>&nbsp;</td>
                <?php
                    $string = "                ";
                    $panjang = strlen($string);
                    $split = str_split($string);
                    $a=0;
                ?>
                <?php while($a < $panjang){ ?>
                <td><?php echo $split[$a] ?></td>
                <?php $a++; }?>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>7</td>
                <td>&nbsp;</td>
                <?php
                    $string = "                ";
                    $panjang = strlen($string);
                    $split = str_split($string);
                    $a=0;
                ?>
                <?php while($a < $panjang){ ?>
                <td><?php echo $split[$a] ?></td>
                <?php $a++; }?>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
        </tbody>
    </table>
    <!-- FOOTER -->
    <div class="footer">
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
    <p style="position:absolute;bottom:-15px;clear:both"> Keterangan : <br>*)Diisi Oleh Petugas;</p>
</body>
</html>