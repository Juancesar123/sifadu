<?php

namespace App\Http\Controllers;

use App\DataTables\pajaktanahDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatepajaktanahRequest;
use App\Http\Requests\UpdatepajaktanahRequest;
use App\Repositories\pajaktanahRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

use Illuminate\Http\Request;
use App\Models\pajaktanah as Pajaktanah;

use \PhpOffice\PhpSpreadsheet\Reader\IReader;
use \PhpOffice\PhpSpreadsheet\IOFactory;
class pajaktanahController extends AppBaseController
{
    /** @var  pajaktanahRepository */
    private $pajaktanahRepository;

    public function __construct(pajaktanahRepository $pajaktanahRepo)
    {
        $this->pajaktanahRepository = $pajaktanahRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the pajaktanah.
     *
     * @param pajaktanahDataTable $pajaktanahDataTable
     * @return Response
     */
    public function index(pajaktanahDataTable $pajaktanahDataTable)
    {
        return $pajaktanahDataTable->render('pajaktanahs.index');
    }
    public function uploadfile(Request $request){
        $reader = IOFactory::createReader("Xlsx");
        $reader->setReadDataOnly(true);
        $file = $request->fileexcel;
        $spreadsheet = $reader->load($file);
        $worksheet = $spreadsheet->getActiveSheet();
        $rows = $worksheet->toArray();
        for($i=1;$i < count($rows);$i++){
            $data = [
                'blok' => $rows[$i][1],
                'dusun' => $rows[$i][2],
                'nama_wp' => $rows[$i][3],
                'nop' => $rows[$i][4],
                'alamat' => $rows[$i][5],
                'ketetapan_pembayaran' => $rows[$i][6],
                'lunas' => $rows[$i][7]

            ];
            Pajaktanah::insert($data);
         }
         return redirect(route('pajaktanahs.index'));
    }

    /**
     * Show the form for creating a new pajaktanah.
     *
     * @return Response
     */
    public function create()
    {
        return view('pajaktanahs.create');
    }

    /**
     * Store a newly created pajaktanah in storage.
     *
     * @param CreatepajaktanahRequest $request
     *
     * @return Response
     */
    public function store(CreatepajaktanahRequest $request)
    {
        $input = $request->all();

        $pajaktanah = $this->pajaktanahRepository->create($input);

        Flash::success('Pajaktanah berhasil ditambahkan.');

        return redirect(route('pajaktanahs.index'));
    }

    /**
     * Display the specified pajaktanah.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $pajaktanah = $this->pajaktanahRepository->findWithoutFail($id);

        if (empty($pajaktanah)) {
            Flash::error('Pajaktanah not found');

            return redirect(route('pajaktanahs.index'));
        }

        return view('pajaktanahs.show')->with('pajaktanah', $pajaktanah);
    }

    /**
     * Show the form for editing the specified pajaktanah.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $pajaktanah = $this->pajaktanahRepository->findWithoutFail($id);

        if (empty($pajaktanah)) {
            Flash::error('Pajaktanah not found');

            return redirect(route('pajaktanahs.index'));
        }

        return view('pajaktanahs.edit')->with('pajaktanah', $pajaktanah);
    }

    /**
     * Update the specified pajaktanah in storage.
     *
     * @param  int              $id
     * @param UpdatepajaktanahRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatepajaktanahRequest $request)
    {
        $pajaktanah = $this->pajaktanahRepository->findWithoutFail($id);

        if (empty($pajaktanah)) {
            Flash::error('Pajaktanah not found');

            return redirect(route('pajaktanahs.index'));
        }

        $pajaktanah = $this->pajaktanahRepository->update($request->all(), $id);

        Flash::success('Pajaktanah berhasil diperbarui.');

        return redirect(route('pajaktanahs.index'));
    }

    /**
     * Remove the specified pajaktanah from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pajaktanah = $this->pajaktanahRepository->findWithoutFail($id);

        if (empty($pajaktanah)) {
            Flash::error('Pajaktanah not found');

            return redirect(route('pajaktanahs.index'));
        }

        $this->pajaktanahRepository->delete($id);

        Flash::success('Pajaktanah deleted successfully.');

        return redirect(route('pajaktanahs.index'));
    }
    public function updatestatus($id){
        $input = [
            'lunas'=>1
        ];
        $pajaktanah = $this->pajaktanahRepository->update($input, $id);
        Flash::success('Pajak Tanah Status Updated succesfully.');
        return redirect(route('pajaktanahs.index'));
    }
}
