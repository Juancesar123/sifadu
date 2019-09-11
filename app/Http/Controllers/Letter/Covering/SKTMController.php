<?php

namespace App\Http\Controllers\Letter\Covering;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\suratketerangantidakmampu as SKTM;
use App\Models\datapenduduk;
use App\Models\Profil;
use PDF;
use App\Repositories\suratketerangantidakmampuRepository;

class SKTMController extends Controller
{
	public function cetak($id) {
		$coveringLetter	= SKTM::findOrFail($id);
		$desa			= Profil::findOrFail(1);
		$citizen		= datapenduduk::findOrFail($coveringLetter->nik);

		// dd(
		// 	json_decode($coveringLetter),
		// 	json_decode($desa),
		// 	json_decode($citizen),
		// );

		$letter_number = $coveringLetter->nomor_surat;
		$footer_cetak_data = $coveringLetter->footer_cetak_data;
		$name    = $citizen->nama_lengkap;
		$alamat    = $citizen->alamat;
		$dibuat_pada    = $coveringLetter->created_at;
		$birth = $citizen->tempat_lahir . ', ' .$citizen->tanggal_lahir;
		$gender_id = $citizen->jenis_kelamin;
		if ($gender_id == 1) {
			$gender = "Laki-laki";
		} else {
			$gender = "Perempuan";
		}
		$nationality = "WNI";
		$religion = $citizen->agama;
		$nik = $citizen->nik;
		$job = $citizen->pekerjaan;

		$data = compact([
			'letter_number',
			'alamat',
			'dibuat_pada',
			'name',
			"birth",
			"gender",
			"nationality",
			"religion",
			"nik",
			"job",
			'footer_cetak_data',
			'desa',
		]);


		$pdf = PDF::loadView('pdf.letter.covering.sktm', $data, [], [
			'format'		=> 'folio',
			'margin_left'	=> 10,
			'margin_right'	=> 10,
			'margin_top'	=> 10,
			'margin_bottom'	=> 0,
		]);

		// return ;
		// ob_clean();
		$pdf = $pdf->output();
		return response($pdf, 200,
			[
				'Content-Type'        => 'application/pdf',
				'Content-Length'      =>  strlen($pdf),
				'Content-Disposition' => 'inline; filename="Surat Pengantar KK.pdf"',
				'Cache-Control'       => 'private, max-age=0, must-revalidate',
				'Pragma'              => 'public'
			]
		);
	}
}