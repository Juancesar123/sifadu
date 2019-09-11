<?php

namespace App\Http\Controllers\Letter\Covering;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\suratpengantarktp;
use App\Models\datapenduduk;
use App\Models\Profil;
use PDF;

class IdentityCardController extends Controller
{
    //
    public function index($id) {

        $coveringLetter = suratpengantarktp::findOrFail($id);
        $citizen        = datapenduduk::findOrFail($coveringLetter->nama_atau_nik);

        $letterNumber = $coveringLetter->nomor_surat;
        $datecreate = $coveringLetter->created_at;
        $name    = $citizen->nama_lengkap;
        $code    = $citizen->nik;
        $address = $citizen->alamat;

        $familyCode       = $citizen->no_kk;
        $neighborhoodAssn = $citizen->no_rt;
        $citizenhoodAssn  = $citizen->no_rw;

        $neighborhoodAssn = sprintf('%03d', $neighborhoodAssn);
        $citizenhoodAssn  = sprintf('%03d', $citizenhoodAssn);

        $neighborhoodAssn = str_split($neighborhoodAssn);
        $citizenhoodAssn  = str_split($citizenhoodAssn);

        $desa = Profil::findOrFail(1);

        $data = compact([
            'letterNumber',
            'datecreate',
            'name',
            "code",
            "familyCode",
            "address",
            "neighborhoodAssn",
            "citizenhoodAssn",
            'desa'
        ]);

        $pdf = PDF::loadView('pdf.letter.covering.identity_card', $data, [], [
            'format'        => [210, 165],
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
            'Content-Disposition' => 'inline; filename="Surat Pengantar KTP.pdf"',
            'Cache-Control'       => 'private, max-age=0, must-revalidate',
            'Pragma'              => 'public'
        ]
    );
    }
}