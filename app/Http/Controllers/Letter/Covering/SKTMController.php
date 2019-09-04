<?php

namespace App\Http\Controllers\Letter\Covering;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\suratketerangantidakmampu;
use App\Models\datapenduduk;
use PDF;
use App\Repositories\suratketerangantidakmampuRepository;

class SKTMController extends Controller

{

    /** @var  suratketerangantidakmampuRepository */
    private $suratketerangantidakmampuRepository;

    public function __construct(suratketerangantidakmampuRepository $suratketerangantidakmampuRepo)
    {
        $this->suratketerangantidakmampuRepository = $suratketerangantidakmampuRepo;
    }


    public function index($id) {

        $coveringLetter = suratketerangantidakmampu::findOrFail($id);
        $citizen        = datapenduduk::findOrFail($coveringLetter->nik);
        $suratketerangantidakmampu = $this->suratketerangantidakmampuRepository->findWithoutFail($id);
//dd($suratketerangantidakmampu);
        $letter_number = $suratketerangantidakmampu->nomor_surat;
        $name    = $citizen->nama_lengkap;
        $alamat    = $citizen->alamat;
        $dibuat_pada    = $coveringLetter->created_at;
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
        $job = $citizen->pekerjaan;

        $data = compact([
            'letter_number',
            'alamat',
            'dibuat_pada',
            'name',
            "birth",
            "gender",
            "nationality",
            "religion",
            "nik",
            "job",
        ]);


        $pdf = PDF::loadView('pdf.letter.covering.sktm', $data, [], [
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
