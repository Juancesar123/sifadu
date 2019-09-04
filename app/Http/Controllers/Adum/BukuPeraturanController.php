<?php

namespace App\Http\Controllers\Adum;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use Laracasts\Flash\Flash;

use App\Http\Requests\Adum\BukuPeraturanRequest as BukuPeraturanRequest;
use App\Repositories\Adum\BukuPeraturanRepository;

class BukuPeraturanController extends Controller
{
    protected $bukuPeraturanRepository;

    public function __construct(BukuPeraturanRepository $bukuPeraturanRepository)
    {
        $this->bukuPeraturanRepository = $bukuPeraturanRepository;

        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('adum.buku_peraturan.index');
    }

    public function datatables(Request $request)
    {
        if($request->ajax()) {

            $select = $this->bukuPeraturanRepository->get();

            $no = 1;
            $data = [];
            foreach ($select as $value) {
                $field = [];

                switch ($value->abp_jenis_peraturan){
                    case 2:
                        $jenis = '<label class="label label-info">Peraturan Bersama</label>';
                        break;                        
                    case 3:
                        $jenis = '<label class="label label-info">Peraturan Kepala Desa</label>';
                        break;
                    case 1:
                        $jenis = '<label class="label label-info">Peraturan Desa</label>';
                        break;
                    default:
                        $jenis = '';
                };

                $field['abp_nomor_urut'] = $no;
                $field['abp_jenis_peraturan'] = $jenis;
                $field['abp_tanggal_tetap'] = $value->abp_nomor_urut."/".date("m-d-Y", strtotime($value->abp_tanggal_tetap));
                $field['abp_tentang'] = $value->abp_tentang;
                $field['abp_uraian_singkat'] = $value->abp_uraian_singkat;
                $field['abp_tanggal_sepakat'] = $value->abp_nomor_urut."/".date("m-d-Y", strtotime($value->abp_tanggal_sepakat));
                $field['abp_tanggal_lapor'] = $value->abp_nomor_urut."/".date("m-d-Y", strtotime($value->abp_tanggal_lapor));
                $field['abp_tanggal_undang_lembaran'] = $value->abp_nomor_urut."/".date("m-d-Y", strtotime($value->abp_tanggal_undang_lembaran));
                $field['abp_tanggal_undang_berita'] = $value->abp_nomor_urut."/".date("m-d-Y", strtotime($value->abp_tanggal_undang_berita));
                $field['abp_keterangan'] = $value->abp_keterangan;
                $field['action'] = '
                    <form method="post" action="'.url('adum/peraturan/'. $value->abp_id).'">
                    '.csrf_field().'
                        <input type="hidden" name="_method" value="DELETE">
                        <div class="btn-group">
                            <a title="ubah" href="' . url("adum/peraturan/" . $value->abp_id."/edit") . '" class="btn btn-xs btn-default"><i class="glyphicon glyphicon-edit"></i></a>
                            <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm(\'Are you sure delete this data?\')"><i class="glyphicon glyphicon-trash"></i></button>
                        </div>
                    </form>
                ';
                
                $data[] = $field;
    
                $no = $no + 1;
            }

            return response()->json(['data' => $data]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    
    {
        $jenis = [
            '1' => 'Peraturan Desa', 
            '2' => 'Peraturan Bersama', 
            '3' => 'Peraturan Kepala Desa'
        ];

        return view('adum.buku_peraturan.create', compact('jenis'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BukuPeraturanRequest $request)
    {
        try {
            $request['abk_nomor_urut'] = $this->getMaxNomorUrut();

            $this->bukuPeraturanRepository->create($request->all());

            return redirect(route('adumperaturan'));

        } catch(\Exception $e) {
            Flash::error($e->getMessage());

            return redirect(route('adumperaturan'));
        }
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
        $data = $this->bukuPeraturanRepository->findWithoutFail($id);

        $jenis = [
            '1' => 'Peraturan Desa', 
            '2' => 'Peraturan Bersama', 
            '3' => 'Peraturan Kepala Desa'
        ];

        if (!$data) {
            Flash::error('Data not found');

            return redirect(route('adumperaturan'));
        }
        
        return view('adum.buku_peraturan.edit', compact('data', 'jenis'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BukuPeraturanRequest $request, $id)
    {
        try {
            $data = $this->bukuPeraturanRepository->findWithoutFail($id);

            if (!$data) {
                Flash::error('Data not found');

                return redirect(route('adumperaturan'));
            }

            $update = $this->bukuPeraturanRepository->update($request->all(), $id);

            Flash::success('Buku peraturan desa edited successfully');

            return redirect(route('adumperaturan'));
        } catch(\Exception $e) {
            Flash::error($e->getMessage());

            return redirect(route('adumperaturan'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $data = $this->bukuPeraturanRepository->findWithoutFail($id);

            if (!$data) {
                Flash::error('Data not found');

                return redirect(route('adumperaturan'));
            }

            $update = $this->bukuPeraturanRepository->delete($id);

            flash('Buku peraturan desa deleted successfully')->success();

            return redirect(route('adumperaturan'));
        } catch(\Exception $e) {
            Flash::error($e->getMessage());

            return redirect(route('adumperaturan'));
        }
    }

    public function getMaxNomorUrut()
    {
        $nomor = $this->bukuPeraturanRepository->get()->count();

        $nomorUrut = (int) $nomor + 1;

        return $nomorUrut;
    }
}
