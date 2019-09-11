<?php

namespace App\Http\Controllers\Letter\Covering;

use App\Http\Controllers\Controller;
use App\Models\datapenduduk as Penduduk;
use App\Models\KeteranganMenikah;
use App\Models\Profil;
use PDF;

class SKMenikahController extends Controller
{
	public function cetak($id) {
		$coveringLetter	= KeteranganMenikah::findOrFail($id);
		$desa = Profil::findOrFail(1);
		$mlakilaki		= Penduduk::findOrFail($coveringLetter->nik_mempelai_satu);
		$mperempuan		= Penduduk::findOrFail($coveringLetter->nik_mempelai_dua);

		// dd(
		// 	json_decode($coveringLetter),
		// 	json_decode($mlakilaki),
		// 	json_decode($mperempuan),
		// 	json_decode($desa),
		// );

		$data = compact([
			'coveringLetter',
			'mlakilaki',
			'mperempuan',
			'desa',
		]);

		$pdf = PDF::loadView('pdf.letter.covering.sk_menikah', $data, [], [
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