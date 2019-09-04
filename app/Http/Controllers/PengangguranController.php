<?php

namespace App\Http\Controllers;

use App\DataTables\pengangguranDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatepengangguranRequest;
use App\Http\Requests\UpdatepengangguranRequest;
use App\Repositories\pengangguranRepository;
use Flash;
use App\Models\datapenduduk as Datapenduduk;
use App\Http\Controllers\AppBaseController;
use Response;

class PengangguranController extends AppBaseController
{
    /** @var  pengangguranRepository */
    private $pengangguranRepository;

    public function __construct(pengangguranRepository $pengangguranRepo)
    {
        $this->pengangguranRepository = $pengangguranRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the pengangguran.
     *
     * @param pengangguranDataTable $pengangguranDataTable
     * @return Response
     */
    public function index(pengangguranDataTable $pengangguranDataTable)
    {
        return $pengangguranDataTable->render('pengangguran.index');
    }

    /**
     * Show the form for creating a new pengangguran.
     *
     * @return Response
     */
    public function create()
    {
        $data = Datapenduduk::all();
        return view('pengangguran.create',['data'=>$data]);
    }

    /**
     * Store a newly created pengangguran in storage.
     *
     * @param CreatepengangguranRequest $request
     *
     * @return Response
     */
    public function store(CreatepengangguranRequest $request)
    {
        $input = $request->all();

        $pengangguran = $this->pengangguranRepository->create($input);

        Flash::success('pengangguran saved successfully.');

        return redirect(route('pengangguran.index'));
    }

    /**
     * Display the specified pengangguran.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $pengangguran = $this->pengangguranRepository->findWithoutFail($id);

        if (empty($pengangguran)) {
            Flash::error('pengangguran not found');

            return redirect(route('pengangguran.index'));
        }

        return view('pengangguran.show')->with('pengangguran', $pengangguran);
    }

    /**
     * Show the form for editing the specified pengangguran.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $pengangguran = $this->pengangguranRepository->findWithoutFail($id);

        if (empty($pengangguran)) {
            Flash::error('pengangguran not found');

            return redirect(route('pengangguran.index'));
        }
        $data = Datapenduduk::all();
        return view('pengangguran.edit',['data'=>$data])->with('pengangguran', $pengangguran);
    }

    /**
     * Update the specified pengangguran in storage.
     *
     * @param  int              $id
     * @param UpdatepengangguranRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatepengangguranRequest $request)
    {
        $pengangguran = $this->pengangguranRepository->findWithoutFail($id);

        if (empty($pengangguran)) {
            Flash::error('pengangguran not found');

            return redirect(route('pengangguran.index'));
        }

        $pengangguran = $this->pengangguranRepository->update($request->all(), $id);

        Flash::success('pengangguran updated successfully.');

        return redirect(route('pengangguran.index'));
    }

    /**
     * Remove the specified pengangguran from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pengangguran = $this->pengangguranRepository->findWithoutFail($id);

        if (empty($pengangguran)) {
            Flash::error('pengangguran not found');

            return redirect(route('pengangguran.index'));
        }

        $this->pengangguranRepository->delete($id);

        Flash::success('pengangguran deleted successfully.');

        return redirect(route('pengangguran.index'));
    }
}
