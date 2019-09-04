<?php

namespace App\Http\Controllers;

use App\DataTables\kemiskinanDataTable;
use App\Http\Requests;
use Illuminate\Support\Facades\Request;
use App\Http\Requests\CreatekemiskinanRequest;
use App\Http\Requests\UpdatekemiskinanRequest;
use App\Repositories\kemiskinanRepository;
use Flash;
use App\Models\datapenduduk as Datapenduduk;
use App\Http\Controllers\AppBaseController;
use Response;

class kemiskinanController extends AppBaseController
{
    /** @var  kemiskinanRepository */
    private $kemiskinanRepository;

    public function __construct(kemiskinanRepository $kemiskinanRepo)
    {
        $this->kemiskinanRepository = $kemiskinanRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the kemiskinan.
     *
     * @param kemiskinanDataTable $kemiskinanDataTable
     * @return Response
     */
    public function index(kemiskinanDataTable $kemiskinanDataTable)
    {
        return $kemiskinanDataTable->render('kemiskinan.index');
    }

    /**
     * Show the form for creating a new kemiskinan.
     *
     * @return Response
     */
    public function create()
    {
        $data = Datapenduduk::all();
        return view('kemiskinan.create',['data' => $data]);
    }

    /**
     * Store a newly created kemiskinan in storage.
     *
     * @param CreatekemiskinanRequest $request
     *
     * @return Response
     */
    public function store(CreatekemiskinanRequest $request)
    {
        $input = $request->all();

        $kemiskinan = $this->kemiskinanRepository->create($input);

        Flash::success('kemiskinan saved successfully.');

        return redirect(route('kemiskinan.index'));
    }

    /**
     * Display the specified kemiskinan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $kemiskinan = $this->kemiskinanRepository->findWithoutFail($id);

        if (empty($kemiskinan)) {
            Flash::error('kemiskinan not found');

            return redirect(route('kemiskinan.index'));
        }

        return view('kemiskinan.show')->with('kemiskinan', $kemiskinan);
    }

    /**
     * Show the form for editing the specified kemiskinan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $kemiskinan = $this->kemiskinanRepository->findWithoutFail($id);

        if (empty($kemiskinan)) {
            Flash::error('kemiskinan not found');

            return redirect(route('kemiskinan.index'));
        }
        $data = Datapenduduk::All();
        return view('kemiskinan.edit',['data'=>$data])->with('kemiskinan', $kemiskinan);
    }

    /**
     * Update the specified kemiskinan in storage.
     *
     * @param  int              $id
     * @param UpdatekemiskinanRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatekemiskinanRequest $request)
    {
        $kemiskinan = $this->kemiskinanRepository->findWithoutFail($id);

        if (empty($kemiskinan)) {
            Flash::error('kemiskinan not found');

            return redirect(route('kemiskinan.index'));
        }

        $kemiskinan = $this->kemiskinanRepository->update($request->all(), $id);

        Flash::success('kemiskinan updated successfully.');

        return redirect(route('kemiskinan.index'));
    }

    /**
     * Remove the specified kemiskinan from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $kemiskinan = $this->kemiskinanRepository->findWithoutFail($id);

        if (empty($kemiskinan)) {
            Flash::error('kemiskinan not found');

            return redirect(route('kemiskinan.index'));
        }

        $this->kemiskinanRepository->delete($id);

        Flash::success('kemiskinan deleted successfully.');

        return redirect(route('kemiskinan.index'));
    }


    // get nik controller
    public function getnik() {
      return "success";
    }
}
