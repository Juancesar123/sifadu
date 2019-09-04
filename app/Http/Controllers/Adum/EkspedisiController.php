<?php

namespace App\Http\Controllers\Adum;

use Illuminate\Http\Request;
use App\Http\Requests\Adum\EkspedisiRequest as EkspedisiRequest;
use App\Http\Controllers\Controller;
use App\Repositories\Adum\EkspedisiRepository;
use Carbon\Carbon;
use PhpOffice\PhpWord\PhpWord;

class EkspedisiController extends Controller
{
    protected $ekspedisiRepository;

    public function __construct(EkspedisiRepository $ekspedisiRepository)
    {
        $this->ekspedisiRepository = $ekspedisiRepository;

        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('adum.ekspedisi.index');
    }

    public function datatables(Request $request)
    {
        if($request->ajax()) {
            $select = $this->ekspedisiRepository->get();

            $no = 1;
            $data = [];
            foreach ($select as $value) {
                $field = [];
    
                $field['no'] = $no;

                $field['tanggal'] = Carbon::parse($value->eksped_tanggal)->formatLocalized('%d %B %Y');

                $field['tanggal_surat'] = Carbon::parse($value->eksped_tanggal_surat)->formatLocalized('%d %B %Y');

                $field['nomor'] = $value->eksped_nomor_surat;

                $field['isi'] = $value->eksped_isi;

                $field['penerima'] = $value->eksped_penerima;

                $field['keterangan'] = $value->eksped_keterangan;
    
                $field['action'] = '
                    <form method="post" action="'.url('adum/ekspedisi/'. $value->eksped_id).'">
                    '.csrf_field().'
                        <input type="hidden" name="_method" value="DELETE">
                        <div class="btn-group">
                            <a title="ubah" href="' . url("adum/ekspedisi/" . $value->eksped_id."/edit") . '" class="btn btn-xs btn-default"><i class="glyphicon glyphicon-edit"></i></a>
                            <a title="detail" href="' . url("adum/ekspedisi/" . $value->eksped_id) . '" class="btn btn-xs btn-default"><i class="glyphicon glyphicon-eye-open"></i></a>
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
        return view('adum.ekspedisi.create', compact('perdes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EkspedisiRequest $request)
    {
        try {
            $this->ekspedisiRepository->create($request->all());

            return redirect(route('ekspedisi'))->with('success', 'Ekspedisi desa berhasil ditambahkan');
        } catch(\Exception $e) {
            Flash::error($e->getMessage());

            return redirect(route('ekspedisi'));
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
        $data = $this->ekspedisiRepository->findWithoutFail($id);
        
        $tanggal = Carbon::parse($data->eksped_tanggal)->formatLocalized('%d %B %Y');
        
        $tanggal_surat = Carbon::parse($data->eksped_tanggal_surat)->formatLocalized('%d %B %Y');

        return view('adum.ekspedisi.detail', compact(
            'data', 'tanggal', 'tanggal_surat'
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->ekspedisiRepository->findWithoutFail($id);
        
        $tanggal = Carbon::parse($data->eksped_tanggal)->formatLocalized('%d %B %Y');
        
        $tanggal_surat = Carbon::parse($data->eksped_tanggal_surat)->formatLocalized('%d %B %Y');

        return view('adum.ekspedisi.edit', compact(
            'data', 'tanggal', 'tanggal_surat'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EkspedisiRequest $request, $id)
    {
        try {
            $data = $this->ekspedisiRepository->findWithoutFail($id);

            if (!$data) {
                Flash::error('Data not found');

                return redirect(route('ekspedisi'));
            }

            $this->ekspedisiRepository->update($request->all(), $id);            

            return redirect(route('ekspedisi'))->with('success', 'Ekspedisi desa edited successfully');
        } catch(\Exception $e) {
            Flash::error($e->getMessage());

            return redirect(route('ekspedisi'));
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
            $data = $this->ekspedisiRepository->findWithoutFail($id);

            if (!$data) {
                Flash::error('Data not found');

                return redirect(route('ekspedisi'));
            }

            $this->ekspedisiRepository->delete($id);

            return redirect(route('ekspedisi'))->with('success', 'Ekspedisi desa deleted successfully');
        } catch(\Exception $e) {
            Flash::error($e->getMessage());

            return redirect(route('ekspedisi'));
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

        $section->addText('BUKU EKSPEDISI', '', 'pAlignCenter');
        $section->addTextBreak(0.9);

        $table = $section->addTable('Adum Table');
        $table->addRow();

        $cell = $table->addCell(600, $cellRowSpan);
        $cell->addText('NOMOR URUT', $fontStyle, 'pAlignCenter');
        $cell = $table->addCell(2000, $cellRowSpan);
        $cell->addText('TANGGAL PENGIRIMAN', $fontStyle, 'pAlignCenter');
        $cell = $table->addCell(2000, $cellRowSpan);
        $cell->addText('TANGGAL DAN NOMOR SURAT', $fontStyle, 'pAlignCenter');
        $cell = $table->addCell(4000, $cellRowSpan);
        $cell->addText('ISI SINGKAT SURAT YANG DIKIRIM', $fontStyle, 'pAlignCenter');
        $cell = $table->addCell(2000, $cellRowSpan);
        $cell->addText('DITUJUKAN KEPADA', $fontStyle, 'pAlignCenter');
        $cell = $table->addCell(2000, $cellRowSpan);
        $cell->addText('KETERANGAN', $fontStyle, 'pAlignCenter');

        $table->addRow();
        $cell = $table->addCell(600)->addText('1', $fontStyle, 'pAlignCenter');
        $cell = $table->addCell(2000)->addText('2', $fontStyle, 'pAlignCenter');
        $cell = $table->addCell(2000)->addText('3', $fontStyle, 'pAlignCenter');
        $cell = $table->addCell(4000)->addText('4', $fontStyle, 'pAlignCenter');
        $cell = $table->addCell(2000)->addText('5', $fontStyle, 'pAlignCenter');
        $cell = $table->addCell(2000)->addText('6', $fontStyle, 'pAlignCenter');

        $data = $this->ekspedisiRepository->get();

        $no = 1;
        foreach($data as $value) {
            $table->addRow();

            $cell = $table->addCell(600)->addText($no++, $fontStyle, 'pAlignCenter');
            $cell = $table->addCell(2000)->addText($value->eksped_tanggal, $fontStyle);
            $cell = $table->addCell(2000)->addText($value->eksped_tanggal_surat.'/'.$value->eksped_nomor_surat, $fontStyle);
            $cell = $table->addCell(4000)->addText($value->eksped_isi, $fontStyle);
            $cell = $table->addCell(2000)->addText($value->eksped_penerima, $fontStyle);
            $cell = $table->addCell(2000)->addText($value->eksped_keter, $fontStyle);
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

        $nama = 'Ekspedisi_Desa_'.date('YmdHis');

        $filename= $nama.'.docx'; //save our document as this file name
        header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document'); //mime type
        header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
        header('Cache-Control: max-age=0'); //no cache
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');

        $objWriter->save('php://output');
    }
}
