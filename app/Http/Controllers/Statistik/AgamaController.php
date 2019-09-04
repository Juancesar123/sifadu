<?php

namespace App\Http\Controllers\Statistik;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\agamaRepository;
use App\Repositories\datapendudukRepository;

class AgamaController extends Controller
{
    protected $agamaRepository;

    protected $pendudukRepository;

    public function __construct(agamaRepository $agamaRepository, datapendudukRepository $datapendudukRepository)
    {
        $this->agamaRepository = $agamaRepository;

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
        $agama = $this->agamaRepository->get();

        $data = [];

        foreach ($agama as $key => $row) {
            $agamaPenduduk = $this->pendudukRepository->findWhere(['agama' => strtoupper($row->agama)])->count();
            $data[$row->agama] = $agamaPenduduk;
        }

        $statistik = $data;
        
        return view('statistiks.agama.index', compact('statistik'));
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
