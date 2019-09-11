<!DOCTYPE html>
<html>
<head></head>
<body>
	{{-- <table style="font-size: 13px; width:100%">
		<tbody>
			<tr>
				<td style="text-align: center;padding-bottom: 30px">
					<img style="width: 80px;height: auto" src="{{asset('img/garuda-bhineka-tunggal-ika.png')}}" alt="">
				</td>
			</tr>
			<tr>
				<td style="text-align: center;">
					<div style="font-size: 12px;font-weight: bold">
						KEPALA DESA {{ strtoupper($desa->profil_nama) }}
					</div>
				</td>
			</tr>
			<tr>
				<td style="text-align: center">
					<div style="font-size: 12px">
						<strong>KECAMATAN {{ strtoupper($desa->profil_kecamatan) }} KABUPATEN {{ strtoupper($desa->profil_nama) }}</strong>
						<br>
						<br>
						<b><u style="font-size: 15px">SURAT KETERANGAN DOMISILI USAHA</u></b>
						<br>
						<span style="font-size: 12px; padding-top:10px;">
							Nomor : {{ $coveringLetter->nomor }}
						</span>
						<br>
						<br>
						<br>
					</div>
				</td>
			</tr>
		</tbody>
	</table>
	<table style="width: 100%">
		<tbody>
			<tr>
				<td style="padding: 0 50px">
					<p>Yang bertanda tangan di bawah ini :</p>
					<br>
					<table style="width: 100%;">
						<tbody>
							<tr>
								<td style="text-align: right; vertical-align: top; width: 1em">a. </td>
								<td style="width: 80px">Nama</td>
								<td style="text-transform: uppercase;">: Kosasih</td>
							</tr>
							<tr>
								<td style="text-align: right; vertical-align: top">b. </td>
								<td style="width: 80px">Jabatan</td>
								<td>: Kepala Desa {{ $desa->profil_nama }}</td>
							</tr>
						</tbody>
					</table>
					<br>
					<p>Dengan ini menerangkan bahwa :</p>
					<br>
					<table style="width: 100%;">
						<tbody>
							<tr>
								<td style="text-align: right; vertical-align: top; width: 3.5em">&nbsp;&nbsp; </td>
								<td style="width: 180px">Nama</td>
								<td style="vertical-align: top; text-align: left; text-transform: uppercase;">: {{ $citizen->nama_lengkap }}</td>
							</tr>
							<tr>
								<td style="text-align: right; vertical-align: top">&nbsp;&nbsp; </td>
								<td style="width: 180px">NIK</td>
								<td style="vertical-align: top; text-align: left;">: {{ $citizen->nik }}</td>
							</tr>
							<tr>
								<td style="text-align: right; vertical-align: top">&nbsp;&nbsp; </td>
								<td style="width: 180px">Jenis Kelamin</td>
								<td style="vertical-align: top; text-align: left;">: {{ $citizen->jenis_kelamin ? 'Laki-laki' : 'Perempuan' }}</td>
							</tr>
							<tr>
								<td style="text-align: right; vertical-align: top">&nbsp;&nbsp; </td>
								<td style="width: 180px">Tempat Tgl/lahir</td>
								<td style="vertical-align: top; text-align: left;">: {{ $citizen->tempat_lahir }}, {{ $citizen->tanggal_lahir }}</td>
							</tr>
							<tr>
								<td style="text-align: right; vertical-align: top">&nbsp;&nbsp; </td>
								<td style="width: 180px">Warga Negara</td>
								<td style="vertical-align: top; text-align: left;">: Indonesia</td>
							</tr>
							<tr>
								<td style="text-align: right; vertical-align: top">&nbsp;&nbsp; </td>
								<td style="width: 180px">Agama</td>
								<td style="vertical-align: top; text-align: left;">: {{ $citizen->agama }}</td>
							</tr>
							<tr>
								<td style="text-align: right; vertical-align: top">&nbsp;&nbsp; </td>
								<td style="width: 180px">Pekerjaan</td>
								<td style="vertical-align: top; text-align: left;">: {{ $citizen->jenis_pekerjaan }}</td>
							</tr>
							<tr>
								<td style="text-align: right; vertical-align: top">&nbsp;&nbsp; </td>
								<td style="width: 180px">Status Perkawinan</td>
								<td style="vertical-align: top; text-align: left;">: {{ $citizen->status_kawin }}</td>
							</tr>
							<tr>
								<td style="text-align: right; vertical-align: top">&nbsp;&nbsp; </td>
								<td style="width: 180px">Alamat</td>
								<td style="vertical-align: top; text-align: left;">
									: {{ $citizen->alamat }}
								</td>
							</tr>
						</tbody>
					</table>
					<br>
					<table style="width: 100%">
						<tr>
							<td style="text-align: justify;">
								<p>
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									Nama tersebut diatas adalah salah seorang warga Desa {{ $desa->profil_nama }} Kecamatan {{ $desa->profil_kecamatan }} Kabupaten
									{{ $desa->profil_kabupaten }} yang berdomisili sebagaimana alamat tersebut diatas. Dan menurut pengakuan yang
									bersangkutan Pada Hari minggu 17 Juli 2016 Sekitar Pukul 21.00 WIB telah terjadi Pencurian 1 (satu)
									unit Sepeda Motor Honda Beat Type ACH1M21B04 A/T warna Hitam Tahun 2014, No. Pol : F-4414-
									QT bertempat di BTN Taman Lestari RT. 003/011 Desa {{ $desa->profil_nama }} Kecamatan {{ $desa->profil_kecamatan }} Kabupaten
									{{ $desa->profil_kabupaten }}.
								</p>
								<br>
								<p>
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									Demikian Surat Keterangan ini kami buat untuk dipergunakan seperlunya.
								</p>
							</td>
						</tr>
					</table>
					<br>
					<table style="width: 100%">
						<tr>
							<td style="padding-left: 50%;">
								Dikeluarkan di: {{ $desa->profil_nama }}
								<br>
								<u>Pada tanggal : {{ date('d F Y') }}</u>
								<br>
								<br>
								<b>KEPALA DESA {{ strtoupper($desa->profil_nama) }}</b>
								<br>
								<br>
								<br>
								<br>
								<br>
								<br>
								<b>KOSASIH</b>
							</td>
						</tr>
						<tr>
							<td style="padding-top: 7em; text-align: center;">
								Jl. R. Natapraja No.01 Desa {{ $desa->profil_nama }} Kecamatan {{ $desa->profil_kecamatan }} Kabupaten {{ $desa->profil_kabupaten }} <br>
								No HP 081563496263 - 085864836300 e-mail : <a href="mailto:desacimenteng@gmail.com" style="color: inherit;"><i><u>desacimenteng@gmail.com</u></i></a> Kode Pos 43182
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</tbody>
	</table> --}}
	<table style="padding: 0 50px; width:100%" cellpadding="2" cellspacing="0">
		<tbody>
			<tr>
				<td style="text-align: center; border-bottom: 5px solid black;width: 130px !important;">
					<img style="height: auto; margin: 0 auto; width: 90px;" src="{{asset('img/2191f-lambang_kab_sukabumi.svg_-2-e1532000502726-232x300.png')}}" alt="">
				</td>
				<td style="text-align: center; border-bottom: 5px solid black;">
					<div style="font-size: 24px;font-weight: bold">
						PEMERINTAH DESA {{ strtoupper($desa->profil_nama) }}
						<p style="font-size:20px;font-weight:bold">
							KECAMATAN {{ strtoupper($desa->profil_kecamatan) }} KABUPATEN {{ strtoupper($desa->profil_kabupaten) }}
						</p>
						<p style="font-size:16px;font-weight:bold">
							SEKRETARIAT DESA
						</p>
						<p style="font-size: 14; font-weight: bold;">
							{{ $coveringLetter->nomor }}
						</p>
						<P style="font-size:13px;font-weight:normal">
							{{ $desa->alamat }} e-mail : <a href="mailto:desa{{ strtolower($desa->profil_nama) }}@gmail.com">desa{{ strtolower($desa->profil_nama) }}@gmail.com</a> Kode Pos {{ $desa->profil_kode_pos }}
						</P>
					</div>
				</td>
			</tr>
			<tr>
				<td style="padding-top: 20px; text-align: center;;" colspan="2">
					<div style=" font-size:18px;font-weight:bold; text-decoration: underline">
						SURAT KETERANGAN PENGHASILAN
					</div>
					<div style="font-weight: normal;font-size: 14px;">
						Nomor: {{ $coveringLetter->nomor }}
					</div>
				</td>
			</tr>
		</tbody>
	</table>
	<br>
	<table style="font-size: 13px; padding: 0 50px; width:100%;">
		<tbody>
			<tr style="padding-left: 30px;">
				<td style="text-align: justify;">
					<p>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						Yang bertanda tangan di bawah ini Sekretaris Desa {{ $desa->profil_nama }} Kecamatan {{ $desa->profil_kecamatan }} Kabupaten {{ $desa->profil_kabupaten }}, menerangkan bahwa :
					</p>
				</td>
			</tr>
			<tr>
				<td style="text-align: left;padding: 20px 0">
					<table style="width: 100%;">
						<tbody>
							<tr>
								<td style="text-align: right; vertical-align: top; width: 3.5em">&nbsp;&nbsp; </td>
								<td style="width: 180px">Nama</td>
								<td style="vertical-align: top; text-align: left; text-transform: uppercase;">: {{ $citizen->nama_lengkap }}</td>
							</tr>
							<tr>
								<td style="text-align: right; vertical-align: top">&nbsp;&nbsp; </td>
								<td style="width: 180px">NIK</td>
								<td style="vertical-align: top; text-align: left;">: {{ $citizen->nik }}</td>
							</tr>
							<tr>
								<td style="text-align: right; vertical-align: top">&nbsp;&nbsp; </td>
								<td style="width: 180px">Jenis Kelamin</td>
								<td style="vertical-align: top; text-align: left;">: {{ $citizen->jenis_kelamin ? 'Laki-laki' : 'Perempuan' }}</td>
							</tr>
							<tr>
								<td style="text-align: right; vertical-align: top">&nbsp;&nbsp; </td>
								<td style="width: 180px">Tempat Tgl/lahir</td>
								<td style="vertical-align: top; text-align: left;">: {{ $citizen->tempat_lahir }}, {{ $citizen->tanggal_lahir }}</td>
							</tr>
							<tr>
								<td style="text-align: right; vertical-align: top">&nbsp;&nbsp; </td>
								<td style="width: 180px">Warga Negara</td>
								<td style="vertical-align: top; text-align: left;">: Indonesia</td>
							</tr>
							<tr>
								<td style="text-align: right; vertical-align: top">&nbsp;&nbsp; </td>
								<td style="width: 180px">Agama</td>
								<td style="vertical-align: top; text-align: left;">: {{ $citizen->agama }}</td>
							</tr>
							<tr>
								<td style="text-align: right; vertical-align: top">&nbsp;&nbsp; </td>
								<td style="width: 180px">Pekerjaan</td>
								<td style="vertical-align: top; text-align: left;">: {{ $citizen->jenis_pekerjaan }}</td>
							</tr>
							<tr>
								<td style="text-align: right; vertical-align: top">&nbsp;&nbsp; </td>
								<td style="width: 180px">Status Perkawinan</td>
								<td style="vertical-align: top; text-align: left;">: {{ $citizen->status_kawin }}</td>
							</tr>
							<tr>
								<td style="text-align: right; vertical-align: top">&nbsp;&nbsp; </td>
								<td style="width: 180px">Alamat</td>
								<td style="vertical-align: top; text-align: left;">
									: {{ $citizen->alamat }}
								</td>
							</tr>
						</tbody>
					</table>
					<tr style="padding-left: 30px;">
						<td style="text-align: justify;">
							<p>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								Nama tersebut diatas adalah salah seorang warga Desa {{ $desa->profil_nama }} Kecamatan {{ $desa->profil_kecamatan }} Kabupaten {{ $desa->profil_kabupaten }} yang berdomisili sebagaimana alamat tersebut diatas. Dan menurut pengakuan yang bersangkutan Penghasilan dari Hasil Usahanya ± Rp.{{ number_format($coveringLetter->penghasilan,0, ',','.') }},-/Bulan.
							</p>
							<br>
							<p>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								Demikian Surat Keterangan ini kami buat untuk dipergunakan seperlunya.
							</p>
							<br>
							<br>
							<br>
							<br>
							<br>
						</td>
					</tr>
				</td>
			</tr>
			<tr>
				<td style="padding-left: 50%; text-align: center;">
					Dikeluarkan di : {{ $desa->profil_nama }}
					<br>
					<u>Pada tanggaL : {{ date('d F Y') }}</u>
					<br>
					<br>
					<b>SEKRETARIS DESA {{ strtoupper($desa->profil_nama) }}</b>
					<br><br><br><br><br><br><br><br>
					<b style="text-transform: uppercase;">YAN VICTOR M</b>
				</td>
			</tr>
			<tr>
				<td style="height: 300px; text-align: justify;vertical-align: top;">
					<br><br>
					<p>{{ $coveringLetter->footer }}</p>
				</td>
			</tr>
		</tbody>
	</table>
	<table style="font-size: 13px; width:100%">
		<tbody>
			<tr>
				<td style="text-align: center;padding-bottom: 30px">
					<img style="width: 80px;height: auto" src="{{asset('img/garuda-bhineka-tunggal-ika.png')}}" alt="">
				</td>
			</tr>
			<tr>
				<td style="text-align: center;">
					<div style="font-size: 13px;font-weight: bold">
						KEPALA DESA {{ strtoupper($desa->profil_nama) }}
					</div>
				</td>
			</tr>
			<tr>
				<td style="text-align: center">
					<div style="font-size: 13px">
						<strong>KECAMATAN {{ strtoupper($desa->profil_kecamatan) }} KABUPATEN {{ strtoupper($desa->profil_nama) }}</strong>
						<br>
						<br>
						<br>
						<b><u style="font-size: 16px">SURAT KETERANGAN</u></b>
						<br>
						<span style="font-size: 12px; padding-top:10px;">
							Nomor : {{ $coveringLetter->nomor }}
						</span>
						<br>
						<br>
						<br>
					</div>
				</td>
			</tr>
		</tbody>
	</table>
	<table style="font-size: 13px; padding: 0 60px; width:100%">
		<tbody>
			<tr style="padding-left: 30px;">
				<td style="text-align: left;padding-top: 20px;padding-bottom: 20px">
					Yang bertandatangan dibawah ini :
					<br>
					<br>
					<br>
					<table style="width: 100%">
						<tbody>
							<tr>
								<td style="text-align: right; vertical-align: top; width: 50px">a. </td>
								<td style="width: 150px">Nama</td>
								<td style="text-transform: uppercase;">: KOSASIH</td>
							</tr>
							<tr>
								<td style="text-align: right; vertical-align: top; width: 50px">b. </td>
								<td style="width: 150px">Jabatan</td>
								<td>: Kepala Desa {{ $desa->profil_nama }}</td>
							</tr>
						</tbody>
					</table>
					<br>
					Dengan ini menerangkan bahwa :
					<table style="width: 100%">
						<tbody>
							<tr>
								<td rowspan="9" style="text-align: right; vertical-align: top; width: 50px"> </td>
								<td style="width: 150px">Nama</td>
								<td style="text-transform: uppercase;">: HENDRO KUSWORO</td>
							</tr>
							<tr>
								<td style="text-align: left; vertical-align: top; width: 150px">NIK</td>
								<td>: 3202120101620049</td>
							</tr>
							<tr>
								<td style="text-align: left; vertical-align: top; width: 150px">Jenis Kelamin</td>
								<td>: Laki-laki</td>
							</tr>
							<tr>
								<td style="text-align: left; vertical-align: top; width: 150px">Tempat Tgl/lahir</td>
								<td>: Solo, 01-01-1962</td>
							</tr>
							<tr>
								<td style="text-align: left; vertical-align: top; width: 150px">Warga Negara</td>
								<td>: Indonesia</td>
							</tr>
							<tr>
								<td style="text-align: left; vertical-align: top; width: 150px">Agama</td>
								<td>: Islam</td>
							</tr>
							<tr>
								<td style="text-align: left; vertical-align: top; width: 150px">Pekerjaan</td>
								<td>: Perangkat Desa</td>
							</tr>
							<tr>
								<td style="text-align: left; vertical-align: top; width: 150px">Status Perkawinan</td>
								<td>: Kawin</td>
							</tr>
							<tr>
								<td style="text-align: left; vertical-align: top; width: 150px">Alamat</td>
								<td>
									: Kp. Pamuruyan RT. 001/001 <br>
									Desa {{ $desa->profil_nama }} Kecamatan {{ $desa->profil_kecamatan }} <br>
									Kabupaten {{ $desa->profil_kabupaten }}
								</td>
							</tr>
						</tbody>
					</table>
					<table>
						<tr>
							<td style="text-align: justify;">
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								Nama tersebut diatas adalah salah seorang warga Desa {{ $desa->profil_nama }} Kecamatan {{ $desa->profil_kecamatan }} Kabupaten {{ $desa->profil_kabupaten }} yang berdomisili sebagaimana alamat tersebut diatas. Dan menurut pengakuan yang bersangkutan Penghasilan dari Hasil Usahanya ± Rp.{{ number_format($coveringLetter->penghasilan,0, ',','.') }},-/Bulan.
								<br>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								Demikian Surat Keterangan ini kami buat untuk dipergunakan seperlunya.
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td style="padding-left: 50%; text-align: center;">
					Dikeluarkan di : {{ $desa->profil_nama }}
					<br>
					<u>Pada tanggaL : {{ date('d F Y') }}</u>
					<br>
					<br>
					<b>KEPALA DESA {{ strtoupper($desa->profil_nama) }}</b>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
				</td>
			</tr>
			<tr>
				<td style="font-weight: bold; padding-left: 55%; text-align: center;text-transform: uppercase;">
					KOSASIH
				</td>
			</tr>
			<tr>
				<td style="height: 150px; text-align: justify;vertical-align: top;">
					<br><br>
					<p>{{ $coveringLetter->footer }}</p>
				</td>
			</tr>
			<tr>
				<td style="text-align: center;">
					{{ $desa->alamat }} Desa {{ $desa->profil_nama }} Kecamatan {{ $desa->profil_kecamatan }} Kabupaten {{ $desa->profil_kabupaten }} <br>
					e-mail : <a href="mailto:desa{{ strtolower($desa->profil_nama) }}@gmail.com">desa{{ strtolower($desa->profil_nama) }}@gmail.com</a> Kode Pos {{ $desa->profil_kode_pos }}
				</td>
			</tr>
		</tbody>
	</table>
</body>
</html>