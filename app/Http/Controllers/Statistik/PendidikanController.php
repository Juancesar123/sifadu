<?php

namespace App\Http\Controllers\Statistik;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\datapendudukRepository;

class PendidikanController extends Controller
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
        $pendidikan = [
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

        $penduduk = $this->pendudukRepository->get()->count();

        $data = [];
        foreach ($pendidikan as $key => $value) {
            $jumlah = $this->pendudukRepository->findWhere(['pendidikan_akhir' => $key])->count();
            $data[$value] = $jumlah;
        }

        $statistik = $data;

        return view('statistiks.pendidikan.index', compact('statistik', 'pendidikan', 'penduduk'));
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
