<?php

namespace App\Http\Controllers\Letter\Covering;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\suratketeranganusaha;
use App\Models\datapenduduk;
use PDF;
use App\Repositories\suratketeranganusahaRepository;

class DescWorkController extends Controller

{

	/** @var  suratketeranganusahaRepository */
	private $suratketeranganusahaRepository;

	public function __construct(suratketeranganusahaRepository $suratketeranganusahaRepo)
	{
		$this->suratketeranganusahaRepository = $suratketeranganusahaRepo;
	}


	public function index($id) {

		$coveringLetter = suratketeranganusaha::findOrFail($id);
		$citizen        = datapenduduk::findOrFail($coveringLetter->nik);

		$data = compact([
			'coveringLetter',
			'citizen',
		]);

		// dd(
		// 	json_decode($coveringLetter),
		// 	json_decode($citizen),
		// );

		$pdf = PDF::loadView('pdf.letter.covering.description_work', $data, [], [
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
				'Content-Disposition' => 'inline; filename="Surat Keterangan Usaha.pdf"',
				'Cache-Control'       => 'private, max-age=0, must-revalidate',
				'Pragma'              => 'public'
			]
		);
	}
}