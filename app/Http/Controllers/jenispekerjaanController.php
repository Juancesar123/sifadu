<?php

namespace App\Http\Controllers;

use App\DataTables\jenispekerjaanDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatejenispekerjaanRequest;
use App\Http\Requests\UpdatejenispekerjaanRequest;
use App\Repositories\jenispekerjaanRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class jenispekerjaanController extends AppBaseController
{
    /** @var  jenispekerjaanRepository */
    private $jenispekerjaanRepository;

    public function __construct(jenispekerjaanRepository $jenispekerjaanRepo)
    {
        $this->jenispekerjaanRepository = $jenispekerjaanRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the jenispekerjaan.
     *
     * @param jenispekerjaanDataTable $jenispekerjaanDataTable
     * @return Response
     */
    public function index(jenispekerjaanDataTable $jenispekerjaanDataTable)
    {
        return $jenispekerjaanDataTable->render('jenispekerjaans.index');
    }

    /**
     * Show the form for creating a new jenispekerjaan.
     *
     * @return Response
     */
    public function create()
    {
        return view('jenispekerjaans.create');
    }

    /**
     * Store a newly created jenispekerjaan in storage.
     *
     * @param CreatejenispekerjaanRequest $request
     *
     * @return Response
     */
    public function store(CreatejenispekerjaanRequest $request)
    {
        $input = $request->all();

        $jenispekerjaan = $this->jenispekerjaanRepository->create($input);

        Flash::success('Jenispekerjaan saved successfully.');

        return redirect(route('jenispekerjaans.index'));
    }

    /**
     * Display the specified jenispekerjaan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $jenispekerjaan = $this->jenispekerjaanRepository->findWithoutFail($id);

        if (empty($jenispekerjaan)) {
            Flash::error('Jenispekerjaan not found');

            return redirect(route('jenispekerjaans.index'));
        }

        return view('jenispekerjaans.show')->with('jenispekerjaan', $jenispekerjaan);
    }

    /**
     * Show the form for editing the specified jenispekerjaan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $jenispekerjaan = $this->jenispekerjaanRepository->findWithoutFail($id);

        if (empty($jenispekerjaan)) {
            Flash::error('Jenispekerjaan not found');

            return redirect(route('jenispekerjaans.index'));
        }

        return view('jenispekerjaans.edit')->with('jenispekerjaan', $jenispekerjaan);
    }

    /**
     * Update the specified jenispekerjaan in storage.
     *
     * @param  int              $id
     * @param UpdatejenispekerjaanRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatejenispekerjaanRequest $request)
    {
        $jenispekerjaan = $this->jenispekerjaanRepository->findWithoutFail($id);

        if (empty($jenispekerjaan)) {
            Flash::error('Jenispekerjaan not found');

            return redirect(route('jenispekerjaans.index'));
        }

        $jenispekerjaan = $this->jenispekerjaanRepository->update($request->all(), $id);

        Flash::success('Jenispekerjaan updated successfully.');

        return redirect(route('jenispekerjaans.index'));
    }

    /**
     * Remove the specified jenispekerjaan from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $jenispekerjaan = $this->jenispekerjaanRepository->findWithoutFail($id);

        if (empty($jenispekerjaan)) {
            Flash::error('Jenispekerjaan not found');

            return redirect(route('jenispekerjaans.index'));
        }

        $this->jenispekerjaanRepository->delete($id);

        Flash::success('Jenispekerjaan deleted successfully.');

        return redirect(route('jenispekerjaans.index'));
    }
}
