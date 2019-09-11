<?php

namespace App\Http\Controllers\Letter\Covering;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\datapenduduk as Penduduk;
use App\Models\KeteranganKelahiran;
use App\Models\Profil;
use PDF;

class KeteranganKelahiranController extends Controller
{
	public function cetak($id) {
		$coveringLetter	= KeteranganKelahiran::findOrFail($id);
		$desa = Profil::findOrFail(1);
		$ayah = Penduduk::findOrFail($coveringLetter->nik_suami);
		$ibu = Penduduk::findOrFail($coveringLetter->nik_istri);

		// dd(
		// 	json_decode($coveringLetter),
		// 	json_decode($ayah),
		// 	json_decode($ibu),
		// 	json_decode($desa),
		// );

		$data = compact([
			'coveringLetter',
			'ayah',
			'ibu',
			'desa',
		]);
		$pdf = PDF::loadView('pdf.letter.covering.keterangan_kelahiran_baru_ttd_kades', $data, [], [
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