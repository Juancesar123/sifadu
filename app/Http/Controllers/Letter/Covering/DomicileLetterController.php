<?php

namespace App\Http\Controllers\Letter\Covering;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\suratketerangandomisili;
use App\Models\datapenduduk;
use PDF;
use App\Repositories\suratketerangandomisiliRepository;

class DomicileLetterController extends Controller
{
	/** @var  suratketerangandomisiliRepository */
	private $suratketerangandomisiliRepository;

	public function __construct(suratketerangandomisiliRepository $suratketerangandomisiliRepo)
	{
		$this->suratketerangandomisiliRepository = $suratketerangandomisiliRepo;
	}


	public function cetak($id) {

		$coveringLetter = suratketerangandomisili::findOrFail($id);
		$citizen        = datapenduduk::findOrFail($coveringLetter->nik);

		// dd(
		// 	json_decode($coveringLetter),
		// 	json_decode($citizen),
		// );

		$data = compact([
			'coveringLetter',
			'citizen',
		]);


		$pdf = PDF::loadView('pdf.letter.covering.domicile_letter', $data, [], [
			'format'        => 'folio',
			'margin_left'   => 10,
			'margin_right'  => 10,
			'margin_top'    => 10,
			'margin_bottom' => 0,
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