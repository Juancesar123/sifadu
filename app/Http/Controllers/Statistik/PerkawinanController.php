<?php

namespace App\Http\Controllers\Statistik;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\parameterstatuskawinRepository;
use App\Repositories\datapendudukRepository;

class PerkawinanController extends Controller
{
    protected $parameterstatuskawinRepository;

    protected $pendudukRepository;

    public function __construct(parameterstatuskawinRepository $parameterstatuskawinRepository, datapendudukRepository $datapendudukRepository)
    {
        $this->parameterstatuskawinRepository = $parameterstatuskawinRepository;

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
        $statusKawin = $this->parameterstatuskawinRepository->get();

        $data = [];
        foreach ($statusKawin as $key => $row) {
            $status = strtoupper($row->status_nikah);

            $jumlah = $this->pendudukRepository->findWhere(['status_kawin' => $status])->count();

            $data[$status] = $jumlah;
        }

        $statistik = $data;

        return view('statistiks.kawin.index', compact('statistik'));
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
