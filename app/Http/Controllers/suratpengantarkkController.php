<?php

namespace App\Http\Controllers;

use App\DataTables\suratpengantarkkDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatesuratpengantarkkRequest;
use App\Http\Requests\UpdatesuratpengantarkkRequest;
use App\Repositories\suratpengantarkkRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

use App\Models\suratpengantarkknomor as Nomorpengajuan;
use App\Models\datapenduduk as Datapenduduk;
use Barryvdh\DomPDF\Facade as PDF;

class suratpengantarkkController extends AppBaseController
{
    /** @var  suratpengantarkkRepository */
    private $suratpengantarkkRepository;

    public function __construct(suratpengantarkkRepository $suratpengantarkkRepo)
    {
        $this->suratpengantarkkRepository = $suratpengantarkkRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the suratpengantarkk.
     *
     * @param suratpengantarkkDataTable $suratpengantarkkDataTable
     * @return Response
     */
    public function index(suratpengantarkkDataTable $suratpengantarkkDataTable)
    {
        return $suratpengantarkkDataTable->render('suratpengantarkks.index');
    }

    /**
     * Show the form for creating a new suratpengantarkk.
     *
     * @return Response
     */
    public function create()
    {
        $data = Datapenduduk::All();
        return view('suratpengantarkks.create',['data' => $data]);
    }

    /**
     * Store a newly created suratpengantarkk in storage.
     *
     * @param CreatesuratpengantarkkRequest $request
     *
     * @return Response
     */
    public function store(CreatesuratpengantarkkRequest $request)
    {
        $input = $request->all();

        $suratpengantarkk = $this->suratpengantarkkRepository->create($input);

        Flash::success('Suratpengantarkk berhasil ditambahkan.');

        return redirect(route('suratpengantarkks.index'));
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

        $suratpengantarkk = $this->suratpengantarkkRepository->findWithoutFail($id);

        if (empty($suratpengantarkk)) {
            Flash::error('Suratpengantarkk not found');

            return redirect(route('suratpengantarkks.index'));
        }

        return view('suratpengantarkks.show')->with('suratpengantarkk', $suratpengantarkk);
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
        $suratpengantarkk = $this->suratpengantarkkRepository->findWithoutFail($id);
        if (empty($suratpengantarkk)) {
            Flash::error('Suratpengantarkk not found');
            return redirect(route('suratpengantarkks.index'));
        }
        $kkedit = $suratpengantarkk->get();
        $data = Datapenduduk::where('id',$suratpengantarkk->nik_atau_nama)->get();
        return view('suratpengantarkks.edit',['data' => $data,'kkedit'=>$kkedit])->with('suratpengantarkk', $suratpengantarkk);
    }

    /**
     * Update the specified suratpengantarkk in storage.
     *
     * @param  int              $id
     * @param UpdatesuratpengantarkkRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatesuratpengantarkkRequest $request)
    {
        $suratpengantarkk = $this->suratpengantarkkRepository->findWithoutFail($id);

        if (empty($suratpengantarkk)) {
            Flash::error('Suratpengantarkk not found');

            return redirect(route('suratpengantarkks.index'));
        }

        $suratpengantarkk = $this->suratpengantarkkRepository->update($request->all(), $id);

        Flash::success('Suratpengantarkk berhasil diperbarui.');

        return redirect(route('suratpengantarkks.index'));
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
        $suratpengantarkk = $this->suratpengantarkkRepository->findWithoutFail($id);

        if (empty($suratpengantarkk)) {
            Flash::error('Suratpengantarkk not found');

            return redirect(route('suratpengantarkks.index'));
        }

        $this->suratpengantarkkRepository->delete($id);

        Flash::success('Suratpengantarkk deleted successfully.');

        return redirect(route('suratpengantarkks.index'));
    }


    /*
    AUTHOR : @maswas
    DATE : 21 April 2019
    */
    public function updatenomorurut(){
        $nomorakhir = Nomorpengajuan::first();
        return $nomorakhir->nomor;
    }

    public function blankopengantar($id,$jenis)
    {
        $idpengajuan = $this->suratpengantarkkRepository->findWithoutFail($id);
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

        $pdf = PDF::loadView('suratpengantarkks.was_blankokk', [
            'kk' => $res,
            'header' => $header,
            'maxrows' => 9,
            'tglcetak' => date('d M Y'),
            'jenis' => $jenis,
        ]) -> setPaper('legal', 'landscape');
        return $pdf -> stream();
    }

    public function formpengantarkk($jenis){
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
        $pdf = PDF::loadView('suratpengantarkks.was_blankokk', [
            'kk' => $res,
            'header' => $header,
            'maxrows' => 9,
            'tglcetak' => date('d M Y'),
            'jenis' => $jenis,            
        ]) -> setPaper('legal', 'landscape');
        return $pdf -> stream();        
    }
    
    public function suratkkf16($id){
        $idpengajuan = $this->suratpengantarkkRepository->findWithoutFail($id);
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

        $pdf = PDF::loadView('suratpengantarkks/cetakf16', [
            'nokk' => $res,
            'header' => $header,
            'maxrows' => 9,
            'tglcetak' => date('d M Y'  ),
        ]) -> setPaper('folio', 'potrait');
        return $pdf -> stream();
    }
}
