<?php

namespace App\Http\Controllers\Letter\Covering;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\suratketeranganpenguasaantanah;
use App\Models\datapenduduk;
use PDF;
use App\Repositories\suratketeranganpenguasaantanahRepository;

class AuthorityAreaController extends Controller
{
	public function cetak($id) {

		$coveringLetter = suratketeranganpenguasaantanah::findOrFail($id);
		$citizen        = datapenduduk::findOrFail($coveringLetter->nik);

		// dd(
		// 	json_decode($coveringLetter),
		// 	json_decode($citizen)
		// );

		$data = compact([
			'coveringLetter',
			'citizen',
		]);


		$pdf = PDF::loadView('pdf.letter.covering.autoritywork', $data, [], [
			'format'        => 'folio',
			'margin_left'   => 10,
			'margin_right'  => 10,
			'margin_top'    => 10,
			'margin_bottom' => 0,
		]);

		$pdf = $pdf->output();
		return response($pdf, 200,
			[
				'Content-Type'        => 'application/pdf',
				'Content-Length'      =>  strlen($pdf),
				'Content-Disposition' => 'inline; filename="Surat Keterangan Usaha.pdf"',
				'Cache-Control'       => 'private, max-age=0, must-revalidate',
				'Pragma'              => 'public'
			]
		);
	}
}