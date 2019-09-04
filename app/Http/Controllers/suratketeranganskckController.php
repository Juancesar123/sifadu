<?php

namespace App\Http\Controllers;

use App\DataTables\suratketeranganskckDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatesuratketeranganskckRequest;
use App\Http\Requests\UpdatesuratketeranganskckRequest;
use App\Repositories\suratketeranganskckRepository;
use Flash;
use PDF;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Models\jenispekerjaan;
use App\Models\suratketeranganskck;
use App\Models\datapenduduk as Datapenduduk;
class suratketeranganskckController extends AppBaseController
{
    /** @var  suratketeranganskckRepository */
    private $suratketeranganskckRepository;

    public function __construct(suratketeranganskckRepository $suratketeranganskckRepo)
    {
        $this->suratketeranganskckRepository = $suratketeranganskckRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the suratketeranganskck.
     *
     * @param suratketeranganskckDataTable $suratketeranganskckDataTable
     * @return Response
     */
    public function index(suratketeranganskckDataTable $suratketeranganskckDataTable)
    {
        return $suratketeranganskckDataTable->render('suratketeranganskcks.index');
    }

    /**
     * Show the form for creating a new suratketeranganskck.
     *
     * @return Response
     */
    public function create()
    {
        $data = Datapenduduk::all();
        $work = jenispekerjaan::all();
        
        return view('suratketeranganskcks.create', compact('data', 'work'));
    }

    /**
     * Store a newly created suratketeranganskck in storage.
     *
     * @param CreatesuratketeranganskckRequest $request
     *
     * @return Response
     */
    public function store(CreatesuratketeranganskckRequest $request)
    {
        $input                = new suratketeranganskck();
        $input->nik          = $request->nik;
        $input->id_pekerjaan = $request->id_pekerjaan;
        $input->keperluan    = $request->keperluan;
        $input->start_date   = $request->start_date;
        $input->end_date   = $request->end_date;
        $input->keterangan    = $request->keterangan;
        $input->footer_cetak_data   = $request->footer_cetak_data;
        $input->nomor_surat     = $this->generateNumb($input->nik);
        $input->save();
  
        // $input = $request->all();

        // $suratketeranganskck = $this->suratketeranganskckRepository->create($input);

        Flash::success('Surat Keterangan SKCK berhasil di tambahkan.');
        return redirect()->route('suratketeranganskcks.index');
    }

    /**
     * Display the specified suratketeranganskck.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $suratketeranganskck = $this->suratketeranganskckRepository->findWithoutFail($id);
      
        if (empty($suratketeranganskck)) {
            Flash::error('Suratketeranganskck not found');

            return redirect(route('suratketeranganskcks.index'));
        }

        return view('suratketeranganskcks.show', compact('suratketeranganskck'));
    }

    /**
     * Show the form for editing the specified suratketeranganskck.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $suratketeranganskck = $this->suratketeranganskckRepository->findWithoutFail($id);

        if (empty($suratketeranganskck)) {
            Flash::error('Data Surat keterangan SKCK tidak ditemukan');

            return redirect()->route('suratketeranganskcks.index');
        }
        $data = Datapenduduk::all();
        
        $work = jenispekerjaan::all();
        return view('suratketeranganskcks.edit', compact('data','work'))->with('suratketeranganskck', $suratketeranganskck);
    }

    /**
     * Update the specified suratketeranganskck in storage.
     *
     * @param  int              $id
     * @param UpdatesuratketeranganskckRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatesuratketeranganskckRequest $request)
    {
        $suratketeranganskck = $this->suratketeranganskckRepository->findWithoutFail($id);

        if (empty($suratketeranganskck)) {
            Flash::error('Data Surat keterangan SKCK tidak ditemukan');

            return redirect()->route('suratketeranganskcks.index');
        }

        $suratketeranganskck = $this->suratketeranganskckRepository->update($request->all(), $id);

        Flash::success('Data Surat keterangan SKCK berhasil di edit');

        return redirect()->route('suratketeranganskcks.index');
    }

    /**
     * Remove the specified suratketeranganskck from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $suratketeranganskck = $this->suratketeranganskckRepository->findWithoutFail($id);

        if (empty($suratketeranganskck)) {
            Flash::error('Data Surat keterangan SKCK tidak ditemukan');

            return redirect()->route('suratketeranganskcks.index');
        }

        $this->suratketeranganskckRepository->delete($id);

        Flash::success('Data Surat keterangan SKCK berhasil dihapus');

        return redirect()->route('suratketeranganskcks.index');
    }

    public function printSKCK($id)
    {

            $coveringLetter = suratketeranganskck::findOrFail($id);
            $citizen        = datapenduduk::findOrFail($coveringLetter->nik);
    
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
    
            $data = compact([
                'coveringLetter',
                'name',
                "code",
                "familyCode",
                "address",
                "neighborhoodAssn",
                "citizenhoodAssn",
            ]);
    
            $pdf = PDF::loadView('suratketeranganskcks.pdf', $data, [], [
                'format'        => [215, 330],
                'margin_left'   => 20,
                'margin_right'  => 20,
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

    public function generateNumb($idNumber) {
        $format       = date('dmy') . '%s%s';
        $currentDate  = date('d-m-Y');

        $data         = suratketeranganskck::where('created_at', 'LIKE', $currentDate . '%')->max('id');
        $ketSkckId    = isset($data) ? $data + 1 : 1;

        $numbGen      = sprintf($format, $ketSkckId, $idNumber);
        return $numbGen;
    }
}
