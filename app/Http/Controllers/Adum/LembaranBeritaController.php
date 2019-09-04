<?php

namespace App\Http\Controllers\Adum;

use Illuminate\Http\Request;
use App\Http\Requests\Adum\LembaranBeritaRequest as LembaranBeritaRequest;
use App\Http\Controllers\Controller;
use App\Repositories\Adum\LembaranBeritaRepository;
use App\Repositories\PeraturanDesaRepository;
use Carbon\Carbon;
use PhpOffice\PhpWord\PhpWord;

class LembaranBeritaController extends Controller
{
    protected $lembaranBeritaRepository;

    public function __construct(LembaranBeritaRepository $lembaranBeritaRepository)
    {
        $this->lembaranBeritaRepository = $lembaranBeritaRepository;

        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('adum.lembaran_berita.index');
    }

    public function datatables(Request $request)
    {
        if($request->ajax()) {
            $select = $this->lembaranBeritaRepository->get();

            $no = 1;
            $data = [];
            foreach ($select as $value) {
                $field = [];
    
                $field['no'] = $no;

                $field['jenis'] = $value->perdes->perdes_nama;

                $field['nomor'] = $value->lember_nomor;
                
                $field['tanggal'] = Carbon::parse($value->lember_tanggal)->formatLocalized('%d %B %Y');

                $field['tentang'] = $value->lember_tentang;
    
                $field['action'] = '
                    <form method="post" action="'.url('adum/lember/'. $value->lember_id).'">
                    '.csrf_field().'
                        <input type="hidden" name="_method" value="DELETE">
                        <div class="btn-group">
                            <a title="ubah" href="' . url("adum/lember/" . $value->lember_id."/edit") . '" class="btn btn-xs btn-default"><i class="glyphicon glyphicon-edit"></i></a>
                            <a title="detail" href="' . url("adum/lember/" . $value->lember_id) . '" class="btn btn-xs btn-default"><i class="glyphicon glyphicon-eye-open"></i></a>
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
    public function create(PeraturanDesaRepository $peraturanDesaRepository)
    {
        $perdes = $peraturanDesaRepository->pluck('perdes_nama', 'perdes_id')->toArray();

        return view('adum.lembaran_berita.create', compact('perdes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LembaranBeritaRequest $request)
    {
        try {
            $this->lembaranBeritaRepository->create($request->all());

            return redirect(route('lember'))->with('success', 'Lembaran dan berita desa saved successfully');
        } catch(\Exception $e) {
            Flash::error($e->getMessage());

            return redirect(route('lember'));
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
        $data = $this->lembaranBeritaRepository->findWithoutFail($id);
        
        $tanggal = Carbon::parse($data->lember_tanggal)->formatLocalized('%d %B %Y');
        
        $tanggal_uu = Carbon::parse($data->lember_tanggal_uu)->formatLocalized('%d %B %Y');

        return view('adum.lembaran_berita.detail', compact(
            'data', 'tanggal', 'tanggal_uu'
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, PeraturanDesaRepository $peraturanDesaRepository)
    {
        $data = $this->lembaranBeritaRepository->findWithoutFail($id);

        if (!$data) {
            Flash::error('Data not found');

            return redirect(route('lember'));
        }

        $perdes = $peraturanDesaRepository->pluck('perdes_nama', 'perdes_id')->toArray();
        
        return view('adum.lembaran_berita.edit', compact('data', 'perdes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LembaranBeritaRequest $request, $id)
    {
        try {
            $data = $this->lembaranBeritaRepository->findWithoutFail($id);

            if (!$data) {
                Flash::error('Data not found');

                return redirect(route('lember'));
            }

            $this->lembaranBeritaRepository->update($request->all(), $id);            

            return redirect(route('lember'))->with('success', 'Lembaran dan berita desa edited successfully');
        } catch(\Exception $e) {
            Flash::error($e->getMessage());

            return redirect(route('lember'));
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
            $data = $this->lembaranBeritaRepository->findWithoutFail($id);

            if (!$data) {
                Flash::error('Data not found');

                return redirect(route('lember'));
            }

            $this->lembaranBeritaRepository->delete($id);

            return redirect(route('lember'))->with('success', 'Lembaran dan berita desa deleted successfully');
        } catch(\Exception $e) {
            Flash::error($e->getMessage());

            return redirect(route('lember'));
        }
    }

    public function printToWord(PhpWord $phpWord)
    {
        $styleTable = [
            'borderSize' => 1, 
            'borderColor' => '000000', 
            'spaceAfter' =>  \PhpOffice\PhpWord\Shared\Converter::pointToTwip(0), 
            'cellMargin' => 60
        ];

        $styleCell = array('valign' => 'center');
        $fontStyle = array('size' => 10);
        $cellRowSpan = array('vMerge' => 'restart', 'valign' => 'center', 'align' => 'center');
        $cellRowContinue = array('vMerge' => 'continue');
        $cellColSpan = array('gridSpan' => 2, 'valign' => 'center');
        $cellVCentered = array('valign' => 'center');

        $phpWord->setDefaultFontName('Times New Roman');
        $phpWord->setDefaultFontSize(12);
        $phpWord->addParagraphStyle('pAlignCenter', ['align' => 'center']);
        $phpWord->addTableStyle('Adum Table', $styleTable);

        $section = $phpWord->createSection(array('orientation'=>'landscape'));

        $section->addText('BUKU LEMBARAN DESA DAN BERITA DESA', '', 'pAlignCenter');
        $section->addTextBreak(0.9);

        $table = $section->addTable('Adum Table');
        $table->addRow();

        $cell = $table->addCell(600, $cellRowSpan);
        $cell->addText('NOMOR URUT', $fontStyle, 'pAlignCenter');
        $cell = $table->addCell(3000, $cellRowSpan);
        $cell->addText('JENIS PERATURAN DI DESA', $fontStyle, 'pAlignCenter');
        $cell = $table->addCell(3000, $cellRowSpan);
        $cell->addText('NOMOR DAN TANGGAL DITETAPKAN', $fontStyle, 'pAlignCenter');
        $cell = $table->addCell(3000, $cellRowSpan);
        $cell->addText('TENTANG', $fontStyle, 'pAlignCenter');

        $cell = $table->addCell(4000, $cellColSpan);
        $cell->addText('DIUNDANGKAN', $fontStyle, 'pAlignCenter');
        $cell = $table->addCell(2000, $cellRowSpan);
        $cell->addText('KET', $fontStyle, 'pAlignCenter');

        $table->addRow();
        $cell = $table->addCell(null, $cellRowContinue);
        $cell = $table->addCell(null, $cellRowContinue);
        $cell = $table->addCell(null, $cellRowContinue);
        $cell = $table->addCell(null, $cellRowContinue);
        $cell = $table->addCell(2000)->addText('TANGGAL', $fontStyle, 'pAlignCenter');
        $cell = $table->addCell(2000)->addText('NOMOR', $fontStyle, 'pAlignCenter');
        $cell = $table->addCell(null, $cellRowContinue);

        $table->addRow();
        $cell = $table->addCell(600)->addText('1', $fontStyle, 'pAlignCenter');
        $cell = $table->addCell(3000)->addText('2', $fontStyle, 'pAlignCenter');
        $cell = $table->addCell(3000)->addText('3', $fontStyle, 'pAlignCenter');
        $cell = $table->addCell(3000)->addText('4', $fontStyle, 'pAlignCenter');
        $cell = $table->addCell(2000)->addText('5', $fontStyle, 'pAlignCenter');
        $cell = $table->addCell(2000)->addText('6', $fontStyle, 'pAlignCenter');
        $cell = $table->addCell(2000)->addText('7', $fontStyle, 'pAlignCenter');

        $data = $this->lembaranBeritaRepository->get();

        $no = 1;
        foreach($data as $value) {
            $table->addRow();

            $cell = $table->addCell(600)->addText($no++, $fontStyle, 'pAlignCenter');
            $cell = $table->addCell(3000)->addText($value->perdes->perdes_nama, $fontStyle);
            $cell = $table->addCell(3000)->addText($value->lember_nomor.'/'.$value->lember_tanggal, $fontStyle);
            $cell = $table->addCell(3000)->addText($value->lember_tentang, $fontStyle);
            $cell = $table->addCell(2000)->addText($value->lember_tanggal_uu, $fontStyle);
            $cell = $table->addCell(2000)->addText($value->lember_nomor_uu, $fontStyle);
            $cell = $table->addCell(2000)->addText($value->lember_keterangan, $fontStyle);
        }

        $section->addTextBreak(1);

        $table = $section->addTable();
        $table->addRow();

        $cell = $table->addCell(8000)->addText('MENGETAHUI', ['size' => 12], 'pAlignCenter');
        $cell = $table->addCell(6000)->addText('.................,................', ['size' => 12], 'pAlignCenter');

        $table->addRow();
        $cell = $table->addCell(8000)->addText('KEPALA DESA', ['size' => 12], 'pAlignCenter');
        $cell = $table->addCell(6000)->addText('SEKRETARIS DESA', ['size' => 12], 'pAlignCenter');

        $table->addRow()->addCell(14000, $cellColSpan);
        $table->addRow()->addCell(14000, $cellColSpan);
        $table->addRow()->addCell(14000, $cellColSpan);

        $table->addRow();
        $cell = $table->addCell(6000)->addText('(...............................................)', ['size' => 12], 'pAlignCenter');
        $cell = $table->addCell(6000)->addText('(...............................................)', ['size' => 12], 'pAlignCenter');

        $nama = 'Lembar_Berita_Desa_'.date('YmdHis');

        $filename= $nama.'.docx'; //save our document as this file name
        header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document'); //mime type
        header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
        header('Cache-Control: max-age=0'); //no cache
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');

        $objWriter->save('php://output');
    }
}
