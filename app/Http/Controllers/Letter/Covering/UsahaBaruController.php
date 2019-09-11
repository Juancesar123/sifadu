<?php

namespace App\Http\Controllers\Letter\Covering;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\datapenduduk as Penduduk;
use App\Models\Profil;
use App\Models\KeteranganUsahaBaru;
use PDF;

class UsahaBaruController extends Controller
{

	public function cetak($id) {
		$coveringLetter	= KeteranganUsahaBaru::findOrFail($id);
		$desa		= Profil::findOrFail(1);
		$citizen	= Penduduk::findOrFail($coveringLetter->nik);

		// dd(
		// 	json_decode($coveringLetter),
		// 	json_decode($citizen),
		// 	json_decode($desa),
		// );

		$data = compact([
			'coveringLetter',
			'citizen',
			'desa',
		]);

		$pdf = PDF::loadView('pdf.letter.covering.usaha_baru_ttd_kades', $data, [], [
			'format'		=> 'folio',
			'margin_left'	=> 10,
			'margin_right'	=> 10,
			'margin_top'	=> 10,
			'margin_bottom'	=> 0,
		]);

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