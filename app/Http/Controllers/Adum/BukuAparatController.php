<?php

namespace App\Http\Controllers\Adum;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use Laracasts\Flash\Flash;

use App\Http\Requests\Adum\BukuAparatRequest as BukuAparatRequest;
use App\Repositories\Adum\BukuAparatRepository;

class BukuAparatController extends Controller
{
    protected $bukuAparatRepository;

    public function __construct(BukuAparatRepository $bukuAparatRepository)
    {
        $this->bukuAparatRepository = $bukuAparatRepository;

        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('adum.buku_aparat.index');
    }

    public function datatables(Request $request)
    {
        if($request->ajax()) {

            $select = $this->bukuAparatRepository->get();

            $no = 1;
            $data = [];
            foreach ($select as $value) {
                $field = [];

                $field['abap_nomor'] = $no;
                $field['abap_nomor_urut'] = $value->abap_nomor_urut;
                $field['abap_nama'] = $value->abap_nama;
                $field['abap_no_aparat'] = $value->abap_no_aparat;
                $field['abap_no_pegawai'] = $value->abap_no_pegawai;
                $field['abap_jenis_kelamin'] = $value->abap_jenis_kelamin;
                $field['abap_ttl'] = $value->abap_ttl;
                $field['abap_agama'] = $value->abap_agama;
                $field['abap_golongan'] = $value->abap_golongan;
                $field['abap_jabatan'] = $value->abap_jabatan;
                $field['abap_pendidikan'] = $value->abap_pendidikan;
                $field['abap_no_tanggal_pengangkatan'] = $value->abap_nomor_urut.'/'.date("d-m-Y", strtotime($value->abap_no_tanggal_pengangkatan));
                $field['abap_no_tanggal_pemberhentian'] = $value->abap_nomor_urut.'/'.date("d-m-Y", strtotime($value->abap_no_tanggal_pemberhentian));
                $field['abap_ket'] = $value->abap_ket;

                $field['action'] = '
                    <form method="post" action="'.url('adum/aparat/'. $value->abap_id).'">
                    '.csrf_field().'
                        <input type="hidden" name="_method" value="DELETE">
                        <div class="btn-group">
                            <a title="ubah" href="' . url("adum/aparat/" . $value->abap_id."/edit") . '" class="btn btn-xs btn-default"><i class="glyphicon glyphicon-edit"></i></a>
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
        return view('adum.buku_aparat.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BukuAparatRequest $request)
    {
        try {
            $request['abk_nomor_urut'] = $this->getMaxNomorUrut();

            $request['abap_ttl'] = $request->abap_ttl_1.'/'.date("d-m-Y", strtotime($request->abap_ttl_2));

            $this->bukuAparatRepository->create($request->all());

            return redirect(route('adumaparat'));

        } catch(\Exception $e) {
            Flash::error($e->getMessage());

            return redirect(route('adumaparat'));
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
        $data = $this->bukuAparatRepository->findWithoutFail($id);

        if (!$data) {
            Flash::error('Data not found');

            return redirect(route('adumaparat'));
        }
        
        return view('adum.buku_aparat.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BukuAparatRequest $request, $id)
    {
        try {
            $data = $this->bukuAparatRepository->findWithoutFail($id);

            if (!$data) {
                Flash::error('Data not found');

                return redirect(route('adumaparat'));
            }

            $request['abap_ttl'] = $request->abap_ttl_1.'/'.date("d-m-Y", strtotime($request->abap_ttl_2));

            $update = $this->bukuAparatRepository->update($request->all(), $id);

            Flash::success('Buku aparat desa edited successfully');

            return redirect(route('adumaparat'));
        } catch(\Exception $e) {
            Flash::error($e->getMessage());

            return redirect(route('adumaparat'));
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
            $data = $this->bukuAparatRepository->findWithoutFail($id);

            if (!$data) {
                Flash::error('Data not found');

                return redirect(route('adumaparat'));
            }

            $update = $this->bukuAparatRepository->delete($id);

            flash('Buku aparat desa deleted successfully')->success();

            return redirect(route('adumaparat'));
        } catch(\Exception $e) {
            Flash::error($e->getMessage());

            return redirect(route('adumaparat'));
        }
    }

    public function getMaxNomorUrut()
    {
        $nomor = $this->bukuAparatRepository->get()->count();

        $nomorUrut = (int) $nomor + 1;

        return $nomorUrut;
    }    
}
