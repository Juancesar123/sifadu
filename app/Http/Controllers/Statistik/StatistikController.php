<?php

namespace App\Http\Controllers\Statistik;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\datapendudukRepository;
use App\Repositories\agamaRepository;
use App\Repositories\parameterstatuskawinRepository;

class StatistikController extends Controller
{
    protected $pendudukRepository;
    protected $agamaRepository;
    protected $statusKawinRepository;

    public function __construct(
        datapendudukRepository $datapendudukRepository,
        agamaRepository $agamaRepository,
        parameterstatuskawinRepository $parameterstatuskawinRepository
    )
    {
        $this->pendudukRepository = $datapendudukRepository;
        $this->agamaRepository = $agamaRepository;
        $this->statusKawinRepository = $parameterstatuskawinRepository;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Jumlah Penduduk
        $penduduk = $this->pendudukRepository->get()->count();

        // Agama
        $getAgama = $this->agamaRepository->get();

        $dataAgama = [];
        foreach ($getAgama as $row) {
            $jumlahByAgama = $this->pendudukRepository->findWhere(['agama' => strtoupper($row->agama)])->count();
            $dataAgama[$row->agama] = $jumlahByAgama;
        }

        $agama = $dataAgama;

        // Perkawinan
        $getStatusKawin = $this->statusKawinRepository->get();

        $dataKawin = [];
        foreach ($getStatusKawin as $row) {
            $status = strtoupper($row->status_nikah);

            $jumlahByKawin = $this->pendudukRepository->findWhere(['status_kawin' => $status])->count();

            $dataKawin[$status] = $jumlahByKawin;
        }

        $kawin = $dataKawin;

        // Pendidikan
        $getPendidikan = [
            '4' => 'sltp/sederajat',
            '2' => 'Tidak Tamat SD/Sederajat',
            '3' => 'Tamat SD/Sederajat',
            '1' => 'Tidak / Belum Sekolah',
            '5' => 'SLTA/Sederajat',
            '6' => 'Diploma I / II',
            '7' => 'Akademi / Diploma III/ S.Muda',
            '8' => 'Diploma IV/Strata I',
            '9' => 'Strata II'
        ];

        $dataPendidikan = [];
        foreach ($getPendidikan as $key => $value) {
            $jumlahByPendidikan = $this->pendudukRepository->findWhere(['pendidikan_akhir' => $key])->count();
            $dataPendidikan[$value] = $jumlahByPendidikan;
        }

        $pendidikan = $dataPendidikan;

        // Pekerjaan
        $getPekerjaan = [
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

        $dataPekerjaan = [];
        foreach ($getPekerjaan as $key => $value) {
            $jumlahByPekerjaan = $this->pendudukRepository->findWhere(['jenis_pekerjaan' => $key])->count();
            $dataPekerjaan[$value] = $jumlahByPekerjaan;
        }

        $pekerjaan = $dataPekerjaan;

        return view('statistiks.all', compact([
            'penduduk', 'agama', 'kawin', 'pendidikan', 'pekerjaan', 'getPekerjaan'
        ]));
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
