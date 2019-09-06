<!DOCTYPE html>
<html>
<head>
	<title>KARTU KELUARGA</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
 <style type="text/css">
	/* header */
	.tbheader{font-family:Arial, sans-serif;font-size:7px;}
	.tbheader td{border:1px solid #999999;text-align: center;}
	.tbheader .titikdua {width: 10px; text-align: center;}
	.tbheader .kotak{width: 15px; text-align: center;}
	.tbheader .biasa{text-align: left;}
	/* body */
 	.tbbody{font-family:Arial, sans-serif;font-size:7px;width: 100%;}
	.tbbody td{text-align: center;border:1px solid #999999;}
	/* footer */
	.tbfooter{font-family:Arial, sans-serif;font-size:7px;width: 100%;}
	.tbfooter td{text-align: center;}
 	/* pemisah */
 	div.nomor {
		position: absolute;
		right: 0;
	}
	div.logo{
		position: absolute;
		left: 0;
	}
	div.dinas{
		position: absolute;
		left: 90;
		top: 15;
	}
	div.judul{
		position: absolute;
		width: 100%;
		top: 50;
		font-size: 13px;
	}
	</style>
	<div align="center" style="height:90px;">
		<div class="logo"><img src="{{asset('img/2191f-lambang_kab_sukabumi.svg_-2-e1532000502726-232x300.png')}}" width="70" height="70"></div>
		<div class="dinas">PEMERINTAH KABUPATEN SUKABUMI</div>
		<div class="nomor">F-1.01</div>
		@if($jenis == 0)
			<div class="judul">FORMULIR ISIAN BIODATA PENDUDUK UNTUK WNI ( PER KELUARGA ) SEMENTARA</div>
		@endif
	</div>
			<table class="tbheader">
					<tbody>
						<tr style="background-color:lightgrey;">
							<td class="biasa" style="padding-left: 10px;" colspan="22">I</td>
							<td style="background-color: white"></td>
							<td style="background-color: white"></td>
							<td style="background-color: white"></td>
							<td class="biasa" style="background-color: white" colspan="4">Diisi oleh petugas</td>
						</tr>
						<tr>
							<td colspan="22" class="biasa"><strong>DATA KEPALA KELUARGA</strong></td>
							<td></td>
							<td style="width:100" class="biasa">Kode Nama Propinsi</td>
							<td class="titikdua">:</td>
							<td class="kotak">3</td>
							<td class="kotak">2</td>
							<td class="kotak"></td>
							<td class="biasa" style="width:100">JAWA BARAT</td>
						</tr>
						<tr>
							<td class="biasa" style="padding-left: 20px;width:100;">NAMA KEPALA KELUARGA</td>
							<td class="titikdua">:</td>
							<td class="biasa" colspan="20">{{$header['kepala']}}</td>
 							<td class="kotak"></td>
							<td class="biasa">Kode Nama Kabupaten/Kota</td>
							<td class="titikdua">:</td>
							<td class="kotak">0</td>
							<td class="kotak">2</td>
							<td class="kotak"></td>
							<td class="biasa" style="width:15">SUKABUMI</td>
						</tr>
						<tr>
							<td class="biasa" style="padding-left: 20px;">Alamat</td>
							<td class="titikdua">:</td>
							<td class="biasa" colspan="20">{{$header['alamat']}}</td>
							<td class="kotak"></td>
							<td class="biasa">Kode Nama Kecamatan</td>
							<td class="titikdua">:</td>
							<td class="kotak">1</td>
							<td class="kotak">2</td>
							<td class="kotak"></td>
							<td class="biasa" style="width:15">NAGRAK</td>
						</tr>
						<tr>
							<td class="biasa" style="padding-left: 20px;">Kode Pos</td>
							<td class="titikdua">:</td>
							<td class="kotak">4</td>
							<td class="kotak">3</td>
							<td class="kotak">3</td>
							<td class="kotak">5</td>
							<td class="kotak">6</td>
							<td style="width:15; color: white;"></td>
							<td class="kotak">R</td>
							<td class="kotak">T</td>
							@for ($i = 0; $i <= 2; $i++)
								@if ($i < count($header['rt']))
									<td class="kotak">{{$header['rt'][$i]}}</td>
								@else
									<td class="kotak"></td>
								@endif
							@endfor
							<td class="kotak">R</td>
							<td class="kotak">W</td>
							@for ($i = 0; $i <= 2; $i++)
								@if ($i < count($header['rw']))
									<td class="kotak">{{$header['rw'][$i]}}</td>
								@else
									<td class="kotak"></td>
								@endif
							@endfor
							<td style="width:100">Jumlah Anggota Keluarga</td>
							@for ($i = 0; $i <= 1; $i++)
								@if ($i < count($header['jmlkeluarga']))
									<td class="kotak">{{$header['jmlkeluarga'][$i]}}</td>
								@else
									<td class="kotak"></td>
								@endif
							@endfor
							<td style="width:25">Orang</td>
							<td class="kotak"></td>
							<td class="biasa">Kode Nama Kelurahan</td>
							<td class="titikdua">:</td>
							<td class="kotak">0</td>
							<td class="kotak">0</td>
							<td class="kotak">1</td>
							<td class="biasa" style="width:15">{{ env('DESA_NAME') }}</td>
						</tr>
						<tr>
							<td class="biasa" style="padding-left: 20px;">Telepon</td>
							<td class="titikdua">:</td>
							@for ($i = 0; $i <= 20; $i++)
								@if ($i < count($header['telepon']))
									<td class="kotak">{{$header['telepon'][$i]}}</td>
								@else
									<td class="kotak"></td>
								@endif
							@endfor
							<td class="biasa">Nama Dusun</td>
							<td class="titikdua">:</td>
							<td class="kotak"></td>
							<td class="kotak"></td>
							<td class="kotak"></td>
							<td class="kotak"></td>
						</tr>
						<tr><td class="biasa" colspan="29"><strong>DATA KELUARGA</strong></td></tr>
					</tbody>
				</table>
 				<table class="tbbody">
					<tbody>
						<tr>
							<td style="width:20;">No.</td>
							<td>Nama Lengkap</td>
							<td>No.NIK</td>
							<td>Alamat Sebelumnya</td>
							<td>Nomor Paspor</td>
							<td>Tanggal Berakhir Paspor</td>
						</tr>
						<tr style="background-color:lightgrey;">
							<td>1</td>
							<td>2</td>
							<td>3</td>
							<td>4</td>
							<td>5</td>
							<td>6</td>
						</tr>
						@foreach ($kk as $indexKey => $rows)
							<tr>
								@if($jenis == 1)
								<td style="text-align: center;">{{$indexKey+1}}</td>
								<td>{{$rows->nama_lengkap}}</td>
								<td>{{$rows->nik}}</td>
								<td>{{$rows->alamat}}</td>
								<td></td>
								<td></td>
								@else
								<td style="text-align: center;">{{$indexKey+1}}</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								@endif
							</tr>
						@endforeach
						@if($indexKey < $maxrows)
							@for ($i = $indexKey+2; $i <= $maxrows; $i++)
								<tr>
									<td>{{$i}}</td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
							@endfor
						@endif
					</tbody>
				</table>
				<div style="height: 5px;"></div>
				<table class="tbbody">
					<tbody>
						<tr>
							<td style="text-align: center;" style="width:20;">No.</td>
							<td style="text-align: center;" colspan="3">Jenis Kelamin</td>
							<td style="text-align: center;">Tempat Lahir</td>
							<td style="text-align: center;">Tgl/Bulan/Tahun Lahir</td>
							<td style="text-align: center;">Umur</td>
							<td style="text-align: center;" colspan="3">Akte Lahir/Surat Lahir</td>
							<td style="text-align: center;">Nomor Akt Kelahiran/Surat Kenal Lahir</td>
							<td style="text-align: center;" colspan="3">Golongan Darah</td>
							<td style="text-align: center;">Agama</td>
							<td style="text-align: center;">Status Perkawinan</td>
							<td style="text-align: center;" colspan="3">Akta Perkawinan/Buku Nikah</td>
							<td style="text-align: center;">Nomor Akta Perkawinan/Buku Nikah</td>
							<td style="text-align: center;">Tanggal Perkawinan</td>
							<td style="text-align: center;" colspan="3">Akta Cerai/Surat Cerai</td>
							<td style="text-align: center;" colspan="5">Nomor Akta Cerai/Surat Cerai</td>
							<td style="text-align: center;">Tanggal Perceraian</td>
						</tr>
						<tr style="background-color:lightgrey;">
							<td style="text-align: center;"></td>
							<td style="text-align: center;" colspan="3">7</td>
							<td style="text-align: center;">8</td>
							<td style="text-align: center;">9</td>
							<td style="text-align: center;">10</td>
							<td style="text-align: center;" colspan="3">11</td>
							<td style="text-align: center;">12</td>
							<td style="text-align: center;" colspan="3">13</td>
							<td style="text-align: center;">14</td>
							<td style="text-align: center;">15</td>
							<td style="text-align: center;" colspan="3">16</td>
							<td style="text-align: center;">17</td>
							<td style="text-align: center;">18</td>
							<td style="text-align: center;" colspan="3">19</td>
							<td style="text-align: center;" colspan="5">20</td>
							<td style="text-align: center;">21</td>
						</tr>
						@foreach ($kk as $indexKey => $rows)
						<tr>
							<td style="text-align: center;">{{$indexKey+1}}</td>
							@for ($i = 0; $i < 29; $i++)
								@if ($jenis==1)
									@if($i==1)
									<td class="biasa">{{$rows->jenis_kelamin}}</td>
									@elseif($i==3)
										<td class="biasa">{{$rows->tempat_lahir}}</td>
									@elseif($i==4)
										<td class="biasa">{{$rows->tanggal_lahir}}</td>
									@elseif($i==5)
										<td class="biasa">{{intval(date('Y', time() - strtotime($rows->tanggal_lahir))) - 1970}}</td>
									@elseif($i==13)
										<td class="biasa">{{$rows->agama}}</td>
									@elseif($i==14)
										<td class="biasa">{{$rows->status_kawin}}</td>
									@else
										<td class="biasa"></td>
									@endif
								@else
									<td class="biasa"></td>
								@endif
							@endfor
						</tr>
						@endforeach
						@if($indexKey < $maxrows)
							@for ($i = $indexKey+2; $i <= $maxrows; $i++)
								<tr>
									<td>{{$i}}</td>
									@for ($x = 0; $x < 29; $x++)
									<td></td>
									@endfor
								</tr>
							@endfor
						@endif
					</tbody>
				</table>
				<div style="height: 5px;"></div>
				<table class="tbbody">
					<tbody>
						@if ($jenis==1)
							<tr>
								<td style="text-align: center;" style="width:20;">No.</td>
								<td colspan="3" style="text-align: center;">Status Hub.Dlm. Keluarga</td>
								<td colspan="3" style="text-align: center;">Kelainan Fisik & Mental</td>
								<td colspan="3" style="text-align: center;">Penyandang Cacat</td>
								<td colspan="3" style="text-align: center;">Pendidikan Terakhir</td>
								<td colspan="3" style="text-align: center;">Pekerjaan</td>
								<td style="text-align: center;">NIK.Ibu</td>
								<td style="text-align: center;">Nama Lengkap Ibu</td>
								<td style="text-align: center;">NIK.Ayah</td>
								<td style="text-align: center;">Nama Lengkap Ayah</td>
							</tr>
							<tr style="background-color:lightgrey;">
								<td style="text-align: center;"></td>
								<td colspan="3" style="text-align: center;">22</td>
								<td colspan="3" style="text-align: center;">23</td>
								<td colspan="3" style="text-align: center;">24</td>
								<td colspan="3" style="text-align: center;">25</td>
								<td colspan="3" style="text-align: center;">26</td>
								<td style="text-align: center;">27</td>
								<td style="text-align: center;">28</td>
								<td style="text-align: center;">29</td>
								<td style="text-align: center;">30</td>
							</tr>
						@else
						<tr>
								<td style="text-align: center;" style="width:20;">No.</td>
								<td style="text-align: center;">Status Hub.Dlm. Keluarga</td>
								<td style="text-align: center;">Kelainan Fisik & Mental</td>
								<td style="text-align: center;">Penyandang Cacat</td>
								<td style="text-align: center;">Pendidikan Terakhir</td>
								<td style="text-align: center;">Pekerjaan</td>
								<td style="text-align: center;">NIK.Ibu</td>
								<td style="text-align: center;">Nama Lengkap Ibu</td>
								<td style="text-align: center;">NIK.Ayah</td>
								<td style="text-align: center;">Nama Lengkap Ayah</td>
							</tr>
							<tr style="background-color:lightgrey;">
								<td style="text-align: center;"></td>
								<td style="text-align: center;">22</td>
								<td style="text-align: center;">23</td>
								<td style="text-align: center;">24</td>
								<td style="text-align: center;">25</td>
								<td style="text-align: center;">26</td>
								<td style="text-align: center;">27</td>
								<td style="text-align: center;">28</td>
								<td style="text-align: center;">29</td>
								<td style="text-align: center;">30</td>
							</tr>
						@endif
						@foreach ($kk as $indexKey => $rows)
						<tr>
							<td style="text-align: center;">{{$indexKey+1}}</td>
							@if ($jenis==1)
								@for ($i = 0; $i < 19; $i++)
									@if($i==1)
										<td class="biasa">{{$rows->hub_kel}}</td>
									@elseif($i==10)
										<td class="biasa">{{$rows->pendidikan_akhir}}</td>
									@elseif($i==13)
										<td class="biasa">{{$rows->jenis_pekerjaan}}</td>
									@elseif($i==15)
										<td class="biasa">{{$rows->nik}}</td>
									@elseif($i==16)
										<td class="biasa">{{$rows->nama_lengkap_ibu}}</td>
									@elseif($i==17)
										<td class="biasa">{{$rows->nik}}</td>
									@elseif($i==18)
										<td class="biasa">{{$rows->nama_lengkap_ayah}}</td>
									@else
										<td class="biasa"></td>
									@endif
								@endfor
							@else
								@for ($i = 0; $i < 9; $i++)
									<td class="biasa"></td>
								@endfor
							@endif
						</tr>
						@endforeach
						@if($indexKey < $maxrows)
							@for ($i = $indexKey+2; $i <= $maxrows; $i++)
								@if ($jenis==1)
									<tr>
										<td>{{$i}}</td>
										@for ($x = 0; $x < 19; $x++)
										<td></td>
										@endfor
									</tr>
								@else
									<tr>
										<td>{{$i}}</td>
										@for ($x = 0; $x < 9; $x++)
										<td></td>
										@endfor
									</tr>
								@endif
							@endfor
						@endif
					</tbody>
				</table>
		<table class="tbfooter">
			<tbody>
				<tr>
					<td style="text-align: left">Nama Ketua RT :</td>
					<td style="width:400px;"></td>
					<td>Petugas/Register <br> Desa {{ env('DESA_NAME') }}</td>
					<td>Mengetahui, <br> Sekretaris Desa {{ env('DESA_NAME') }}</td>
					<td>{{ env('DESA_NAME') }}, {{$tglcetak}} <br> Kepala Keluarga</td>
				</tr>
				<tr>
					<td style="text-align: left">Nama Ketua RW :</td>
				</tr>
				@if($jenis == 1)
				<tr>
					<td class="biasa" style="text-align: left; font-size: 10px; font-weight: bold;">NO REG.747.4/{{$header['nomor']}}/Pemdes/2018</td>
				</tr>
				@endif
				<tr>
					<td colspan="2" style="text-align: left; font-size: 10px; padding-top: 10px;">
						Pernyataan : <br> Demikian formulir ini saya / kami isi dengan sesungguhnya apabila keterangan tersebut tidak sesuai dengan <br>
						keadaan sebenarnya, saya bersedia dikenakan sanksi sesuai ketentuan peraturan perundang-undangan yang berlaku. <br>
						Catatan : *) Hanya diisi oleh salah satu pasangan keluarga tersebut (Suami / Istri). <br>
					</td>
					<td>
						A.SURYANA <br>
						NIP.
					</td>
					<td>
						YAN VICTOR MOMONGAN <br>
						NIP.
					</td>
					<td>
						WAWAN
					</td>
				</tr>
			</tbody>
		</table>
	</body>
</html>