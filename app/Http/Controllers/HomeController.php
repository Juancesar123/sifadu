<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ProfilRepository;
use App\Repositories\datapendudukRepository;
use App\Models\Setting;

class HomeController extends Controller
{
    protected $profilRepository;

    protected $pendudukRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ProfilRepository $profilRepository, datapendudukRepository $pendudukRepository)
    {
        $this->profilRepository = $profilRepository;
        $this->pendudukRepository = $pendudukRepository;
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get Profil Desa
        $desa = $this->profilRepository->get()->first();

        $batas = json_decode($desa->profil_batas, true);

	    $jumlahPenduduk = $this->pendudukRepository->get()->count();
		$logo = Setting::where('attribute', 'LOGO_BANNER_HOME')->first();

        return view('home', compact([
            'desa', 'batas', 'jumlahPenduduk', 'logo'
        ]));
    }

    public function update(Request $request, $id)
    {
        $profil = $this->profilRepository->findWithoutFail($id);

        $request['profil_batas'] = json_encode($request->profil_batas, true);

        if($request->hasFile('userfile')) {
            $destinationPath = 'img/logo';

            $file = $request->file('userfile');

            $fileName = 'logo_sifadu.png';

            $file->move($destinationPath, $fileName);

            $request['profil_logo'] = $fileName;
        } else {
            $request['profil_logo'] = $profil->profil_logo;
        }

        $this->profilRepository->update($request->all(), $id);

        return redirect('home');
    }
}