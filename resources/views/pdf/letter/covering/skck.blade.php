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
					<div style="font-size: 16px;font-weight: bold">
						PEMERINTAH KABUPATEN SUKABUMI
						<p style="font-size:16px;font-weight:bold">
							KECAMATAN NAGRAK
						</p>
						<p style="font-size:20px;font-weight:bold">
							KEPALA DESA {{ strtoupper(env('DESA_NAME')) }}
						</p>
						<P style="font-size:13px;font-weight:normal">
							JL. MESJID ATTAQWA NO. 1 NGARAK SELATAN TELP. (0266) 535143
						</P>
					</div>
				</td>
			</tr>
			<tr>
				<td style="padding-top: 20px; text-align: center;;" colspan="2">
					<div style=" font-size:18px;font-weight:bold; text-decoration: underline">
						SURAT PENGANTAR SKCK
					</div>
					<div style="font-weight: normal;font-size: 14px;">
						Nomor : {{ $coveringLetter->nomor_surat }}
					</div>
				</td>
			</tr>
		</tbody>
	</table>
	<table style="font-size: 13px; width:100%;">
		<tbody>
			<tr>
				<td style="text-align: left;padding-top: 20px;padding-bottom: 20px">
					<div style="font-size: 15px;">
						Yang bertandatangan dibawah ini :
						<br>
						<br>
						<table style="padding-left: 50px; width: 100%">
							<tbody>
								<tr>
									<td style="width: 150px">Nama</td>
									<td>: <i>ASEP SAEPUDIN</i></td>
								</tr>
								<tr>
									<td style="width: 150px">Jabatan</td>
									<td>: KEPALA DESA {{ strtoupper(env('DESA_NAME')) }}</td>
								</tr>
							</tbody>
						</table>
					</div>
				</td>
			</tr>
			<tr style="padding-left: 30px;">
				<td style="text-align: left;padding-bottom: 20px">
					<div style="font-size: 15px;">
						Dengan ini menerangkan bahwa :
						<br>
						<br>
						<table style="padding-left: 50px; width: 100%">
							<tbody>
								<tr>
									<td style="width: 150px;">Nama</td>
									<td>: <i>{{$citizen->nama_lengkap}}</i></td>
								</tr>
								<tr>
									<td style="width: 150px;">Jenis Kelamin</td>
									<td>: {{$citizen->gender ? 'Laki-laki' : 'Perempuan'}}</td>
								</tr>
								<tr>
									<td style="width: 150px;">Agama</td>
									<td>: {{$citizen->agama}}</td>
								</tr>
								<tr>
									<td style="width: 150px;">Status</td>
									<td>: {{$citizen->status_kawin}}</td>
								</tr>
								<tr>
									<td style="width: 150px;">No KTP/NIK</td>
									<td>: {{$citizen->nik}}</td>
								</tr>
								<tr>
									<td style="width: 150px;">Tempat / Tanggal lahir</td>
									<td>: {{$citizen->tanggal_lahir}}</td>
								</tr>
								<tr>
									<td style="width: 150px;">Pekerjaan</td>
									<td>: {{$citizen->jenis_pekerjaan}}</td>
								</tr>
								<tr>
									<td style="text-align: left; vertical-align: top; width: 150px;">Alamat</td>
									<td>: {{$citizen->alamat}} </td>
								</tr>
								<tr>
									<td style="text-align: left; vertical-align: top; width: 150px;">Keterangan</td>
									<td>: Orang tersebut benar-benar warga Desa {{env('DESA_NAME')}} berkelakuan baik, dan belum pernah terkena tidak pidana apapun. </td>
								</tr>
								<tr>
									<td style="width: 150px;">Warga Negara</td>
									<td>: WNI</td>
								</tr>
							</tbody>
						</table>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					Demikian Surat Keterangan ini dubuat untuk digunakan seperlunya.
				</td>
			</tr>
		</tbody>
	</table>
	<table style="width: 100%">
		<colgroup style='width: 50%'></colgroup>
		<colgroup style='width: 50%'></colgroup>
		<tbody>
			<tr>
				<td></td>
				<td style="text-align:left;padding: 25px 0 25px 375px; font-size: 15px;">
					<p>Dibuat di &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Cimenteng</p>
					<p><u>Pada tanggal : {{ date('d F Y', strtotime($coveringLetter->created_at)) }}</u></p>
				</td>
			</tr>
		</tbody>
	</table>
	<table style="width: 100%">
		<colgroup style='width: 50%'></colgroup>
		<tbody>
			<tr style='border: 1px solid black'>
				<td style="text-align:center; padding-top:0px; padding-bottom:30px;">
					<div style="font-size: 15px;">
						<p style="margin-bottom:100px;">Tanda tangan Pemegang</p><br>
						<br>
						<br>
						<br>
						<br>
						<br>
						<strong> ( {{$citizen->nama_lengkap}} )</strong>
					</div>
				</td>
				<td style="text-align:center; padding-top:0px; padding-bottom:30px;">
					<div style="font-size: 15px;">
						<p style="margin-bottom:100px;">Kepala Desa {{ env('DESA_NAME') }}</p><br>
						<br>
						<br>
						<br>
						<br>
						<br>
						<strong>( ASEP SAEPUDIN )</strong>
					</div>
				</td>
			</tr>
		</tbody>
	</table>
	<table style="width: 100%">
		<tbody>
			<tr>
				<td style="text-align: center;">
					Mengetahui:
				</td>
			</tr>
		</tbody>
	</table>
	<table style="width: 100%">
		<colgroup style='width: 50%'></colgroup>
		<tbody>
			<tr style='border: 1px solid black'>
				<td style="text-align:center; padding-top:0px; padding-bottom:30px;">
					<div style="font-size: 15px;">
						<p style="margin-bottom:100px;">Danramil {{ env('DESA_NAME') }}</p><br>
						<br>
						<br>
						<br>
						<br>
						<br>
						( ................................... )
					</div>
				</td>
				<td style="text-align:center; padding-top:0px; padding-bottom:30px;">
					<div style="font-size: 15px;">
						<p style="margin-bottom:100px;"> Camat nagrak</p><br>
						<br>
						<br>
						<br>
						<br>
						<br>
						( ................................... )
					</div>
				</td>
			</tr>
		</tbody>
	</table>
	<table style="width: 100%">
		<tbody>
			<tr>
				<td>
					<p>{{ $coveringLetter->footer_cetak_data }}</p>
				</td>
			</tr>
		</tbody>
	</table>
</body>
</html>