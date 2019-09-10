<?php

namespace App\Http\Controllers\Letter\Covering;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\suratketeranganskck;
use App\Models\datapenduduk;
use PDF;
use App\Repositories\suratketeranganskckRepository;

class SkckController extends Controller

{

	/** @var  suratketeranganskckRepository */
	private $suratketeranganskckRepository;

	public function __construct(suratketeranganskckRepository $suratketeranganskckRepo)
	{
		$this->suratketeranganskckRepository = $suratketeranganskckRepo;
	}


	public function index($id) {

		$coveringLetter = suratketeranganskck::findOrFail($id);
		$citizen        = datapenduduk::findOrFail($coveringLetter->nik);


		$data = compact([
			'coveringLetter',
			'citizen',
		]);


		$pdf = PDF::loadView('pdf.letter.covering.skck', $data, [], [
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
				'Content-Disposition' => 'inline; filename="Surat Pengantar SKCK.pdf"',
				'Cache-Control'       => 'private, max-age=0, must-revalidate',
				'Pragma'              => 'public'
			]
		);
	}
}