<?php

namespace App\Http\Controllers;

use App\DataTables\parameterjeniskelaminDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateparameterjeniskelaminRequest;
use App\Http\Requests\UpdateparameterjeniskelaminRequest;
use App\Repositories\parameterjeniskelaminRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class parameterjeniskelaminController extends AppBaseController
{
    /** @var  parameterjeniskelaminRepository */
    private $parameterjeniskelaminRepository;

    public function __construct(parameterjeniskelaminRepository $parameterjeniskelaminRepo)
    {
        $this->parameterjeniskelaminRepository = $parameterjeniskelaminRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the parameterjeniskelamin.
     *
     * @param parameterjeniskelaminDataTable $parameterjeniskelaminDataTable
     * @return Response
     */
    public function index(parameterjeniskelaminDataTable $parameterjeniskelaminDataTable)
    {
        return $parameterjeniskelaminDataTable->render('parameterjeniskelamins.index');
    }

    /**
     * Show the form for creating a new parameterjeniskelamin.
     *
     * @return Response
     */
    public function create()
    {
        return view('parameterjeniskelamins.create');
    }

    /**
     * Store a newly created parameterjeniskelamin in storage.
     *
     * @param CreateparameterjeniskelaminRequest $request
     *
     * @return Response
     */
    public function store(CreateparameterjeniskelaminRequest $request)
    {
        $input = $request->all();

        $parameterjeniskelamin = $this->parameterjeniskelaminRepository->create($input);

        Flash::success('Parameterjeniskelamin berhasil ditambahkan.');

        return redirect(route('parameterjeniskelamins.index'));
    }

    /**
     * Display the specified parameterjeniskelamin.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $parameterjeniskelamin = $this->parameterjeniskelaminRepository->findWithoutFail($id);

        if (empty($parameterjeniskelamin)) {
            Flash::error('Parameterjeniskelamin not found');

            return redirect(route('parameterjeniskelamins.index'));
        }

        return view('parameterjeniskelamins.show')->with('parameterjeniskelamin', $parameterjeniskelamin);
    }

    /**
     * Show the form for editing the specified parameterjeniskelamin.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $parameterjeniskelamin = $this->parameterjeniskelaminRepository->findWithoutFail($id);

        if (empty($parameterjeniskelamin)) {
            Flash::error('Parameterjeniskelamin not found');

            return redirect(route('parameterjeniskelamins.index'));
        }

        return view('parameterjeniskelamins.edit')->with('parameterjeniskelamin', $parameterjeniskelamin);
    }

    /**
     * Update the specified parameterjeniskelamin in storage.
     *
     * @param  int              $id
     * @param UpdateparameterjeniskelaminRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateparameterjeniskelaminRequest $request)
    {
        $parameterjeniskelamin = $this->parameterjeniskelaminRepository->findWithoutFail($id);

        if (empty($parameterjeniskelamin)) {
            Flash::error('Parameterjeniskelamin not found');

            return redirect(route('parameterjeniskelamins.index'));
        }

        $parameterjeniskelamin = $this->parameterjeniskelaminRepository->update($request->all(), $id);

        Flash::success('Parameterjeniskelamin berhasil diperbarui.');

        return redirect(route('parameterjeniskelamins.index'));
    }

    /**
     * Remove the specified parameterjeniskelamin from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $parameterjeniskelamin = $this->parameterjeniskelaminRepository->findWithoutFail($id);

        if (empty($parameterjeniskelamin)) {
            Flash::error('Parameterjeniskelamin not found');

            return redirect(route('parameterjeniskelamins.index'));
        }

        $this->parameterjeniskelaminRepository->delete($id);

        Flash::success('Parameterjeniskelamin deleted successfully.');

        return redirect(route('parameterjeniskelamins.index'));
    }
}
