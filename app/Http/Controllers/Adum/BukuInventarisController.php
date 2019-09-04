<?php

namespace App\Http\Controllers\Adum;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use Laracasts\Flash\Flash;

use App\Http\Requests\Adum\BukuInventarisRequest as BukuInventarisRequest;
use App\Repositories\Adum\BukuInventarisRepository;

class BukuInventarisController extends Controller
{
    protected $bukuInventarisRepository;

    public function __construct(BukuInventarisRepository $bukuInventarisRepository)
    {
        $this->bukuInventarisRepository = $bukuInventarisRepository;

        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('adum.buku_inventaris.index');
    }

    public function datatables(Request $request)
    {
        if($request->ajax()) {

            $select = $this->bukuInventarisRepository->get();

            $no = 1;
            $data = [];
            foreach ($select as $value) {
                $field = [];

                $field['abi_nomor_urut'] = $no;
                $field['abi_jenis_inventaris'] = $value->abi_jenis_inventaris;
                $field['abi_dibeli_sendiri'] = $value->abi_dibeli_sendiri;
                $field['abi_bantuan_pemerintah'] = $value->abi_bantuan_pemerintah;
                $field['abi_bantuan_provinsi'] = $value->abi_bantuan_provinsi;
                $field['abi_bantuan_kabkota'] = $value->abi_bantuan_kabkota;
                $field['abi_sumbangan'] = $value->abi_sumbangan;
                $field['abi_awal_baik'] = $value->abi_awal_baik;
                $field['abi_awal_rusak'] = $value->abi_awal_rusak;
                $field['abi_hapus_rusak'] = $value->abi_hapus_rusak;
                $field['abi_hapus_dijual'] = $value->abi_hapus_dijual;
                $field['abi_hapus_disumbangkan'] = $value->abi_hapus_disumbangkan;
                $field['abi_tanggal_hapus'] = $value->abi_tanggal_hapus;
                $field['abi_akhir_baik'] = $value->abi_akhir_baik;
                $field['abi_akhir_rusak'] = $value->abi_akhir_rusak;
                $field['ket'] = $value->ket;

                $field['action'] = '
                    <form method="post" action="'.url('adum/inventaris/'. $value->abi_id).'">
                    '.csrf_field().'
                        <input type="hidden" name="_method" value="DELETE">
                        <div class="btn-group">
                            <a title="ubah" href="' . url("adum/inventaris/" . $value->abi_id."/edit") . '" class="btn btn-xs btn-default"><i class="glyphicon glyphicon-edit"></i></a>
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
        return view('adum.buku_inventaris.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BukuInventarisRequest $request)
    {
        try {
            $request['abk_nomor_urut'] = $this->getMaxNomorUrut();

            $this->bukuInventarisRepository->create($request->all());

            return redirect(route('aduminventaris'));

        } catch(\Exception $e) {
            Flash::error($e->getMessage());

            return redirect(route('aduminventaris'));
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
        $data = $this->bukuInventarisRepository->findWithoutFail($id);

        if (!$data) {
            Flash::error('Data not found');

            return redirect(route('aduminventaris'));
        }
        
        return view('adum.buku_inventaris.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BukuInventarisRequest $request, $id)
    {
        try {
            $data = $this->bukuInventarisRepository->findWithoutFail($id);

            if (!$data) {
                Flash::error('Data not found');

                return redirect(route('aduminventaris'));
            }

            $update = $this->bukuInventarisRepository->update($request->all(), $id);

            Flash::success('Buku inventaris desa edited successfully');

            return redirect(route('aduminventaris'));
        } catch(\Exception $e) {
            Flash::error($e->getMessage());

            return redirect(route('aduminventaris'));
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
            $data = $this->bukuInventarisRepository->findWithoutFail($id);

            if (!$data) {
                Flash::error('Data not found');

                return redirect(route('aduminventaris'));
            }

            $update = $this->bukuInventarisRepository->delete($id);

            flash('Buku inventaris desa deleted successfully')->success();

            return redirect(route('aduminventaris'));
        } catch(\Exception $e) {
            Flash::error($e->getMessage());

            return redirect(route('aduminventaris'));
        }
    }

    public function getMaxNomorUrut()
    {
        $nomor = $this->bukuInventarisRepository->get()->count();

        $nomorUrut = (int) $nomor + 1;

        return $nomorUrut;
    }    
}
