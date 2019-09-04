<?php

namespace App\Http\Controllers;

use App\DataTables\PerkebunanDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatePerkebunanRequest;
use App\Http\Requests\UpdatePerkebunanRequest;
use App\Repositories\PerkebunanRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class PerkebunanController extends AppBaseController
{
    /** @var  PerkebunanRepository */
    private $perkebunanRepository;

    public function __construct(PerkebunanRepository $perkebunanRepo)
    {
        $this->perkebunanRepository = $perkebunanRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the Perkebunan.
     *
     * @param PerkebunanDataTable $perkebunanDataTable
     * @return Response
     */
    public function index(PerkebunanDataTable $perkebunanDataTable)
    {
        return $perkebunanDataTable->render('perkebunans.index');
    }

    /**
     * Show the form for creating a new Perkebunan.
     *
     * @return Response
     */
    public function create()
    {
        return view('perkebunans.create');
    }

    /**
     * Store a newly created Perkebunan in storage.
     *
     * @param CreatePerkebunanRequest $request
     *
     * @return Response
     */
    public function store(CreatePerkebunanRequest $request)
    {
        $input = $request->all();

        $perkebunan = $this->perkebunanRepository->create($input);

        $perkebunan->input_perkebunan_koordinate($input);
        $perkebunan->save();
        Flash::success('Perkebunan saved successfully.');

        return redirect(route('perkebunans.index'));
    }

    /**
     * Display the specified Perkebunan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $perkebunan = $this->perkebunanRepository->findWithoutFail($id);

        if (empty($perkebunan)) {
            Flash::error('Perkebunan not found');

            return redirect(route('perkebunans.index'));
        }

        return view('perkebunans.show')->with('perkebunan', $perkebunan);
    }

    /**
     * Show the form for editing the specified Perkebunan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $perkebunan = $this->perkebunanRepository->findWithoutFail($id);

        if (empty($perkebunan)) {
            Flash::error('Perkebunan not found');

            return redirect(route('perkebunans.index'));
        }

        return view('perkebunans.edit')->with('perkebunan', $perkebunan);
    }

    /**
     * Update the specified Perkebunan in storage.
     *
     * @param  int              $id
     * @param UpdatePerkebunanRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePerkebunanRequest $request)
    {
        $perkebunan = $this->perkebunanRepository->findWithoutFail($id);

        if (empty($perkebunan)) {
            Flash::error('Perkebunan not found');

            return redirect(route('perkebunans.index'));
        }

        $perkebunan->input_perkebunan_koordinate($request->all());
        $perkebunan->save();

        $perkebunan = $this->perkebunanRepository->update($request->all(), $id);

        Flash::success('Perkebunan updated successfully.');

        return redirect(route('perkebunans.index'));
    }

    /**
     * Remove the specified Perkebunan from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $perkebunan = $this->perkebunanRepository->findWithoutFail($id);

        if (empty($perkebunan)) {
            Flash::error('Perkebunan not found');

            return redirect(route('perkebunans.index'));
        }

        $this->perkebunanRepository->delete($id);

        Flash::success('Perkebunan deleted successfully.');

        return redirect(route('perkebunans.index'));
    }
}
