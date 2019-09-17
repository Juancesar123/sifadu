<?php

namespace App\Http\Controllers;

use App\DataTables\ParameterIndikatorKemiskinanDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateParameterIndikatorKemiskinanRequest;
use App\Http\Requests\UpdateParameterIndikatorKemiskinanRequest;
use App\Repositories\ParameterIndikatorKemiskinanRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class ParameterIndikatorKemiskinanController extends AppBaseController
{
    /** @var  ParameterIndikatorKemiskinanRepository */
    private $parameterIndikatorKemiskinanRepository;

    public function __construct(ParameterIndikatorKemiskinanRepository $parameterIndikatorKemiskinanRepo)
    {
        $this->parameterIndikatorKemiskinanRepository = $parameterIndikatorKemiskinanRepo;
    }

    /**
     * Display a listing of the ParameterIndikatorKemiskinan.
     *
     * @param ParameterIndikatorKemiskinanDataTable $parameterIndikatorKemiskinanDataTable
     * @return Response
     */
    public function index(ParameterIndikatorKemiskinanDataTable $parameterIndikatorKemiskinanDataTable)
    {
        return $parameterIndikatorKemiskinanDataTable->render('parameter_indikator_kemiskinans.index');
    }

    /**
     * Show the form for creating a new ParameterIndikatorKemiskinan.
     *
     * @return Response
     */
    public function create()
    {
        return view('parameter_indikator_kemiskinans.create');
    }

    /**
     * Store a newly created ParameterIndikatorKemiskinan in storage.
     *
     * @param CreateParameterIndikatorKemiskinanRequest $request
     *
     * @return Response
     */
    public function store(CreateParameterIndikatorKemiskinanRequest $request)
    {
        $input = $request->all();

        $parameterIndikatorKemiskinan = $this->parameterIndikatorKemiskinanRepository->create($input);

        Flash::success('Parameter Indikator Kemiskinan saved successfully.');

        return redirect(route('parameterIndikatorKemiskinans.index'));
    }

    /**
     * Display the specified ParameterIndikatorKemiskinan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $parameterIndikatorKemiskinan = $this->parameterIndikatorKemiskinanRepository->findWithoutFail($id);

        if (empty($parameterIndikatorKemiskinan)) {
            Flash::error('Parameter Indikator Kemiskinan not found');

            return redirect(route('parameterIndikatorKemiskinans.index'));
        }

        return view('parameter_indikator_kemiskinans.show')->with('parameterIndikatorKemiskinan', $parameterIndikatorKemiskinan);
    }

    /**
     * Show the form for editing the specified ParameterIndikatorKemiskinan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $parameterIndikatorKemiskinan = $this->parameterIndikatorKemiskinanRepository->findWithoutFail($id);

        if (empty($parameterIndikatorKemiskinan)) {
            Flash::error('Parameter Indikator Kemiskinan not found');

            return redirect(route('parameterIndikatorKemiskinans.index'));
        }

        return view('parameter_indikator_kemiskinans.edit')->with('parameterIndikatorKemiskinan', $parameterIndikatorKemiskinan);
    }

    /**
     * Update the specified ParameterIndikatorKemiskinan in storage.
     *
     * @param  int              $id
     * @param UpdateParameterIndikatorKemiskinanRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateParameterIndikatorKemiskinanRequest $request)
    {
        $parameterIndikatorKemiskinan = $this->parameterIndikatorKemiskinanRepository->findWithoutFail($id);

        if (empty($parameterIndikatorKemiskinan)) {
            Flash::error('Parameter Indikator Kemiskinan not found');

            return redirect(route('parameterIndikatorKemiskinans.index'));
        }

        $parameterIndikatorKemiskinan = $this->parameterIndikatorKemiskinanRepository->update($request->all(), $id);

        Flash::success('Parameter Indikator Kemiskinan updated successfully.');

        return redirect(route('parameterIndikatorKemiskinans.index'));
    }

    /**
     * Remove the specified ParameterIndikatorKemiskinan from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $parameterIndikatorKemiskinan = $this->parameterIndikatorKemiskinanRepository->findWithoutFail($id);

        if (empty($parameterIndikatorKemiskinan)) {
            Flash::error('Parameter Indikator Kemiskinan not found');

            return redirect(route('parameterIndikatorKemiskinans.index'));
        }

        $this->parameterIndikatorKemiskinanRepository->delete($id);

        Flash::success('Parameter Indikator Kemiskinan deleted successfully.');

        return redirect(route('parameterIndikatorKemiskinans.index'));
    }
}
