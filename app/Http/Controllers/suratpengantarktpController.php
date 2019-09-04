<?php

namespace App\Http\Controllers;

use App\DataTables\suratpengantarktpDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatesuratpengantarktpRequest;
use App\Http\Requests\UpdatesuratpengantarktpRequest;
use App\Repositories\suratpengantarktpRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Models\datapenduduk as Datapenduduk;

class suratpengantarktpController extends AppBaseController
{
    /** @var  suratpengantarktpRepository */
    private $suratpengantarktpRepository;

    public function __construct(suratpengantarktpRepository $suratpengantarktpRepo)
    {
        $this->suratpengantarktpRepository = $suratpengantarktpRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the suratpengantarktp.
     *
     * @param suratpengantarktpDataTable $suratpengantarktpDataTable
     * @return Response
     */
    public function index(suratpengantarktpDataTable $suratpengantarktpDataTable)
    {
        return $suratpengantarktpDataTable->render('suratpengantarktps.index');
    }

    /**
     * Show the form for creating a new suratpengantarktp.
     *
     * @return Response
     */
    public function create()
    {
        $data = Datapenduduk::all();
        return view('suratpengantarktps.create',['data' => $data]);
    }

    /**
     * Store a newly created suratpengantarktp in storage.
     *
     * @param CreatesuratpengantarktpRequest $request
     *
     * @return Response
     */
    public function store(CreatesuratpengantarktpRequest $request)
    {
        $input = $request->all();

        $suratpengantarktp = $this->suratpengantarktpRepository->create($input);

        Flash::success('Suratpengantarktp berhasil ditambahkan.');

        return redirect(route('suratpengantarktps.index'));
    }

    /**
     * Display the specified suratpengantarktp.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $suratpengantarktp = $this->suratpengantarktpRepository->findWithoutFail($id);

        if (empty($suratpengantarktp)) {
            Flash::error('Suratpengantarktp not found');

            return redirect(route('suratpengantarktps.index'));
        }

        return view('suratpengantarktps.show')->with('suratpengantarktp', $suratpengantarktp);
    }

    /**
     * Show the form for editing the specified suratpengantarktp.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $suratpengantarktp = $this->suratpengantarktpRepository->findWithoutFail($id);

        if (empty($suratpengantarktp)) {
            Flash::error('Suratpengantarktp not found');

            return redirect(route('suratpengantarktps.index'));
        }
        $data = Datapenduduk::all();
        return view('suratpengantarktps.edit',['data' => $data])->with('suratpengantarktp', $suratpengantarktp);
    }
    public function viewsuratdukacapil($id)
    {
        $suratpengantarktp = $this->suratpengantarktpRepository->findWithoutFail($id);
        return view('suratpengantarktps.cetak_surat_dukacapil')->with('suratpengantarktp', $suratpengantarktp);

    }

    /**
     * Update the specified suratpengantarktp in storage.
     *
     * @param  int              $id
     * @param UpdatesuratpengantarktpRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatesuratpengantarktpRequest $request)
    {
        $suratpengantarktp = $this->suratpengantarktpRepository->findWithoutFail($id);

        if (empty($suratpengantarktp)) {
            Flash::error('Suratpengantarktp not found');

            return redirect(route('suratpengantarktps.index'));
        }

        $suratpengantarktp = $this->suratpengantarktpRepository->update($request->all(), $id);

        Flash::success('Suratpengantarktp berhasil diperbarui.');

        return redirect(route('suratpengantarktps.index'));
    }

    /**
     * Remove the specified suratpengantarktp from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $suratpengantarktp = $this->suratpengantarktpRepository->findWithoutFail($id);

        if (empty($suratpengantarktp)) {
            Flash::error('Suratpengantarktp not found');

            return redirect(route('suratpengantarktps.index'));
        }

        $this->suratpengantarktpRepository->delete($id);

        Flash::success('Suratpengantarktp deleted successfully.');

        return redirect(route('suratpengantarktps.index'));
    }
}
