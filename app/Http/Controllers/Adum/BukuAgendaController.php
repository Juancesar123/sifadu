<?php

namespace App\Http\Controllers\Adum;

use Illuminate\Http\Request;
use App\Http\Requests\Adum\BukuAgendaRequest as BukuAgendaRequest;
use App\Http\Controllers\Controller;
use App\Repositories\Adum\BukuAgendaRepository;
use Laracasts\Flash\Flash;
use Carbon\Carbon;
use PhpOffice\PhpWord\PhpWord;
use PDF;

class BukuAgendaController extends Controller
{
    protected $bukuAgendaRepository;

    public function __construct(BukuAgendaRepository $bukuAgendaRepository)
    {
        $this->bukuAgendaRepository = $bukuAgendaRepository;

        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('adum.buku_agenda.index');
    }

    public function datatables(Request $request)
    {
        if($request->ajax()) {
            $select = $this->bukuAgendaRepository->get();

            $no = 1;
            $data = [];
            foreach ($select as $value) {
                $field = [];
    
                $field['no'] = $no;
                
                $field['tanggal'] = Carbon::parse($value->aba_tanggal)->formatLocalized('%d %B %Y');
    
                if($value->aba_jenis_surat == 1) {
                    $field['jenis'] = '<label class="label label-info">Surat Masuk</label>';
                } else if($value->aba_jenis_surat == 2) {
                    $field['jenis'] = '<label class="label label-success">Surat Keluar</label>';
                }

                $field['nomor'] = $value->aba_nomor_surat;
                $field['tanggal_surat'] = Carbon::parse($value->aba_tanggal_surat)->formatLocalized('%d %B %Y');
    
                $field['action'] = '
                    <form method="post" action="'.url('adum/agenda/'. $value->aba_id).'">
                    '.csrf_field().'
                        <input type="hidden" name="_method" value="DELETE">
                        <div class="btn-group">
                            <a title="ubah" href="' . url("adum/agenda/" . $value->aba_id."/edit") . '" class="btn btn-xs btn-default"><i class="glyphicon glyphicon-edit"></i></a>
                            <a title="detail" href="' . url("adum/agenda/" . $value->aba_id) . '" class="btn btn-xs btn-default"><i class="glyphicon glyphicon-eye-open"></i></a>
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
        $jenis = ['1' => 'Surat Masuk', '2' => 'Surat Keluar'];
        
        return view('adum.buku_agenda.create', compact('jenis'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BukuAgendaRequest $request)
    {
        try {
            $request['aba_nomor_urut'] = $this->getMaxNomorUrut();

            $this->bukuAgendaRepository->create($request->all());

            return redirect(route('adumagenda'))->with('success', 'Buku agenda desa saved successfully');
        } catch(\Exception $e) {
            Flash::error($e->getMessage());

            return redirect(route('adumagenda'));
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
        $data = $this->bukuAgendaRepository->findWithoutFail($id);
        
        $tanggal = Carbon::parse($data->aba_tanggal)->formatLocalized('%d %B %Y');
        
        $tanggal_surat = Carbon::parse($data->aba_tanggal_surat)->formatLocalized('%d %B %Y');

        if($data->aba_jenis_surat == 1) {
            $jenis = '<label class="label label-info">Surat Masuk</label>';
        } else if($data->aba_jenis_surat == 2) {
            $jenis = '<label class="label label-success">Surat Keluar</label>';
        }

        return view('adum.buku_agenda.detail', compact(
            'data', 'tanggal', 'tanggal_surat', 'jenis'
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
        $data = $this->bukuAgendaRepository->findWithoutFail($id);

        if (!$data) {
            Flash::error('Data not found');

            return redirect(route('adumagenda'));
        }

        $jenis = ['1' => 'Surat Masuk', '2' => 'Surat Keluar'];
        
        return view('adum.buku_agenda.edit', compact('data', 'jenis'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BukuAgendaRequest $request, $id)
    {
        try {
            $data = $this->bukuAgendaRepository->findWithoutFail($id);

            if (!$data) {
                Flash::error('Data not found');

                return redirect(route('adumagenda'));
            }

            $update = $this->bukuAgendaRepository->update($request->all(), $id);            

            return redirect(route('adumagenda'))->with('success', 'Buku agenda desa edited successfully');
        } catch(\Exception $e) {
            Flash::error($e->getMessage());

            return redirect(route('adumagenda'));
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
            $data = $this->bukuAgendaRepository->findWithoutFail($id);

            if (!$data) {
                Flash::error('Data not found');

                return redirect(route('adumagenda'));
            }

            $delete = $this->bukuAgendaRepository->delete($id);

            return redirect(route('adumagenda'))->with('success', 'Buku agenda desa deleted successfully');
        } catch(\Exception $e) {
            Flash::error($e->getMessage());

            return redirect(route('adumagenda'));
        }
    }

    public function printToWord()
    {
        $phpWord = new PhpWord();

        $styleTable = [
            'borderSize' => 1, 
            'borderColor' => '000000', 
            'spaceAfter' =>  \PhpOffice\PhpWord\Shared\Converter::pointToTwip(0), 
            'cellMargin' => 60
        ];
        $styleCell = array('valign' => 'center');
        $fontStyle = array('size' => 8);
        $cellRowSpan = array('vMerge' => 'restart', 'valign' => 'center', 'align' => 'center');
        $cellRowContinue = array('vMerge' => 'continue');
        $cellColSpan = array('gridSpan' => 4, 'valign' => 'center');
        $cellVCentered = array('valign' => 'center');

        $phpWord->setDefaultFontName('Times New Roman');
        $phpWord->setDefaultFontSize(12);
        $phpWord->addParagraphStyle('pAlignCenter', ['align' => 'center']);
        $phpWord->addTableStyle('Adum Table', $styleTable);

        $section = $phpWord->createSection(array('orientation'=>'landscape'));

        $section->addText('BUKU AGENDA DESA', '', 'pAlignCenter');
        $section->addTextBreak(0.9);

        $table = $section->addTable('Adum Table');
        $table->addRow();

        $cell = $table->addCell(600, $cellRowSpan);
        $cell->addText('NOMOR URUT', $fontStyle, 'pAlignCenter');
        $cell = $table->addCell(2000, $cellRowSpan);
        $cell->addText('TANGGAL PENERIMAAN/PENGIRIMAN SURAT', $fontStyle, 'pAlignCenter');
        $cell = $table->addCell(6000, $cellColSpan);
        $cell->addText('SURAT MASUK', $fontStyle, 'pAlignCenter');
        $cell = $table->addCell(6000, $cellColSpan);
        $cell->addText('SURAT KELUAR', $fontStyle, 'pAlignCenter');
        $cell = $table->addCell(1000, $cellRowSpan);
        $cell->addText('KET', $fontStyle, 'pAlignCenter');

        $table->addRow();
        $cell = $table->addCell(null, $cellRowContinue);
        $cell = $table->addCell(null, $cellRowContinue);
        $cell = $table->addCell(1500)->addText('NOMOR', $fontStyle, 'pAlignCenter');
        $cell = $table->addCell(1500)->addText('TANGGAL', $fontStyle, 'pAlignCenter');
        $cell = $table->addCell(1500)->addText('PENGIRIM', $fontStyle, 'pAlignCenter');
        $cell = $table->addCell(1500)->addText('ISI SINGKAT', $fontStyle, 'pAlignCenter');
        $cell = $table->addCell(1500)->addText('NOMOR', $fontStyle, 'pAlignCenter');
        $cell = $table->addCell(1500)->addText('TANGGAL', $fontStyle, 'pAlignCenter');
        $cell = $table->addCell(1500)->addText('DITUJUKAN KEPADA', $fontStyle, 'pAlignCenter');
        $cell = $table->addCell(1500)->addText('ISI SURAT', $fontStyle, 'pAlignCenter');
        $cell = $table->addCell(null, $cellRowContinue);

        $table->addRow();
        $cell = $table->addCell(600)->addText('1', $fontStyle, 'pAlignCenter');
        $cell = $table->addCell(2000)->addText('2', $fontStyle, 'pAlignCenter');
        $cell = $table->addCell(1500)->addText('3', $fontStyle, 'pAlignCenter');
        $cell = $table->addCell(1500)->addText('4', $fontStyle, 'pAlignCenter');
        $cell = $table->addCell(1500)->addText('5', $fontStyle, 'pAlignCenter');
        $cell = $table->addCell(1500)->addText('6', $fontStyle, 'pAlignCenter');
        $cell = $table->addCell(1500)->addText('7', $fontStyle, 'pAlignCenter');
        $cell = $table->addCell(1500)->addText('8', $fontStyle, 'pAlignCenter');
        $cell = $table->addCell(1500)->addText('9', $fontStyle, 'pAlignCenter');
        $cell = $table->addCell(1500)->addText('10', $fontStyle, 'pAlignCenter');
        $cell = $table->addCell(1500)->addText('11', $fontStyle, 'pAlignCenter');

        $buku = $this->bukuAgendaRepository->get();

        $no = 1;
        foreach($buku as $value) {
            $table->addRow();

            $cell = $table->addCell(600)->addText($no++, $fontStyle, 'pAlignCenter');
            $cell = $table->addCell(2000)->addText($value->aba_tanggal, $fontStyle);

            if($value->aba_jenis_surat == 1) {
                $cell = $table->addCell(1500)->addText($value->aba_nomor_surat, $fontStyle);
                $cell = $table->addCell(1500)->addText($value->aba_tanggal_surat, $fontStyle);
                $cell = $table->addCell(1500)->addText($value->aba_pengirim_surat, $fontStyle);
                $cell = $table->addCell(1500)->addText($value->aba_isi_surat, $fontStyle);

                $cell = $table->addCell(1500)->addText('', $fontStyle);
                $cell = $table->addCell(1500)->addText('', $fontStyle);
                $cell = $table->addCell(1500)->addText('', $fontStyle);
                $cell = $table->addCell(1500)->addText('', $fontStyle);
            } else {
                $cell = $table->addCell(1500)->addText('', $fontStyle);
                $cell = $table->addCell(1500)->addText('', $fontStyle);
                $cell = $table->addCell(1500)->addText('', $fontStyle);
                $cell = $table->addCell(1500)->addText('', $fontStyle);

                $cell = $table->addCell(1500)->addText($value->aba_nomor_surat, $fontStyle);
                $cell = $table->addCell(1500)->addText($value->aba_tanggal_surat, $fontStyle);
                $cell = $table->addCell(1500)->addText($value->aba_tujuan_surat, $fontStyle);
                $cell = $table->addCell(1500)->addText($value->aba_isi_surat, $fontStyle);
            }

            $cell = $table->addCell(1500)->addText($value->aba_keterangan_surat, $fontStyle);
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

        $date = date('YmdHis');

        $filename='buku_agenda_desa_'.$date.'.docx'; //save our document as this file name
        header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document'); //mime type
        header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
        header('Cache-Control: max-age=0'); //no cache
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');

        $objWriter->save('php://output');
    }

    public function printToPdf()
    {
        $buku = $this->bukuAgendaRepository->get();

        $html = \View::make('adum.buku_agenda.cetak', compact('buku'));

        $pdf = PDF::loadHtml($html->render());

        $pdf->setPaper('F4', 'landscape');

        $filename='buku_agenda_desa_'.date('YmdHis').'.pdf';

        return $pdf->stream($filename);
    }

    public function getMaxNomorUrut()
    {
        $nomor = $this->bukuAgendaRepository->get()->count();

        $nomorUrut = (int) $nomor + 1;

        return $nomorUrut;
    }
}
