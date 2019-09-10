<?php

namespace App\Http\Controllers\Letter\Covering;

use App\DataTables\KeteranganPenghasilanDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateKeteranganPenghasilanRequest;
use App\Http\Requests\UpdateKeteranganPenghasilanRequest;
use App\Repositories\KeteranganPenghasilanRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use PDF;

class KeteranganPenghasilanController extends AppBaseController
{
	public function cetak($id) {
		// dd(false);
		$data = compact([
			// 'letter_number',
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