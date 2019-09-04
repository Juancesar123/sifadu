<?php

namespace App\Http\Controllers\Statistik;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\datapendudukRepository;

class PekerjaanController extends Controller
{
    protected $pendudukRepository;

    public function __construct(datapendudukRepository $datapendudukRepository)
    {
        $this->pendudukRepository = $datapendudukRepository;

        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pekerjaan = [
            '1' => 'Belum/Tidak Bekerja',
            '3' => 'pelajar/mahasiswa',
            '2' => 'Mengurus Rumah tangga',
            '4' => 'Pensiunan',
            '9' => 'Petani/Pekebun',
            '10' => 'Peternak',
            '12' => 'Industri',
            '13' => 'Konstruksi',
            '15'=>'Karyawan Swasta',
            '65' => 'GURU',
            '88'=>'Wiraswasta',
            '19' => 'Buruh Harian Lepas',
            '84' => 'Pedagang',
            '5' => 'Pegawai Negri Sipil',
            '16' => 'Karyawan BUMN',
            '17' => 'Karyawan BUMD',
            '18' => 'Karyawan Honorer',
            '19' => 'Buruh Harian Lepas',
            '7' => 'Kepolisian RI',
            '8' => 'Perdagangan',
            '20' => 'Buruh Tani/Perkebunan',
            '21' => 'Buruh Nelayan / Perikanan',
            '22' => 'Buruh Peternakan',
            '23' => 'Pembantu Rumah Tangga',
            '34' => 'Penata Rambut',
            '36' => 'Seniman',
            '42' => 'Pendeta',
            '81' => 'Sopir',
            '14' => 'Transportasi',
            '4' => 'Pensinuan',
            '44' => 'Wartawan',
            '45' => 'Ustadz/Mubaligh',
            '6' => 'Tentara Nasional Indonesia',
            '64' => 'Dosen',
            '73' => 'Bidan',
            '74' => 'Perawat',
            '77' => 'Penyiar Televisi',
            '79' => 'Pelaut'
        ];

        $penduduk = $this->pendudukRepository->get()->count();

        $data = [];
        foreach ($pekerjaan as $key => $value) {
            $jumlah = $this->pendudukRepository->findWhere(['jenis_pekerjaan' => $key])->count();
            $data[$value] = $jumlah;
        }

        $statistik = $data;
        // dd($statistik);

        return view('statistiks.pekerjaan.index', compact('statistik', 'pekerjaan', 'penduduk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
}
