<!DOCTYPE html>
<html>
<head></head>
<body>
	<table style="width:100%">
		<tbody>
			<tr>
				<td style="text-align: center;padding-bottom: 30px">
					<img style="width: 110px;height: auto" src="{{asset('img/garuda-bhineka-tunggal-ika.png')}}" alt="">
				</td>
			</tr>
			<tr>
				<td style="text-align: center;padding-top: 20px">
					<div style="font-size: 20px;font-weight: bold">
						KEPALA DESA CIMENTENG
					</div>
				</td>
			</tr>
			<tr>
				<td style="text-align: center;padding-top: 5px">
					<div style="font-size: 20px;">
						<strong>S U R A T &nbsp;  P E N G A N T A R </strong>
						<br>
						<span style="font-size: 15px; padding-top:10px;">Nomor : {{$letter_number}}</span>
					</div>
				</td>
			</tr>
			<tr style="padding-left: 30px;">
				<td style="text-align: left;padding-top: 20px;padding-bottom: 20px">
					<div style="font-size: 15px;">
						Yang bertandatangan dibawah ini :
						<br>
						<br>
						<table style="width: 100%">
							<tbody>
								<tr>
									<td style="width: 150px">Nama</td>
									<td>: <strong>ASEP SAEPUDIN</strong></td>
								</tr>
								<tr>
									<td style="width: 150px">Jabatan</td>
									<td>: KEPALA DESA</td>
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
						<table style="width: 100%">
							<tbody>
								<tr>
									<td style="width: 150px;">Nama</td>
									<td>: <strong>{{$name}}</strong></td>
								</tr>
								<tr>
									<td style="width: 150px;">Kelahiran</td>
									<td>: {{$birth}}</td>
								</tr>
								<tr>
									<td style="width: 150px;">Jenis Kelamin</td>
									<td>: {{$gender}}</td>
								</tr>
								<tr>
									<td style="width: 150px;">Warga Negara</td>
									<td>: {{$nationality}}</td>
								</tr>
								<tr>
									<td style="width: 150px;">Agama</td>
									<td>: {{$religion}}</td>
								</tr>
								<tr>
									<td style="width: 150px;">NIK</td>
									<td>: {{$nik}}</td>
								</tr>
								<tr>
									<td style="width: 150px;">Pekerjaan</td>
									<td>: {{$job}}</td>
								</tr>
								<tr>
									<td style="width: 150px;">Alamat</td>
									<td>: {{$alamat}}</td>
								</tr>
							</tbody>
						</table>
					</div>
				</td>
			</tr>
			<tr style="padding-left: 30px;">
				<td style="text-align: left;padding-bottom: 20px">
					<div style="font-size: 15px">
						Orang  tersebut diatas, adalah benar <strong>Warga Tidak Mampu</strong> dan berdomisili di Desa CIMENTENG Kecamatan CURUG KEMBAR Kabupaten SUKABUMI DUSUN I.
					</div>
				</td>
			</tr>
			<tr style="padding-left: 30px;">
				<td style="text-align: left;padding-bottom: 20px">
					<div style="font-size: 15px">
						Demikian Surat Pengantar ini dibuat untuk dipergunakan seperlunya.
					</div>
				</td>
			</tr>
			<table style="width: 100%">
				<colgroup style='width: 50%'></colgroup>
				<colgroup style='width: 50%'></colgroup>
				<tbody>
					<tr>
						<td></td>
						<td style="text-align:left;padding: 25px 0 25px 375px; font-size: 15px;">
							<p>Dibuat di &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Cimenteng</p>
							<p>Pada tanggal : {{ date('d F Y', strtotime($dibuat_pada)) }}</p>
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
								<p>Curug Kembar</p>
								<p style="margin-bottom:100px;">PEMOHON DESA CIMENTENG</p><br>
								<br>
								<br>
								<br>
								<br>
								<br>
								<br>
								<br>
								<br>
								<br>
								<strong><u>{{$name}}</u></strong>
							</div>
						</td>
						<td style="text-align:center; padding-top:0px; padding-bottom:30px;">
							<div style="font-size: 15px;">
								<p>Curug Kembar</p>
								<p style="margin-bottom:100px;">KEPALA DESA CIMENTENG</p><br>
								<br>
								<br>
								<br>
								<br>
								<br>
								<br>
								<br>
								<br>
								<br>
								<strong><u>ASEP SAEPUDIN</u></strong>
							</div>
						</td>
					</tr>
				</tbody>
			</table>
		</tbody>
	</table>
</body>
</html>