<!DOCTYPE html>
<html>
<body>
	<table style="font-size: 13px; width:100%">
		<tbody>
			<tr>
				<td style="text-align: center;padding-bottom: 30px">
					<img style="width: 80px;height: auto" src="{{asset('img/garuda-bhineka-tunggal-ika.png')}}" alt="">
				</td>
			</tr>
			<tr>
				<td style="text-align: center;">
					<div style="font-size: 16px;font-weight: bold; text-transform: uppercase;">
						KEPALA DESA {{ $desa->profil_nama }}
					</div>
				</td>
			</tr>
			<tr>
				<td style="text-align: center">
					<div style="font-size: 16px">
						<strong style="text-transform: uppercase;">KECAMATAN {{ $desa->profil_kecamatan }} KABUPATEN {{ $desa->profil_kabupaten }}</strong>
						<br>
						<br>
						<u style="text-transform: uppercase;">SURAT KETERANGAN KELAHIRAN</u>
						<br>
						<span style="font-size: 15px; padding-top:10px;">
							Nomor : {{ $coveringLetter->nomor_surat }}
						</span>
						<br>
						<br>
						<br>
					</div>
				</td>
			</tr>
			<tr>
				<td style="padding: 0 45px">
					<p>Yang bertanda tangan di bawah ini :</p>
					<br>
					<table style="width: 100%">
						<tr>
							<td style="text-align: right; vertical-align: top; width: 3em">a. </td>
							<td style="width: 110px">Nama</td>
							<td>: Kosasih</td>
						</tr>
						<tr>
							<td style="text-align: right; vertical-align: top; width: 3em">b. </td>
							<td style="width: 110px">Jabatan</td>
							<td>: Kepala Desa {{ $desa->profil_nama }}</td>
						</tr>
					</table>
					<br>
					<p>Dengan ini menerangkan bahwa :</p>
					<br>
					<table style="width: 100%">
						<tr>
							<td style="text-align: right; vertical-align: top; width: 3em">&nbsp;&nbsp; </td>
							<td style="width: 110px">Nama </td>
							<td style="text-transform: uppercase;">: {{ $ibu->nama_lengkap }}</td>
						</tr>
						<tr>
							<td style="text-align: right; vertical-align: top; width: 3em">&nbsp;&nbsp; </td>
							<td style="width: 110px">Tempat Tgl/lahir</td>
							<td>: {{ $ibu->tempat_lahir }}, {{ $ibu->tanggal_lahir }}</td>
						</tr>
						<tr>
							<td style="text-align: right; vertical-align: top; width: 3em">&nbsp;&nbsp; </td>
							<td style="width: 110px">Jenis kelamin</td>
							<td>: {{ $ibu->jenis_kelamin ? 'Laki Laki' : ' Perempuan' }}</td>
						</tr>
						<tr>
							<td style="text-align: right; vertical-align: top; width: 3em">&nbsp;&nbsp; </td>
							<td style="width: 110px">Warga Negara</td>
							<td>: Indonesia</td>
						</tr>
						<tr>
							<td style="text-align: right; vertical-align: top; width: 3em">&nbsp;&nbsp; </td>
							<td style="width: 110px">Pekerjaan</td>
							<td>: {{ $ibu->jenis_pekerjaan }}</td>
						</tr>
						<tr>
							<td style="text-align: right; vertical-align: top; width: 3em">&nbsp;&nbsp; </td>
							<td style="width: 110px">Agama</td>
							<td>: {{ $ibu->agama }}</td>
						</tr>
						<tr>
							<td style="text-align: right; vertical-align: top; width: 3em">&nbsp;&nbsp; </td>
							<td style="text-align: left; vertical-align: top; width: 110px">Alamat</td>
							<td style="padding-right: 150px;">
								: {{ $ibu->alamat }}
							</td>
						</tr>
						<tr>
							<td style="text-align: right; vertical-align: top; width: 3em">&nbsp;&nbsp; </td>
							<td><i><b>Istri dari</b></i></td>
							<td> </td>
						</tr>
						<tr>
							<td style="text-align: right; vertical-align: top; width: 3em">&nbsp;&nbsp; </td>
							<td style="width: 110px">Nama </td>
							<td style="text-transform: uppercase;">: {{ $ayah->nama_lengkap }}</td>
						</tr>
						<tr>
							<td style="text-align: right; vertical-align: top; width: 3em">&nbsp;&nbsp; </td>
							<td style="width: 110px">Tempat Tgl/lahir</td>
							<td>: {{ $ayah->tempat_lahir }}, {{ $ayah->tanggal_lahir }}</td>
						</tr>
						<tr>
							<td style="text-align: right; vertical-align: top; width: 3em">&nbsp;&nbsp; </td>
							<td style="width: 110px">Jenis kelamin</td>
							<td>: {{ $ayah->jenis_kelamin ? 'Laki Laki' : 'Perempuan' }}</td>
						</tr>
						<tr>
							<td style="text-align: right; vertical-align: top; width: 3em">&nbsp;&nbsp; </td>
							<td style="width: 110px">Warga Negara</td>
							<td>: Indonesia</td>
						</tr>
						<tr>
							<td style="text-align: right; vertical-align: top; width: 3em">&nbsp;&nbsp; </td>
							<td style="width: 110px">Pekerjaan</td>
							<td>: {{ $ayah->jenis_pekerjaan }}</td>
						</tr>
						<tr>
							<td style="text-align: right; vertical-align: top; width: 3em">&nbsp;&nbsp; </td>
							<td style="width: 110px">Agama</td>
							<td>: {{ $ayah->agama }}</td>
						</tr>
						<tr>
							<td style="text-align: right; vertical-align: top; width: 3em">&nbsp;&nbsp; </td>
							<td style="text-align: left; vertical-align: top; width: 110px">Alamat</td>
							<td style="padding-right: 150px;">
								: {{ $ayah->alamat }}
							</td>
						</tr>
					</table>
					<br>
					<br>

					<P>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pada <i><b>{{ date('d F Y', strtotime($coveringLetter->tanggal)) }} di: {{ $desa->profil_kabupaten }}</b></i> telah melahirkan seorang anak jenis kelamin <i><b>{{ $coveringLetter->jenis_kelamin ? 'Laki Laki' : 'Perempuan' }}</b></i> dengan diberi nama = <i><b>{{ $coveringLetter->nama }}</b></i> = kelahiran yang ke {{ $coveringLetter->anak_ke }}.</P>
					<br>

					<P>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Surat Keterangan ini dibuat atas dasar pengakuan yang berkepentingan yang telah menyadari bahwa pengakuannya ini mengakibatkan status hukum yang berkepentingan dan atau anak-anaknya.</P>
					<br>

					<P>Selanjutnya Surat Keterangan ini dibuat untuk keperluan : <b>Persyaratan SKCK</b></P>
					<br>

					<P>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Demikian Surat Keterangan ini kami buat untuk dipergunakan seperlunya.</P>
					<br>

					<table>
						<tr>
							<td style="line-height: 2em;padding-left: 55%;">
								Dikeluarkan di: {{ $desa->profil_nama }}
								<br>
								<u>Pada tanggal : {{ date('d F Y') }}</u>
								<b>KEPALA DESA {{ $desa->profil_nama }}</b>
								<br>
								<br>
								<br>
								<br>
								<b>KOSASIH</b>
							</td>
						</tr>
						<tr>
							<td style="padding-top: 3em; text-align: center;">
								{{ $desa->profil_alamat }} Desa {{ $desa->profil_nama }} Kecamatan {{ $desa->profil_kecamatan }} <br>
								Kabupaten {{ $desa->profil_kabupaten }} e-mail : desa{{ strtolower($desa->profil_nama) }}@gmail.com Kode Pos {{ $desa->profil_kode_pos }}
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</tbody>
	</table>
</body>
</html>