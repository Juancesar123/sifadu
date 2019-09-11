<?php

namespace App\Http\Controllers\Letter\Covering;

use App\Http\Requests;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use PDF;
use App\Models\datapenduduk as Penduduk;
use App\Models\KeteranganPenghasilan;
use App\Models\Profil;

class KeteranganPenghasilanController extends AppBaseController
{
	public function cetak($id) {
		$coveringLetter = KeteranganPenghasilan::findOrFail($id);
		$citizen = Penduduk::findOrFail($coveringLetter->nik);
		$desa = Profil::findOrFail(1);

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
		$pdf = PDF::loadView('pdf.letter.covering.keterangan_penghasilan', $data, [], [
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