<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
     <meta name="description" content="Cetak Surat Pengantar Pindah">
  <meta name="keywords" content="surat">
  <meta name="author" content="Dodi">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style-suratpindah.css">
    <title>Document</title>
</head>
<body>
    <!-- HEADER -->
    <input type="text" value="F-1.09 B" class="code">
    <div id="header">
        <img src="img/logo-surat.png" alt="logo">
        <h2><b>PEMERINTAH KABUPATEN SUKABUMI<br>
        DINAS KEPENDUDUKAN DAN CATATAN SIPIL</b><br>
        </h2>
        <p>Jl. Raya Rambay No. 70 Cisaat Telp. (0266) 211075 Sukabumi</p>
        <hr id="header1">
        <hr id="header2">

    <h4><b>KETERANGAN PINDAH DATANG WNI ANTAR KAB/KOTA/PROVINSI</b></h4>
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

    <div class="row">
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

    <!-- DATA KEPINDAHAN -->
    <br>
    <br>
    <h5 class="caption"><b>DATA KEPINDAHAN</b></h5>
    <div class="row">
        <div class="col number">1.</div>
        <div class="col label">Alasan Pindah</div>
        <div class="data-value">
        <input type="text" value="5" class="value">
        </div>
            <div class="ul">
            <ul>
                <li>1. Pekerjaan</li>
                <li>3. Keamanan</li>
                <li>5. Perumahan</li>
                <li style="width:140px">7. Lainnya(sebutkan)</li>
            </ul>
            <ul class="ul-second">
                <li>2. Pendidikan</li>
                <li>4. Kesehatan</li>
                <li>6. Keluarga</li>
                <li style="text-align:center;width:140px">..............</li>
            </ul>
            </div>
        </div>

        <br>

        <div class="row">
        <div class="col number">2.</div>
        <div class="col label">Alamat Tujuan Pindah</div>
        <input type="text" class="data-pindah" value="PERUM GRIYA FAMILIY BLOK A3 NO. 12 KP. CIBEBER JL. KLAPANUNGGAL">
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

    <br>

    <div class="row">
        <div class="col label-daerah">a.Desa/Kelurahan</div>
        <input type="text" class="data-daerah" value="CIKAHURIPAN">
        <div class="col label-daerah-second">c.Kab/Kota</div>
        <input type="text" class="data-daerah-second" value="BOGOR">
    </div>

    <div class="row">
        <div class="col label-daerah-kec">b.Kecamatan</div>
        <input type="text" class="data-daerah" value="KELAPANUNGGAL">
        <div class="col label-daerah-second">d.Provinsi</div>
        <input type="text" class="data-daerah-second" value="JAWA BARAT">
    </div>

    <div class="row">
        <table id="kodepos">
            <tr>
                <td style="border:none">Kode Pos </td>
                <td>1</td>
                <td>6</td>
                <td>7</td>
                <td>1</td>
                <td>0</td>
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
        <div class="col number">3.</div>
        <div class="col label">Klasifikasi Pindah</div>
        <div class="data-value">
        <input type="text" value="4" class="value">
        </div>
            <div class="ul-2">
            <ul>
                <li style="width:210px">1. Dalam satu Desa/Kelurahan</li>
                <li>3. Antar Kecamatan</li>
                <li>5. Antar Provinsi</li>
            </ul>
            <ul class="ul-second">
                <li style="width:210px">2. Antar Desa/Kelurahan</li>
                <li>4. Antar Kab/Kota</li>
            </ul>
            </div>
        </div>

        <br>

        <div class="row">
        <div class="col number">4.</div>
        <div class="col label">Jenis Kepindahan</div>
        <div class="data-value">
        <input type="text" value="4" class="value">
        </div>
            <div class="ul-2">
            <ul>
                <li style="width:260px">1. Kep.Keluarga</li>
                <li style="width:240px">3. Kep.Keluarga dan Sbg.Angg Keluarga</li>
            </ul>
            <ul class="ul-second">
                <li style="width:260px">2. Kep.Keluarga dan seluruh Angg.Keluarga</li>
                <li>4. Angg Keluarga</li>
            </ul>
            </div>
        </div>

        <br>

        <div class="row">
        <div class="col number-5">5.</div>
        <div class="col label">Status No KK <br>Bagi yang Tidak Pindah</div>
        <div class="data-value">
        <input type="text" value="2" class="value">
        </div>
            <div class="ul-2">
            <ul>
                <li>1. Numpang KK</li>
                <li  style="width:280px">3. Tidak Ada Angg. Keluarga yang ditinggal</li>
            </ul>
            <ul class="ul-second">
                <li>2. Membuat KK Baru</li>
                <li>4. Angg.Keluarga</li>
            </ul>
            </div>
    </div>

    <div class="row">
        <div class="col number-5">6.</div>
        <div class="col label">Status No KK <br> Bagi Yang Pindah</div>
        <div class="data-value">
        <input type="text" value="1" class="value">
        </div>
            <div class="ul-2" style="margin-top:8px">
            <ul>
                <li style="width:100px">1. Numpang KK</li>
                <li>2. Membuat KK Baru</li>
                <li style="width:230px">3. Nama Kep.Keirg dan No.KK Tetap</li>
            </ul>
            </div>
    </div>

    <div class="row">
        <div class="col number">7.</div>
        <div class="col label">Rencana Tgl Pindah</div>
        <table class="nokk"><tr>
        <?php
                $string = $tgl;
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
        <div class="col number">8.</div>
        <div class="col label">Keluarga Yang Pindah</div>
    </div>

    <!-- TABEL DATA DAFTAR PINDAH -->
    <table border="1" style="text-align:center">
        <thead>
            <tr>
                <th>No</th>
                <th colspan="16">NIK</th>
                <th width="280">NAMA</th>
                <th colspan="2">SHDK</th>
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
                <td>0</td>
                <td>4</td>
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
            <tr>
                <td>8</td>
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
                <td>9</td>
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
            <div style="width:23%;float:left;">
                <label>Diketahui Oleh: <br>
                Kepala Dinas Bidang Dafduk <br>
                ub.Kasi........ <br>
                No....Tgl.....20....</label>
                <br>
                <br>
                <br>
                <br>
                (......................) <br>
                <hr>
                NIP.
            </div>
            <div style="width:23%;float:left;margin-left:13px">
                <label>Diketahui Oleh: <br>
                Camat.......... <br>
                No....Tgl.....20....</label>
                <br>
                <br>
                <br>
                <br>
                <br>
                (......................) <br>
                <hr>
                NIP.
            </div>
            <div style="width:23%;float:left;margin-left:13px">
                <label><br><center>Pemohon</center><br><br></label>
                <br>
                <br>
                <br>
                <br>
                <hr>
            </div>
            <div style="width:23%;float:left;margin-left:13px">
                <label>Dikeluarkan Oleh: <br>
                KEPALA DESA {{ env('DESA_NAME') }} <br>
                No.475/....Tgl.19 januari 2018</label>
                <br>
                <br>
                <br>
                <br>
                <br>
                <center><b>KOSASIH</b></center>
                <hr>
            </div>
        </div>
</body>
</html>