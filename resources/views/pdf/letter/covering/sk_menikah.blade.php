<!DOCTYPE html>
<html>
<head></head>
<body>
	<table style="width:100%" cellpadding="2" cellspacing="0">
		<tbody>
			<tr style="position: relative;">
				<td style="text-align: left; border-bottom: 5px solid black;width: 110px !important;">
					<img style="width: 120px;height: auto" src="{{asset('img/logo/ikhlas_beramal.png')}}" alt="">
				</td>
				<td style="text-align: center; border-bottom: 5px solid black; padding-left: 0; padding-right: 110px">
					<div style="font-size: 24px;font-weight: bold">
						KEMENTRIAN AGAMA
						<p style="font-size:20px;font-weight:bold; text-transform: uppercase;">
							KANTOR URUSAN AGAMA KECAMATAN {{ $desa->profil_kecamatan }}
						</p>
						<p style="font-size:16px;font-weight:bold; text-transform: uppercase;">
							KABUPATEN {{ $desa->profil_kabupaten }}
						</p>
						<P style="font-size:13px;font-weight:normal">
							{{ $desa->profil_alamat }}
						</P>
					</div>
				</td>
			</tr>
			<tr>
				<td style="padding-top: 20px; text-align: center;;" colspan="2">
					<div style=" font-size:18px;font-weight:bold; text-decoration: underline">
						SURAT KETERANGAN MENIKAH
					</div>
					<div style="font-weight: normal;font-size: 14px;">
						Nomor : {{ $coveringLetter->nomor }}
					</div>
				</td>
			</tr>
		</tbody>
	</table>
	<table style="font-size: 13px; padding: 0 60px; width:100%;">
		<tbody>
			<tr style="padding-left: 30px;">
				<td style="text-align: left;padding-top: 20px;padding-bottom: 20px">
					Yang bertandatangan dibawah ini menerangkan bahwa :
					<br>
					<br>
					<table style="width: 100%">
						<tbody>
							<tr>
								<td rowspan="7" style="text-align: right; vertical-align: top; width: 50px">1. </td>
								<td style="width: 150px">Nama Lengkap</td>
								<td style="text-transform: uppercase;">: {{ $mlakilaki->nama_lengkap }}</td>
							</tr>
							<tr>
								<td style="width: 150px">Bin</td>
								<td style="text-transform: uppercase;">: {{ $mlakilaki->nama_lengkap_ayah }}</td>
							</tr>
							<tr>
								<td style="width: 150px">Tempat. Tgl. Lahir</td>
								<td>: {{ $mlakilaki->tempat_lahir }}, {{ $mlakilaki->tangga_lahir }}</td>
							</tr>
							<tr>
								<td style="width: 150px">Warganegara</td>
								<td>: Indonesia</td>
							</tr>
							<tr>
								<td style="width: 150px">Agama</td>
								<td>: {{ $mlakilaki->agama }}</td>
							</tr>
							<tr>
								<td style="width: 150px">Pekerjaan</td>
								<td>: {{ $mlakilaki->jenis_pekerjaan }}</td>
							</tr>
							<tr>
								<td style="text-align: left; vertical-align: top;width: 150px">Alamat</td>
								<td>
									: {{ $mlakilaki->alamat }}
								</td>
							</tr>

							<tr>
								<td rowspan="7" style="text-align: right; vertical-align: top; width: 50px">2. </td>
								<td style="width: 150px">Nama Lengkap</td>
								<td style="text-transform: uppercase;">: {{ $mperempuan->nama_lengkap }}</td>
							</tr>
							<tr>
								<td style="width: 150px">Binti</td>
								<td style="text-transform: uppercase;">: {{ $mperempuan->nama_lengkap_ayah }}</td>
							</tr>
							<tr>
								<td style="width: 150px">Tempat. Tgl. Lahir</td>
								<td>: {{ $mperempuan->tempat_lahir }}, {{ $mperempuan->tangga_lahir }}</td>
							</tr>
							<tr>
								<td style="width: 150px">Warganegara</td>
								<td>: Indonesia</td>
							</tr>
							<tr>
								<td style="width: 150px">Agama</td>
								<td>: {{ $mperempuan->agama }}</td>
							</tr>
							<tr>
								<td style="width: 150px">Pekerjaan</td>
								<td>: {{ $mperempuan->jenis_pekerjaan }}</td>
							</tr>
							<tr>
								<td style="text-align: left; vertical-align: top;width: 150px">Alamat</td>
								<td>
									: {{ $mperempuan->alamat }}
								</td>
							</tr>
						</tbody>
					</table>
					<table>
						<tbody>
							<tr>
								<td style="text-align: justify;">
									<br>
									Kedua orang tersebut telah menikah pada hari {{ date('l', strtotime($coveringLetter->tanggal_menikah)) }} tanggal {{ date('d', strtotime($coveringLetter->tanggal_menikah)) }}
									Bulan {{ date('F', strtotime($coveringLetter->tanggal_menikah)) }} Tahun {{ date('Y', strtotime($coveringLetter->tanggal_menikah)) }} di hadapan saksi-saksi sebagai berikut:
									<br>
									<br>
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1. {{ $coveringLetter->saksi_satu }} <br>
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2. {{ $coveringLetter->saksi_dua }}
									<br>
									<br>
									<p>Sehubungan persyaratan administrasinya belum lengkap maka sementara buku nikah belum bisa diproses.</p>
									<br>
									<p>Demikian Surat keterangan ini dibuat sebagai bukti sementara dan kepada yang berkepentingan mengetahui adanya.</p>
								</td>
							</tr>
						</tbody>
					</table>
					<br>
				</td>
			</tr>
			<tr>
				<td style="padding-left: 55%; text-align: center;">
					Cimenteng, {{ date('d F Y') }}
					<br>
					<br>
					Pembantu PPN
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<u style="text-transform: uppercase;">{{ $coveringLetter->pembantu_ppn }}</u>
				</td>
			</tr>
			<tr>
				<td>
					<br>
					<br>
					<br>
					<br>
					<br>
					<p>{{ $coveringLetter->footer }}</p>
				</td>
			</tr>
		</tbody>
	</table>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<table style="width:100%" cellpadding="2" cellspacing="0">
		<tbody>
			<tr style="position: relative;">
				<td style="text-align: left; border-bottom: 5px solid black;width: 110px !important;">
					<img style="width: 120px;height: auto" src="{{asset('img/logo/ikhlas_beramal.png')}}" alt="">
				</td>
				<td style="text-align: center; border-bottom: 5px solid black; padding-left: 0; padding-right: 110px">
					<div style="font-size: 24px;font-weight: bold">
						KEMENTRIAN AGAMA
						<p style="font-size:20px;font-weight:bold; text-transform: uppercase;">
							KANTOR URUSAN AGAMA KECAMATAN {{ $desa->profil_kecamatan }}
						</p>
						<p style="font-size:16px;font-weight:bold; text-transform: uppercase;">
							KABUPATEN  {{ $desa->profil_kabupaten }}
						</p>
						<P style="font-size:13px;font-weight:normal">
							{{ $desa->profil_alamat }}
						</P>
					</div>
				</td>
			</tr>
			<tr>
				<td style="padding-top: 20px; text-align: center;;" colspan="2">
					<div style=" font-size:18px;font-weight:bold; text-decoration: underline">
						SURAT KETERANGAN MENIKAH
					</div>
					<div style="font-weight: normal;font-size: 14px;">
						Nomor : {{ $coveringLetter->nomor }}
					</div>
				</td>
			</tr>
		</tbody>
	</table>
	<table style="font-size: 13px; padding: 0 60px; width:100%">
		<tbody>
			<tr style="padding-left: 30px;">
				<td style="text-align: left;padding-top: 20px;padding-bottom: 20px">
					Yang bertandatangan dibawah ini menerangkan bahwa :
					<br>
					<br>
					<br>
					<table style="width: 100%">
						<tbody>
							<tr>
								<td rowspan="7" style="text-align: right; vertical-align: top; width: 50px">3. </td>
								<td style="width: 150px">Nama Lengkap</td>
								<td>: ..................................................................................
							</tr>
							<tr>
								<td style="width: 150px">Bin</td>
								<td>: ..................................................................................</td>
							</tr>
							<tr>
								<td style="width: 150px">Tempat. Tgl. Lahir</td>
								<td>: ..................................................................................</td>
							</tr>
							<tr>
								<td style="width: 150px">Warganegara</td>
								<td>: ..................................................................................</td>
							</tr>
							<tr>
								<td style="width: 150px">Agama</td>
								<td>: ..................................................................................</td>
							</tr>
							<tr>
								<td style="width: 150px">Pekerjaan</td>
								<td>: ..................................................................................</td>
							</tr>
							<tr>
								<td style="text-align: left; vertical-align: top;width: 150px">Alamat</td>
								<td>
									: ..................................................................................
									<br>
									&nbsp; ..................................................................................
								</td>
							</tr>
							<tr>
								<td rowspan="7" style="padding-top: 2.5em; text-align: right; vertical-align: top; width: 50px">4. </td>
								<td style="padding-top: 2.5em; width: 150px">Nama Lengkap</td>
								<td style="padding-top: 2.5em;">: ..................................................................................</td>
							</tr>
							<tr>
								<td style="width: 150px">Bin</td>
								<td>: ..................................................................................</td>
							</tr>
							<tr>
								<td style="width: 150px">Tempat. Tgl. Lahir</td>
								<td>: ..................................................................................</td>
							</tr>
							<tr>
								<td style="width: 150px">Warganegara</td>
								<td>: ..................................................................................</td>
							</tr>
							<tr>
								<td style="width: 150px">Agama</td>
								<td>: ..................................................................................</td>
							</tr>
							<tr>
								<td style="width: 150px">Pekerjaan</td>
								<td>: ..................................................................................</td>
							</tr>
							<tr>
								<td style="text-align: left; vertical-align: top;width: 150px">Alamat</td>
								<td>
									: ..................................................................................
									<br>
									&nbsp; ..................................................................................
								</td>
							</tr>
						</tbody>
					</table>
					<table style="width: 100%">
						<tbody>
							<tr>
								<td style="text-align: justify;">
									<br>
									Nama tersebut telah menikah pada hari ............... tanggal ......
									Bulan ........................ tahun ........, dihadapan saksi-saksi sebagai berikut :
									<br>
									<br>
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1. ........................................... <br>
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2. ...........................................
									<br>
									<br>
									<p>Sehubungan persyaratan administrasinya belum lengkap maka sementara buku nikah belum bisa diproses.</p>
									<br>
									<p>Demikian Surat keterangan ini dibuat sebagai bukti sementara dan kepada yang berkepentingan mengetahui adanya.</p>
								</td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
			<tr>
				<td style="padding-left: 55%; text-align: center;">
					{{ $desa->profil_kecamatan }}, .......................................
					<br>
					<br>
					Pembantu PPN
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<u style="text-transform: uppercase;">..........................................</u>
				</td>
			</tr>
			<tr>
				<td>
					<br>
					<br>
					<br>
					<br>
					<br>
					<p>{{ $coveringLetter->footer }}</p>
				</td>
			</tr>
		</tbody>
	</table>
</body>
</html>