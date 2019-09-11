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
					<div style="font-size: 16px;font-weight: bold">
						KEPALA DESA {{ strtoupper($desa->profil_nama) }}
					</div>
				</td>
			</tr>
			<tr>
				<td style="text-align: center">
					<div style="font-size: 16px">
						<strong>KECAMATAN {{ strtoupper($desa->profil_kecamatan) }} KABUPATEN {{ strtoupper($desa->profil_kabupaten) }}</strong>
						<br>
						<br>
						<b><u>SURAT KETERANGAN DOMISILI USAHA</u></b>
						<br>
						<span style="font-size: 15px; padding-top:10px;">
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
					<table style="width: 100%">
						<tr>
							<td style="text-align: right; vertical-align: top; width: 3em">a. </td>
							<td style="width: 150px">Nama</td>
							<td style="text-transform: uppercase;">: Kosasih</td>
						</tr>
						<tr>
							<td style="text-align: right; vertical-align: top; width: 3em">b. </td>
							<td style="width: 150px">Jabatan</td>
							<td>: Kepala Desa {{ $desa->profil_nama }}</td>
						</tr>
					</table>
					<br>
					<p>Dengan ini menerangkan bahwa :</p>
					<br>
					<table style="width: 100%">
						<tr>
							<td style="text-align: right; vertical-align: top; width: 3em">&nbsp;&nbsp; </td>
							<td style="width: 150px">Nama Pemilik</td>
							<td style="text-transform: uppercase;">: {{ $citizen->nama_lengkap }}</td>
						</tr>
						<tr>
							<td style="text-align: right; vertical-align: top; width: 3em">&nbsp;&nbsp; </td>
							<td style="width: 150px">T.T.L/Umur</td>
							<td>: {{ $citizen->tempat_lahir }}, {{ $citizen->tanggal_lahir }}</td>
						</tr>
						<tr>
							<td style="text-align: right; vertical-align: top; width: 3em">&nbsp;&nbsp; </td>
							<td style="text-align: left; vertical-align: top; width: 150px">Alamat Pemilik</td>
							<td style="padding-right: 100px;">
								: {{ $citizen->alamat }}
							</td>
						</tr>
						<tr>
							<td style="text-align: right; vertical-align: top; width: 3em">&nbsp;&nbsp; </td>
							<td style="width: 150px">Jenis Usaha</td>
							<td>: {{ $coveringLetter->jenis_usaha }}</td>
						</tr>
						<tr>
							<td style="text-align: right; vertical-align: top; width: 3em">&nbsp;&nbsp; </td>
							<td style="text-align: left; vertical-align: top; width: 150px">Tempat Usaha</td>
							<td style="padding-right: 100px;">
								: {{ $coveringLetter->alamat_tempat }}
							</td>
						</tr>
						<tr>
							<td style="text-align: right; vertical-align: top; width: 3em">&nbsp;&nbsp; </td>
							<td style="width: 150px">Luas Tempat Usaha</td>
							<td>: {{ $coveringLetter->luas_tempat }}</td>
						</tr>
					</table>
					<br>
					<br>

					<p>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						Usaha Penitipan Barang tersebut di atas benar berdomisili di {{ $coveringLetter->alamat_tempat }}
						Desa {{ $desa->profil_nama }} Kecamatan {{ $desa->profil_kecamatan }} Kabupaten {{ $desa->profil_kabupaten }}.
					</p>
					<br>

					<p>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						Demikian Keterangan Izin Domisili Usaha ini dikeluarkan untuk dapat dipergunakan sebagaimana mestinya.
					</p>
					<br>

					<p>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						Izin Domisili Usaha ini berlaku sampai dengan : <u>{{ date('d F Y', time() + (60*60*24*30) ) }}</u>
					</p>
					<br>
					<br>
					<br>
					<br>
				</td>
			</tr>
		</tbody>
	</table>
	<table style="width: 100%">
		<tr>
			<td style="padding-left: 45%; text-transform: uppercase;">
				Dikeluarkan di: {{ $desa->profil_nama }}
				<br>
				<u>Pada tanggal : {{ date('d F Y') }}</u>
				<br>
				<br>
				<table style="width: 100%">
					<tr>
						<td style="padding-left: 30px">
							<b>KEPALA DESA {{ strtoupper($desa->profil_nama) }}</b>
							<br>
							<br>
							<br>
							<br>
							<br>
							<br>
							<br>
							<b>KOSASIH</b>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td style="padding-top: 9em; text-align: center;">
				{{ $desa->profil_alamat }} Desa {{ $desa->profil_nama }} Kecamatan {{ $desa->profil_kecamatan }} <br>
				Kabupaten {{ $desa->profil_kabupaten }} e-mail : desa{{ strtolower($desa->profil_nama) }}@gmail.com Kode Pos {{ $desa->profil_kode_pos }}
			</td>
		</tr>
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
					<div style="font-size: 16px;font-weight: bold">
						KEPALA DESA {{ strtoupper($desa->profil_nama) }}
					</div>
				</td>
			</tr>
			<tr>
				<td style="text-align: center">
					<div style="font-size: 16px">
						<strong>KECAMATAN {{ strtoupper($desa->profil_kecamatan) }} KABUPATEN {{ strtoupper($desa->profil_kabupaten) }}</strong>
						<br>
						<br>
						<b><u>SURAT KETERANGAN DOMISILI USAHA</u></b>
						<br>
						<span style="font-size: 15px; padding-top:10px;">
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
	<table style="font-size: 13px; width: 100%;">
		<tbody>
			<tr>
				<td style="padding: 0 50px">
					<table style="width: 100%">
						<tr>
							<td colspan="3" style="text-align: justify;">
								<br>
								<p>Yang bertanda tangan di bawah ini :</p>
							</td>
						</tr>
						<tr>
							<td style="text-align: right; vertical-align: top; width: 3em">a. </td>
							<td style="width: 150px">Nama</td>
							<td style="text-transform: uppercase;">: Kosasih</td>
						</tr>
						<tr>
							<td style="text-align: right; vertical-align: top; width: 3em">b. </td>
							<td style="width: 150px">Jabatan</td>
							<td>: Kepala Desa {{ $desa->profil_nama }}</td>
						</tr>
						<tr>
							<td colspan="3" style="text-align: justify;">
								<br>
								<p>Dengan ini menerangkan bahwa :</p>
								<p>Berdasarkan Keterangan Ijin lingkungan yang di tandatangani warga dan diketahui Ketua {{ $coveringLetter->alamat_tempat }} Desa {{ $desa->profil_nama }}, Kecamatan {{ $desa->profil_kecamatan }} Kabupaten {{ $desa->profil_kabupaten }} memberikan izin
									Domisili Usaha kepada:
								</p>
							</td>
						</tr>
					</table>
					<br>
					<table style="width: 100%">
						<tr>
							<td style="text-align: right; vertical-align: top; width: 3em">&nbsp;&nbsp; </td>
							<td style="width: 150px">Nama</td>
							<td style="text-transform: uppercase;">: {{ $coveringLetter->nama }}</td>
						</tr>
						<tr>
							<td style="text-align: right; vertical-align: top; width: 3em">&nbsp;&nbsp; </td>
							<td style="width: 150px">Jenis Usaha/Kegiatan</td>
							<td>: {{ $coveringLetter->jenis_usaha }}</td>
						</tr>
						<tr>
							<td style="text-align: right; vertical-align: top; width: 3em">&nbsp;&nbsp; </td>
							<td style="text-align: left; vertical-align: top; width: 150px">Alamat Tempat Usaha</td>
							<td style="padding-right: 100px;">
								: {{ $coveringLetter->alamat_tempat }}
							</td>
						</tr>
						<tr>
							<td style="text-align: right; vertical-align: top; width: 3em">&nbsp;&nbsp; </td>
							<td style="width: 150px">Luas tempat Usaha</td>
							<td>: +/- {{ $coveringLetter->luas_tempat }} M2</td>
						</tr>
						<tr>
							<td style="text-align: right; vertical-align: top; width: 3em">&nbsp;&nbsp; </td>
							<td style="text-align: left; vertical-align: top; width: 140px">Nama Pemilik</td>
							<td style="padding-right: 100px;">
								: {{ $citizen->nama_lengkap }}
							</td>
						</tr>
						<tr>
							<td style="text-align: right; vertical-align: top; width: 3em">&nbsp;&nbsp; </td>
							<td style="width: 150px">Jabatan</td>
							<td>: Pimpinan Perusahaan</td>
						</tr>
						<tr>
							<td style="text-align: right; vertical-align: top; width: 3em">&nbsp;&nbsp; </td>
							<td style="text-align: left; vertical-align: top; width: 140px">Alamat</td>
							<td>
								: {{ $coveringLetter->alamat_tempat }}
							</td>
						</tr>
						<tr>
							<td style="text-align: right; vertical-align: top; width: 3em">&nbsp;&nbsp; </td>
							<td style="width: 150px">No NPWP</td>
							<td>: {{ $coveringLetter->no_npwp }}</td>
						</tr>
						<tr>
							<td style="text-align: right; vertical-align: top; width: 3em">&nbsp;&nbsp; </td>
							<td style="width: 150px">Badan Hukum</td>
							<td>: -</td>
						</tr>
						<tr>
							<td style="text-align: right; vertical-align: top; width: 3em">&nbsp;&nbsp; </td>
							<td style="width: 150px">SK Mentri Hukum & HAM</td>
							<td>: {{ $coveringLetter->sk_hukum_ham }}</td>
						</tr>
						<tr>
							<td colspan="3" style="text-align: justify;">
								<br>
								<p>
									Izin Domisili Usaha ini berlaku sampai dengan : <u>{{ date('d F Y', time() + (60*60*24*30) ) }}</u>
								</p>
								<br>
								<p>
									Demikian Keterangan Izin Domisili Usaha ini dikeluarkan dan apabila jenis kegiatan usahanya
									menyimpang dari Ketentuan, Peraturan per Undang-undangan yang berlaku, meresahkan,
									mengganggu keamanan, kenyamanan dan ketertiban umum, maka keterangan izin domisili usaha
									ini dapat dicabut. <br>Surat Keterangan Domisili Usaha ini dibuat untuk dapat dipergunakan sebagaimana mestinya.
								</p>
							</td>
						</tr>
						<tr>
							<td colspan="3" style="padding-left: 50%; text-transform: uppercase;">
								<br>
								<br>
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
								<b>KOSASIH</b>
							</td>
						</tr>
						<tr>
							<td colspan="3" style="padding-top: 9em; text-align: center;">
								{{ $desa->profil_alamat }} Desa {{ $desa->profil_nama }} Kecamatan {{ $desa->profil_kecamatan }} <br>
								Kabupaten {{ $desa->profil_kabupaten }} e-mail : desa{{ strtolower($desa->profil_nama) }}@gmail.com Kode Pos {{ $desa->profil_kode_pos }}
							</td>
						</tr>
					</table>
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
					<div style="font-size: 16px;font-weight: bold">
						KEPALA DESA {{ strtoupper($desa->profil_nama) }}
					</div>
				</td>
			</tr>
			<tr>
				<td style="text-align: center">
					<div style="font-size: 16px">
						<strong>KECAMATAN {{ strtoupper($desa->profil_kecamatan) }} KABUPATEN {{ strtoupper($desa->profil_kabupaten) }}</strong>
						<br>
						<br>
						<b><u>SURAT KETERANGAN DOMISILI USAHA</u></b>
						<br>
						<span style="font-size: 15px; padding-top:10px;">
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
	<table>
		<tbody>
			<tr>
				<td style="padding: 0 50px">
					<p>Yang bertanda tangan di bawah ini :</p>
					<br>
					<table style="width: 100%">
						<tr>
							<td style="text-align: right; vertical-align: top; width: 3em">a. </td>
							<td style="width: 150px">Nama</td>
							<td style="text-transform: uppercase;">: Kosasih</td>
						</tr>
						<tr>
							<td style="text-align: right; vertical-align: top; width: 3em">b. </td>
							<td style="width: 150px">Jabatan</td>
							<td>: Kepala Desa {{ $desa->profil_nama }}</td>
						</tr>
					</table>
					<br>
					<p>Dengan ini menerangkan bahwa :</p>
					<br>
					<table style="width: 100%">
						<tr>
							<td style="text-align: right; vertical-align: top; width: 3em">&nbsp;&nbsp; </td>
							<td style="width: 150px">Nama Pemilik</td>
							<td style="text-transform: uppercase;">: {{ $citizen->nama_lengkap }}</td>
						</tr>
						<tr>
							<td style="text-align: right; vertical-align: top; width: 3em">&nbsp;&nbsp; </td>
							<td style="width: 150px">Tempat Tanggal lahir</td>
							<td>: {{ $citizen->tempat_lahir }}, {{ $citizen->tanggal_lahir }}</td>
						</tr>
						<tr>
							<td style="text-align: right; vertical-align: top; width: 3em">&nbsp;&nbsp; </td>
							<td style="text-align: left; vertical-align: top; width: 150px">NIK</td>
							<td style="padding-right: 100px;">
								: {{ $citizen->nik }}
							</td>
						</tr>
						<tr>
							<td style="text-align: right; vertical-align: top; width: 3em">&nbsp;&nbsp; </td>
							<td style="text-align: left; vertical-align: top; width: 150px">Alamat</td>
							<td>
								: {{ $citizen->alamat }}
							</td>
						</tr>
						<tr>
							<td style="text-align: right; vertical-align: top; width: 3em">&nbsp;&nbsp; </td>
							<td style="text-align: left; vertical-align: top; width: 150px">Nama Perusahaan</td>
							<td style="padding-right: 100px;">
								: {{ $coveringLetter->nama }}
							</td>
						</tr>
						<tr>
							<td style="text-align: right; vertical-align: top; width: 3em">&nbsp;&nbsp; </td>
							<td style="text-align: left; vertical-align: top; width: 150px">Jenis Usaha</td>
							<td>: {{ $coveringLetter->jenis_usaha }}</td>
						</tr>
						<tr>
							<td style="text-align: right; vertical-align: top; width: 3em">&nbsp;&nbsp; </td>
							<td style="text-align: left; vertical-align: top; width: 150px">Tempat Usaha</td>
							<td>
								: {{ $coveringLetter->alamat_tempat }}
							</td>
						</tr>
						<tr>
							<td style="text-align: right; vertical-align: top; width: 3em">&nbsp;&nbsp; </td>
							<td style="text-align: left; vertical-align: top; width: 150px">Luas Tempat Usaha</td>
							<td>: +/- {{ $coveringLetter->luas_tempat }} M2</td>
						</tr>
						<tr>
							<td style="text-align: right; vertical-align: top; width: 3em">&nbsp;&nbsp; </td>
							<td style="text-align: left; vertical-align: top; width: 150px">Nomor NPWP</td>
							<td>: {{ $coveringLetter->no_npwp }}</td>
						</tr>
						<tr>
							<td style="text-align: right; vertical-align: top; width: 3em">&nbsp;&nbsp; </td>
							<td style="text-align: left; vertical-align: top; width: 150px">Nomor Badan Hukum</td>
							<td>: {{ $coveringLetter->badan_hukum }}</td>
						</tr>
						<tr>
							<td colspan="3" style="text-align: justify;">
								<br>
								<p>
									Izin Domisili Usaha ini berlaku sampai dengan : {{ date('d F Y', time() + (60*60*24*30) ) }}
								</p>
								<br>
								<p>
									Demikian Keterangan Izin Domisili Usaha ini dikeluarkan dan apabila jenis kegiatan usahanya
									menyimpang dari Ketentuan, Peraturan per Undang-undangan yang berlaku, meresahkan,
									mengganggu keamanan, kenyamanan dan ketertiban umum, maka keterangan izin domisili usaha
									ini dapat dicabut. <br>
									Surat Keterangan Domisili Usaha ini dibuat untuk dapat dipergunakan sebagaimana mestinya.
								</p>
							</td>
						</tr>
						<tr>
							<td colspan="3" style="padding-left: 50%; text-transform: uppercase;">
								<br>
								<br>
								Dikeluarkan di: {{ $desa->profil_nama }}
								<br>
								<u>Pada tanggal : {{ date('d F Y') }}</u>
								<br>
								<br>
								<table>
									<tr>
										<td style="padding-left: 30px">
											<b>KEPALA DESA {{ strtoupper($desa->profil_nama) }}</b>
											<br>
											<br>
											<br>
											<br>
											<br>
											<b>KOSASIH</b>
										</td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td colspan="3" style="padding-top: 8em; text-align: center;">
								{{ $desa->profil_alamat }} Desa {{ $desa->profil_nama }} Kecamatan {{ $desa->profil_kecamatan }} <br>
								Kabupaten {{ $desa->profil_kabupaten }} e-mail : desa{{ strtolower($desa->profil_nama) }}@gmail.com Kode Pos {{ $desa->profil_kode_pos }}
							</td>
						</tr>
					</table>
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
					<div style="font-size: 16px;font-weight: bold">
						KEPALA DESA {{ $desa->profil_nama }}
					</div>
				</td>
			</tr>
			<tr>
				<td style="text-align: center">
					<div style="font-size: 16px">
						<strong>KECAMATAN {{ strtoupper($desa->profil_kecamatan) }} KABUPATEN {{ strtoupper($desa->profil_kabupaten) }}</strong>
						<br>
						<br>
						<b><u>SURAT KETERANGAN DOMISILI USAHA</u></b>
						<br>
						<span style="font-size: 15px; padding-top:10px;">
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
					<table style="width: 100%">
						<tr>
							<td style="text-align: right; vertical-align: top; width: 3em">a. </td>
							<td style="width: 150px">Nama</td>
							<td style="text-transform: uppercase;">: Kosasih</td>
						</tr>
						<tr>
							<td style="text-align: right; vertical-align: top; width: 3em">b. </td>
							<td style="width: 150px">Jabatan</td>
							<td>: Kepala Desa {{ $desa->profil_nama }}</td>
						</tr>
					</table>
					<br>
					<p>Dengan ini menerangkan bahwa :</p>
					<br>
					<table style="width: 100%">
						<tr>
							<td style="text-align: right; vertical-align: top; width: 3em">&nbsp;&nbsp; </td>
							<td style="width: 150px">Nama Lembaga</td>
							<td style="font-weight: bold; text-transform: uppercase;">
								: {{ $coveringLetter->nama }}
							</td>
						</tr>
						<tr>
							<td style="text-align: right; vertical-align: top; width: 3em">&nbsp;&nbsp; </td>
							<td style="width: 150px">Nama Ketua</td>
							<td style="text-transform: uppercase;">: {{ $citizen->nama_lengkap }}</td>
						</tr>
						<tr>
							<td style="text-align: right; vertical-align: top; width: 3em">&nbsp;&nbsp; </td>
							<td style="text-align: left; vertical-align: top; width: 150px">NO SK</td>
							<td style="padding-right: 100px;">
								: {{ $coveringLetter->sk_hukum_ham }}
							</td>
						</tr>
						<tr>
							<td style="text-align: right; vertical-align: top; width: 3em">&nbsp;&nbsp; </td>
							<td style="text-align: left; vertical-align: top; width: 150px">Alamat</td>
							<td>
								: {{ $coveringLetter->alamat_tempat }}
							</td>
						</tr>
						<tr>
							<td colspan="3" style="text-align: justify;">
								<br>
								<p>
									Lembaga tersebut benar-benar berada di wilayah Desa {{ $desa->profil_nama }} Kecamatan {{ $desa->profil_kecamatan }} Kabupaten {{ $desa->profil_kabupaten }}.
								</p>
								<br>
								<p>
									Demikian surta keterangan ini di keluarkan untuk dapat dipergunakan sebagaimana mestinya dan
									pada yang berkepentingan menjadi tahu adanya serta dapat membantu seperlunya.
								</p>
							</td>
						</tr>
						<tr>
							<td colspan="3" style="padding-left: 50%; text-transform: uppercase;">
								<br>
								<br>
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
							<td colspan="3" style="padding-top: 18em; text-align: center;">
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