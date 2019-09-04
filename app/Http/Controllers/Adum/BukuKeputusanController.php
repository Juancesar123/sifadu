<?php

namespace App\Http\Controllers\Adum;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use Laracasts\Flash\Flash;

use App\Http\Requests\Adum\BukuKeputusanRequest as BukuKeputusanRequest;
use App\Repositories\Adum\BukuKeputusanRepository;

class BukuKeputusanController extends Controller
{
    protected $bukuKeputusanRepository;

    public function __construct(BukuKeputusanRepository $bukuKeputusanRepository)
    {
        $this->bukuKeputusanRepository = $bukuKeputusanRepository;

        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('adum.buku_keputusan.index');
    }

    public function datatables(Request $request)
    {
        if($request->ajax()) {

            $select = $this->bukuKeputusanRepository->get();

            $no = 1;
            $data = [];
            foreach ($select as $value) {
                $field = [];

                $field['no'] = $no;
                $field['no_tanggal_keputusan'] = $value->abk_nomor_urut."/".date("m-d-Y", strtotime($value->abk_nomor_tanggal));
                $field['tentang'] = $value->tentang;
                $field['uraian'] = $value->abk_uraian_singkat;
                $field['no_tanggal_dilaporkan'] = $value->abk_nomor_urut."/".date("m-d-Y", strtotime($value->abk_nomor_tanggal_lapor));
                $field['ket'] = $value->abk_keterangan;
                $field['action'] = '
                    <form method="post" action="'.url('adum/keputusan/'. $value->abk_id).'">
                    '.csrf_field().'
                        <input type="hidden" name="_method" value="DELETE">
                        <div class="btn-group">
                            <a title="ubah" href="' . url("adum/keputusan/" . $value->abk_id."/edit") . '" class="btn btn-xs btn-default"><i class="glyphicon glyphicon-edit"></i></a>
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
        return view('adum.buku_keputusan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BukuKeputusanRequest $request)
    {
        try {
            $request['abk_nomor_urut'] = $this->getMaxNomorUrut();

            $this->bukuKeputusanRepository->create($request->all());

            return redirect(route('adumkeputusan'));

        } catch(\Exception $e) {
            Flash::error($e->getMessage());

            return redirect(route('adumkeputusan'));
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
        $data = $this->bukuKeputusanRepository->findWithoutFail($id);

        if (!$data) {
            Flash::error('Data not found');

            return redirect(route('adumkeputusan'));
        }
        
        return view('adum.buku_keputusan.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BukuKeputusanRequest $request, $id)
    {
        try {
            $data = $this->bukuKeputusanRepository->findWithoutFail($id);

            if (!$data) {
                Flash::error('Data not found');

                return redirect(route('adumkeputusan'));
            }

            $update = $this->bukuKeputusanRepository->update($request->all(), $id);

            Flash::success('Buku keputusan desa edited successfully');

            return redirect(route('adumkeputusan'));
        } catch(\Exception $e) {
            Flash::error($e->getMessage());

            return redirect(route('adumkeputusan'));
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
            $data = $this->bukuKeputusanRepository->findWithoutFail($id);

            if (!$data) {
                Flash::error('Data not found');

                return redirect(route('adumkeputusan'));
            }

            $update = $this->bukuKeputusanRepository->delete($id);

            flash('Buku keputusan desa deleted successfully')->success();

            return redirect(route('adumkeputusan'));
        } catch(\Exception $e) {
            Flash::error($e->getMessage());

            return redirect(route('adumkeputusan'));
        }
    }

    public function getMaxNomorUrut()
    {
        $nomor = $this->bukuKeputusanRepository->get()->count();

        $nomorUrut = (int) $nomor + 1;

        return $nomorUrut;
    }
}
