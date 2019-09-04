<?php
    /**
     * Author:Dodi
     * Tampilan : Surat Pengantar Pindah
     */

namespace App\Http\Controllers;

use App\DataTables\suratpengantarpindahDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatesuratpengantarpindahRequest;
use App\Http\Requests\UpdatesuratpengantarpindahRequest;
use App\Repositories\suratpengantarpindahRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Models\datapenduduk as Datapenduduk;
use App\Models\suratpengantarpindah;
use BarryPDF;
class suratpengantarpindahController extends Controller
{
    
    public function __construct(suratpengantarpindahRepository $suratpengantarpindahRepo)
    {
        $this->suratpengantarpindahRepository = $suratpengantarpindahRepo;
        $this->middleware('auth');
    }
    
    public function index(suratpengantarpindahDataTable $suratpengantarpindahDataTable)
    {
        return $suratpengantarpindahDataTable->render('suratpindah.index');
    }
    
    public function create()
    {
        $data = Datapenduduk::all();
        return view('suratpindah.create',['data' => $data]);
    }
    
    public function store(CreatesuratpengantarpindahRequest $request)
    {
        $input = $request->all();

        $suratpengantarpindah = $this->suratpengantarpindahRepository->create($input);

        Flash::success('Suratpengantarpindah saved successfully.');

        return redirect(route('suratpindah.index'));
    }
    
    public function show($id)
    {
        $suratpengantarpindah = $this->suratpengantarpindahRepository->findWithoutFail($id);

        if (empty($suratpengantarpindah)) {
            Flash::error('Suratpengantarpindah not found');

            return redirect(route('suratpindah.index'));
        }

        return view('suratpindah.show')->with('suratpengantarpindah', $suratpengantarpindah);
    }
    
    public function edit($id)
    {
        $suratpengantarpindah = $this->suratpengantarpindahRepository->findWithoutFail($id);

        if (empty($suratpengantarpindah)) {
            Flash::error('Suratpengantarpindah not found');

            return redirect(route('suratpindah.index'));
        }
        $data = Datapenduduk::all();
        return view('suratpindah.edit',['data' => $data])->with('suratpengantarpindah', $suratpengantarpindah);
    }
    
     public function update($id, UpdatesuratpengantarpindahRequest $request)
    {
        $suratpengantarpindah = $this->suratpengantarpindahRepository->findWithoutFail($id);

        if (empty($suratpengantarpindah)) {
            Flash::error('Suratpengantarpindah not found');

            return redirect(route('suratpindah.index'));
        }

        $suratpengantarpindah = $this->suratpengantarpindahRepository->update($request->all(), $id);

        Flash::success('Suratpengantarpindah updated successfully.');

        return redirect(route('suratpindah.index'));
    }

    public function destroy($id)
    {
        $suratpengantarpindah = $this->suratpengantarpindahRepository->findWithoutFail($id);

        if (empty($suratpengantarpindah)) {
            Flash::error('Suratpengantarpindah not found');

            return redirect(route('suratpindah.index'));
        }

        $this->suratpengantarpindahRepository->delete($id);

        Flash::success('Suratpengantarpindah deleted successfully.');

        return redirect(route('suratpindah.index'));
    }
    
    public function cetaksurat($id)
    {
        $all = suratpengantarpindah::findOrFail($id);
        $row = datapenduduk::findOrFail($all->nama_atau_nik);
        
        $nama = $row->nama_lengkap;
        $nama_ayah   =$row->nama_lengkap_ayah;
        $nik    =$row->nik;
        $alamat =$row->alamat;
        $nokk   =$row->no_kk;
        $rt     =$row->no_rt;
        $rw     =$row->no_rw;
        
        $data = compact([
            'nama',
            "nama_ayah",
            "nik",
            "nokk",
            "alamat",
            "rt",
            "rw",
        ]);
        $tgl = "092318";
        $pdf = BarryPDF::loadview('suratpindah/cetaksurat',$data,['tgl'=>$tgl])->setPaper('folio','potrait');
        return $pdf->stream();
    }
 
    public function cetaksuratantardesa($id)
    {
        $all = suratpengantarpindah::findOrFail($id);
        $row = datapenduduk::findOrFail($all->nama_atau_nik);
        
        $nama = $row->nama_lengkap;
        $nama_ayah   =$row->nama_lengkap_ayah;
        $nik    =$row->nik;
        $alamat =$row->alamat;
        $nokk   =$row->no_kk;
        $rt     =$row->no_rt;
        $rw     =$row->no_rw;
        
        $data = compact([
            'nama',
            "nama_ayah",
            "nik",
            "nokk",
            "alamat",
            "rt",
            "rw",
        ]);
        $tgl = "092318";
        $pdf = BarryPDF::loadview('suratpindah/cetaksuratantardesa',$data,['tgl'=>$tgl])->setPaper('folio','potrait');
        return $pdf->stream();
    }
    
}