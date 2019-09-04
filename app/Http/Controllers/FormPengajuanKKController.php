<?php

namespace App\Http\Controllers;

use App\DataTables\FormPengajuanKKDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateFormPengajuanKKRequest;
use App\Http\Requests\UpdateFormPengajuanKKRequest;
use App\Repositories\FormPengajuanKKRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Models\FormPengajuanKK;
use App\Models\suratpengantarkknomor as Nomorpengajuan;
use App\Models\datapenduduk as Datapenduduk;
use Barryvdh\DomPDF\Facade as PDF;

class FormPengajuanKKController extends AppBaseController
{
    /** @var  FormPengajuanKKRepository */
    private $FormPengajuanKKRepository;

    public function __construct(FormPengajuanKKRepository $FormPengajuanKKRepo)
    {
        $this->FormPengajuanKKRepository = $FormPengajuanKKRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the formpengajuankk.
     *
     * @param FormPengajuanKKDataTable $FormPengajuanKKDataTable
     * @return Response
     */
    public function index(FormPengajuanKKDataTable $FormPengajuanKKDataTable)
    {
        return $FormPengajuanKKDataTable->render('formpengajuankks.index');
    }

    /**
     * Show the form for creating a new formpengajuankk.
     *
     * @return Response
     */
    public function create()
    {
        $data = Datapenduduk::where('status', '0')->get();
        return view('formpengajuankks.create',['data' => $data]);
    }

    /**
     * Store a newly created formpengajuankk in storage.
     *
     * @param CreateFormPengajuanKKRequest $request
     *
     * @return Response
     */
    public function store(CreateFormPengajuanKKRequest $request)
    {
        // $input = $request->all();
        $input                      = new FormPengajuanKK();
        $input->nik_atau_nama       = $request->nik_atau_nama;
        $input->telepon             = $request->telepon;
        $input->jumlah_keluarga     = $request->jumlah_keluarga;
        $input->footer_cetak_data   = $request->footer_cetak_data;
        $input->nomor_surat         = $this->generateNomorSurat($input->nik_atau_nama);
        //$formpengajuankk = $this->FormPengajuanKKRepository->create($input);

        if ($input->save()) {
            $data   = Datapenduduk::where('id', $input->nik_atau_nama)->first();
            $data->status = '1';
            $data->save();

            Flash::success('FormPengajuanKK berhasil ditambahkan.');
            return redirect()->route('detailkk.create', ['nomor_surat' => $input->nomor_surat]);
            
        } else {
            Flash::success('FormPengajuanKK gagal successfully.');
            return redirect()->route('formpengajuankk.index');
        }

        
    }

    public function viewsuratdukacapil($id)
    {
        $suratpengantarktp = $this->suratpengantarktpRepository->findWithoutFail($id);
        return view('suratpengantarktps.cetak_surat_dukacapil')->with('suratpengantarktp', $suratpengantarktp);

    }

    public function viewsuratakartukeluarga($id)
    {
        $suratpengantarkk = $this->suratpengantarkkRepository->findWithoutFail($id);
        return view('suratpengantarkks.cetakViewKK')->with('suratpengantarkk', $suratpengantarkk);

    }

    /**
     * Display the specified suratpengantarkk.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {

        // $formpengajuankk = $this->FormPengajuanKKRepository->findWithoutFail($id);

        // if (empty($formpengajuankk)) {
        //     Flash::error('Form Pengajuan KK1 not found');

        //     return redirect(route('formpengajuankk.index'));
        // }

        // $data = FormPengajuanKK::join('datapenduduks', 'form_pengajuan_kks.nik_atau_nama', '=', 'datapenduduks.id')
        //         ->select('form_pengajuan_kks.*', 'datapenduduks.nik', 'datapenduduks.nama_lengkap')->where('id', $id)->first();

        $data = FormPengajuanKK::with('datapenduduk', 'detailkk')->where('id', $id)->first();
        
        return view('formpengajuankks.show', compact('data'));
    }

    /**
     * Show the form for editing the specified suratpengantarkk.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $formpengajuankk = $this->FormPengajuanKKRepository->findWithoutFail($id);
        if (empty($formpengajuankk)) {
            Flash::error('form pengajuan kk not found');
            return redirect()->route('formpengajuankk.index');
        }
        $kkedit = $formpengajuankk->get();
        // $data = Datapenduduk::where('id',$formpengajuankk->nik_atau_nama)->get();
        $data       = Datapenduduk::all();
        return view('formpengajuankks.edit',['data' => $data,'kkedit'=>$kkedit])->with('formpengajuankk', $formpengajuankk);
    }

    /**
     * Update the specified form pengajuan kk in storage.
     *
     * @param  int              $id
     * @param UpdateformpengajuankkRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFormPengajuanKKRequest $request)
    {
        $data   = FormPengajuanKK::with('datapenduduk')->where('id', $id)->first();
        $data->nik_atau_nama       = $request->nik_atau_nama;
        $data->telepon             = $request->telepon;
        $data->jumlah_keluarga     = $request->jumlah_keluarga;
        $data->footer_cetak_data   = $request->footer_cetak_data;

        if ($request->nik_atau_nama != $data->nik_atau_nama) {
            $data->datapenduduk->status = '0';
            $data->datapenduduk->save();

            $datapenduduk   = Datapenduduk::where('id', $request->nik_atau_nama)->first();
            $datapenduduk->status = '1';
            $datapenduduk->save();

            $data->nik_atau_nama = $request->nik_atau_nama;
        }

        if ($data->save()) {
            Flash::success('Data Pengajuan Form Kartu Keluarga berhasil di edit', $data->nik_atau_nama);
        } else {
            Flash::success('Data Pengajuan Form Kartu Keluarga gagal di edit', $data->nik_atau_nama);
        }


        // $formpengajuankk = $this->FormPengajuanKKRepository->findWithoutFail($id);

        // if (empty($formpengajuankk)) {
        //     Flash::error('Surat pengantar kk not found');

        //     return redirect()->route('formpengajuankks.index');
        // }

        // Flash::success('form pengajuan kk berhasil diperbarui.');
        return redirect()->route('formpengajuankk.index');
    }

    /**
     * Remove the specified suratpengantarkk from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $data   = FormPengajuanKK::with('datapenduduk')->where('id', $id)->first();
        
        if (isset($data->datapenduduk)) {
            $data->datapenduduk->status = '0';
            $data->datapenduduk->save();
        }

        //$formpengajuankk = $this->FormPengajuanKKRepository->findWithoutFail($id);

        if (empty($data)) {
            Flash::error('Form Pengajuan KK not found');
            return redirect()->route('formpengajuankks.index');
        }

        $data->delete($id);
        Flash::success('Form Pengajuan KK deleted successfully.');
        return redirect()->route('formpengajuankk.index');
    }


    /*
    AUTHOR : @masaji
    DATE : 21 Juni 2019
    */
    public function updatenomorurut(){
        $nomorakhir = Nomorpengajuan::first();
        return $nomorakhir->nomor;
    }

    public function blankopengajuan($id,$jenis)
    {
        $idpengajuan = $this->FormPengajuanKKRepository->findWithoutFail($id);
        $idpenduduk = $idpengajuan->nik_atau_nama;
        $nokk = Datapenduduk::select('no_kk')->where('id',$idpenduduk)->first();
        $res = Datapenduduk::where('id',$idpenduduk)
                            ->orWhere('no_kk',$nokk->no_kk)
                            ->distinct()
                            ->get();

        $nohp = str_split($idpengajuan->telepon);
        $rt = str_split($res[0]->no_rt);
        $rw = str_split($res[0]->no_rw);
        $jmlkeluarga = str_split($idpengajuan->jumlah_keluarga);

        $kepalakeluarga = Datapenduduk::select('nama_lengkap','alamat')
                                        ->where('no_kk','=',$res[0]->no_kk,'and')
                                        ->orWhere('hub_kel','=','Kepala_keluarga')->first();

        $header = array(
            'nomor' => $this->updatenomorurut(),
            'kepala' => $kepalakeluarga->nama_lengkap,
            'alamat' => $kepalakeluarga->alamat,
            'telepon' => $nohp,
            'jmlkeluarga' => $jmlkeluarga,
            'rt' => $rt,
            'rw' => $rw,
        );

        $updatenomor = Nomorpengajuan::first();
        $updatenomor->nomor = $updatenomor->nomor + 1;
        $updatenomor->save();

        $pdf = PDF::loadView('formpengajuankks.was_blankokk', [
            'kk' => $res,
            'header' => $header,
            'maxrows' => 9,
            'tglcetak' => date('d M Y'),
            'jenis' => $jenis,
        ]) -> setPaper('legal', 'landscape');
        return $pdf -> stream();
    }

    public function formpengajuankk($jenis){
        $res = [0];
        $header = array(
            'nomor' => "",
            'kepala' => "",
            'alamat' => "",
            'telepon' => [],
            'jmlkeluarga' => [],
            'rt' => [],
            'rw' => [],
        );
        $pdf = PDF::loadView('formpengajuankks.was_blankokk', [
            'kk' => $res,
            'header' => $header,
            'maxrows' => 9,
            'tglcetak' => date('d M Y'),
            'jenis' => $jenis,            
        ]) -> setPaper('legal', 'landscape');
        return $pdf -> stream();        
    }


    public function generateNomorSurat($nomorPengajuan)
    {
        $format         = date('dmy') . '%s%s';
        $currentDate    = date('d-m-Y');

        $data           = FormPengajuanKK::where('created_at', 'LIKE', $currentDate . '%')->max('id');
        $pengajuanId    = isset($data) ? $data + 1 : 1;

        $nomorSurat     = sprintf($format, $pengajuanId, $nomorPengajuan);
        return $nomorSurat;
    }
}