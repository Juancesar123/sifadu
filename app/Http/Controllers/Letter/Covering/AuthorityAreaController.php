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

    /** @var  suratketeranganpenguasaantanahRepository */
    private $suratketeranganpenguasaantanahRepository;

    public function __construct(suratketeranganpenguasaantanahRepository $suratketeranganpenguasaantanahRepo)
    {
        $this->suratketeranganpenguasaantanahRepository = $suratketeranganpenguasaantanahRepo;
    }


    public function index($id) {

        $coveringLetter = suratketeranganpenguasaantanah::findOrFail($id);
        $citizen        = datapenduduk::findOrFail($coveringLetter->nik);
        $suratketeranganpenguasaantanah = $this->suratketeranganpenguasaantanahRepository->findWithoutFail($id);

        $letter_number = $suratketeranganpenguasaantanah->nomor_surat;
        $name    = $citizen->nama_lengkap;
        $birth = $citizen->tempat_lahir . ', ' .$citizen->tanggal_lahir;
        $gender_id = $citizen->jenis_kelamin;
        if ($gender_id == 1) {
          $gender = "Laki-laki";
        } else {
          $gender = "Perempuan";
        }
        $nationality = "WNI";
        $religion = $citizen->agama;
        $nik = $citizen->nik;
        $job = $citizen->jenis_pekerjaan;

        $data = compact([
            'letter_number',
            'name',
            "birth",
            "gender",
            "nationality",
            "religion",
            "nik",
            "job",
        ]);


        $pdf = PDF::loadView('pdf.letter.covering.autoritywork', $data, [], [
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
