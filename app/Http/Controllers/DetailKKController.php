<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateDetailkkRequest;
use App\Http\Requests\UpdateDetailkkRequest;
use App\Models\datapenduduk as Datapenduduk;
use App\Models\DetailKK as Detailkk;
use App\Models\FormPengajuanKK as Formpengajuankk;
use Flash;

class DetailKKController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('detailkks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateDetailkkRequest $request)
    {
        $nomorSurat         = $request->nomor_surat;
        $formpengajuankk    = Formpengajuankk::with('datapenduduk')->where('nomor_surat', $nomorSurat)->first();
        $detailString       = $formpengajuankk->nama_lengkap . " (datapenduduk " . $formpengajuankk->datapenduduk->id . ")";
       //below not fiks
        $kodeNN         = $request->nik;

        foreach (array_filter($request->nama_lengkap) as $key => $namaLengkap) {
            $datapenduduk = Datapenduduk::where('nik', $kodeNN[$key])->first();

            if (!empty($datapenduduk)) {
                $detailKK                  = new Detailkk();
                $detailKK->nomor_surat     = $nomorSurat;
                $detailKK->nik             = $datapenduduk->nik;
                $detailKK->nama_lengkap    = $datapenduduk->nama_lengkap;
                $detailKK->save();
            } else {
                \Flash::error('Form Pengajuan KK %s gagal disimpan', $detailString);
                return redirect()->back();
            }

        }

        \Flash::success('Form Pengajuan KK %s berhasil disimpan', $detailString);

        return redirect()->route('formpengajuankk.show', $formpengajuankk->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($nomorSurat)
    {
        $data = FormPengajuanKK::with('datapenduduk')->where('nomor_surat', $nomorSurat)->first();
        
        return view('detailkks.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDetailkkRequest $request, $nomorSurat)
    {
        $data = Formpengajuankk::where('nomor_surat', $nomorSurat)->first();

        /**
         * Makanan
         *
         */
        $detailKK = [];

        foreach ($request->nama_lengkap as $key => $val) {
            $datapenduduk = datapenduduk::where('nik', $request->nik[$key])->first();

            if (!empty($datapenduduk)) {
                $listDatapenduduk = [
                    'nomor_surat'   => $nomorSurat,
                    'nik'           => $request->nik[$key],
                    'nama_lengkap'  => $datapenduduk->nama_lengkap,
                    'status'        => isset($request->status_kk[$key]) ? $request->status_kk[$key] : '0'
                ];

                if (isset($request->id_form_pengajuan_kk[$key])) {
                    $idDetailKK = $request->id_form_pengajuan_kk[$key];
                    $dKK           = Detailkk::where('id', $idDetailKK)->first();
                   
                    if ($dKK->status == '1') {
                        $listDatapenduduk = [
                            'nomor_surat'   => $nomorSurat,
                            'nik'           => $dKK->nik,
                            'nama_lengkap'  => $datapenduduk->nama_lengkap,
                            'status'        => '1'
                        ];
                    } else {
                        $listDatapenduduk = [
                            'nomor_surat'   => $nomorSurat,
                            'nik'           => $dKK->nik[$key],
                            'nama_lengkap'  => $datapenduduk->nama_lengkap,
                            'status'        => '1'
                        ];
                    }

                }

                array_push($detailKK, $listDatapenduduk);
            }

        }

        Detailkk::where('nomor_surat', $nomorSurat)->delete();
        $data->syncDetailkk()->sync($detailKK);

       

        \Flash::success('Data pesanan %s berhasil diubah', $data->nama);

        return redirect()->route('formpengajuankk.show', $data->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function cariDataPenduduk(Request $request)
    {
        
        if ($request->ajax()) {

            $datapenduduk = Datapenduduk::where('status', '1')->orWhere('nama_lengkap', 'LIKE', '%' . $request->search . '%')
                                                             // ->limit(20)
                                                             ->get();

            if ($datapenduduk->count()) {
                return response()->json($datapenduduk->toArray());
            } else {
                return response()->json([['nama_lengkap' => 'data kosong']]);
            }

        }

        return;
    }
}
