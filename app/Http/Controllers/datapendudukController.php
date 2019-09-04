<?php

namespace App\Http\Controllers;

use App\DataTables\datapendudukDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatedatapendudukRequest;
use App\Http\Requests\UpdatedatapendudukRequest;
use App\Repositories\datapendudukRepository;
use Flash;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Models\datapenduduk as Datapenduduk;
use \PhpOffice\PhpSpreadsheet\Reader\IReader;
use \PhpOffice\PhpSpreadsheet\IOFactory;
use App\Jobs\ProcessUploadfile;
use App\Models\Agama;
use Illuminate\Support\Facades\DB;
class datapendudukController extends AppBaseController
{
    /** @var  datapendudukRepository */
    private $datapendudukRepository;

    public function __construct(datapendudukRepository $datapendudukRepo)
    {
        $this->datapendudukRepository = $datapendudukRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the datapenduduk.
     *
     * @param datapendudukDataTable $datapendudukDataTable
     * @return Response
     */
    public function index(datapendudukDataTable $datapendudukDataTable)
    {
        return $datapendudukDataTable->render('datapenduduks.index');
    }

    /**
     * Show the form for creating a new datapenduduk.
     *
     * @return Response
     */
    public function create()
    {
        $agamas = Agama::all('id', 'agama');
        return view('datapenduduks.create', compact('agamas'));
    }
    public function createupload(){
        return view('datapenduduks.importtodatabase');
    }
    public function uploaddata(Request $request){
        $reader = IOFactory::createReader("Xlsx");
        $reader->setReadDataOnly(true);
        $file = $request->fileexcel;
        $spreadsheet = $reader->load($file);
        $worksheet = $spreadsheet->getActiveSheet();
        $rows = $worksheet->toArray();
        for($i=1;$i < count($rows);$i++){
            $data = [
                'no_kk' => $rows[$i][0],
                'nik' => $rows[$i][1],
                'nama_lengkap' => $rows[$i][2],
                'tempat_lahir' => $rows[$i][3],
                'jenis_kelamin' => $rows[$i][4],
                'tanggal_lahir' => $rows[$i][5],
                'agama' => $rows[$i][6],
                'hub_kel' => $rows[$i][7],
                'status_kawin' => $rows[$i][8],
                'nama_lengkap_ayah' => $rows[$i][9],
                'nama_lengkap_ibu' => $rows[$i][10],
                'alamat' => $rows[$i][11],
                'no_rt' => $rows[$i][12],
                'no_rw' => $rows[$i][13],
                'nama_kecamatan' => $rows[$i][14],
                'nama_kecamatan_2' => $rows[$i][15],
                'jenis_pekerjaan' => $rows[$i][16],
                'pendidikan_akhir' => $rows[$i][18],
                'status_KTP' => $rows[$i][20]
            ];
            Datapenduduk::insert($data);
         }
         return redirect(route('datapenduduks.index'));
    }
    /**
     * Store a newly created datapenduduk in storage.
     *
     * @param CreatedatapendudukRequest $request
     *
     * @return Response
     */
    public function store(CreatedatapendudukRequest $request)
    {
        $input = $request->all();

        $datapenduduk = $this->datapendudukRepository->create($input);

        Flash::success('Data penduduk berhasil ditambahkan.');

        return redirect(route('datapenduduks.index'));
    }

    /**
     * Display the specified datapenduduk.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $datapenduduk = $this->datapendudukRepository->findWithoutFail($id);

        if (empty($datapenduduk)) {
            Flash::error('Datapenduduk not found');

            return redirect(route('datapenduduks.index'));
        }

        return view('datapenduduks.show')->with('datapenduduk', $datapenduduk);
    }

    /**
     * Show the form for editing the specified datapenduduk.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $datapenduduk = $this->datapendudukRepository->findWithoutFail($id);

        if (empty($datapenduduk)) {
            Flash::error('Datapenduduk not found');

            return redirect(route('datapenduduks.index'));
        }
		
		$agamas = Agama::all('id', 'agama');

        return view('datapenduduks.edit', compact(['datapenduduk', 'agamas']));
    }

    /**
     * Update the specified datapenduduk in storage.
     *
     * @param  int              $id
     * @param UpdatedatapendudukRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatedatapendudukRequest $request)
    {
        $datapenduduk = $this->datapendudukRepository->findWithoutFail($id);

        if (empty($datapenduduk)) {
            Flash::error('Datapenduduk not found');

            return redirect(route('datapenduduks.index'));
        }

        $datapenduduk = $this->datapendudukRepository->update($request->all(), $id);

        Flash::success('Datapenduduk berhasil diperbarui.');

        return redirect(route('datapenduduks.index'));
    }

    /**
     * Remove the specified datapenduduk from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $datapenduduk = $this->datapendudukRepository->findWithoutFail($id);

        if (empty($datapenduduk)) {
            Flash::error('Datapenduduk not found');

            return redirect(route('datapenduduks.index'));
        }

        $this->datapendudukRepository->delete($id);

        Flash::success('Datapenduduk deleted successfully.');

        return redirect(route('datapenduduks.index'));
    }
}
