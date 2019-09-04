<?php

namespace App\Http\Controllers;

use App\DataTables\inventarisproyekDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateinventarisproyekRequest;
use App\Http\Requests\UpdateinventarisproyekRequest;
use App\Repositories\inventarisproyekRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class inventarisproyekController extends AppBaseController
{
    /** @var  inventarisproyekRepository */
    private $inventarisproyekRepository;

    public function __construct(inventarisproyekRepository $inventarisproyekRepo)
    {
        $this->inventarisproyekRepository = $inventarisproyekRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the inventarisproyek.
     *
     * @param inventarisproyekDataTable $inventarisproyekDataTable
     * @return Response
     */
    public function index(inventarisproyekDataTable $inventarisproyekDataTable)
    {
        return $inventarisproyekDataTable->render('inventarisproyeks.index');
    }

    /**
     * Show the form for creating a new inventarisproyek.
     *
     * @return Response
     */
    public function create()
    {
        return view('inventarisproyeks.create');
    }

    /**
     * Store a newly created inventarisproyek in storage.
     *
     * @param CreateinventarisproyekRequest $request
     *
     * @return Response
     */
    public function store(CreateinventarisproyekRequest $request)
    {
        $input = [
            'nama_proyek' => $request->nama_proyek,
            'volume' => $request->volume,
            'biaya' => preg_replace('~[\\\\/:*?"<>|,.]~', '',$request->biaya),
            'lokasi' => $request->lokasi,
            'keterangan' => $request->keterangan,
            'tahun' => $request->tahun
        ];

        $inventarisproyek = $this->inventarisproyekRepository->create($input);

        Flash::success('Inventarisproyek saved successfully.');

        return redirect(route('inventarisproyeks.index'));
    }

    /**
     * Display the specified inventarisproyek.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $inventarisproyek = $this->inventarisproyekRepository->findWithoutFail($id);

        if (empty($inventarisproyek)) {
            Flash::error('Inventarisproyek not found');

            return redirect(route('inventarisproyeks.index'));
        }

        return view('inventarisproyeks.show')->with('inventarisproyek', $inventarisproyek);
    }

    /**
     * Show the form for editing the specified inventarisproyek.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $inventarisproyek = $this->inventarisproyekRepository->findWithoutFail($id);

        if (empty($inventarisproyek)) {
            Flash::error('Inventarisproyek not found');

            return redirect(route('inventarisproyeks.index'));
        }

        return view('inventarisproyeks.edit')->with('inventarisproyek', $inventarisproyek);
    }

    /**
     * Update the specified inventarisproyek in storage.
     *
     * @param  int              $id
     * @param UpdateinventarisproyekRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateinventarisproyekRequest $request)
    {
        $inventarisproyek = $this->inventarisproyekRepository->findWithoutFail($id);

        if (empty($inventarisproyek)) {
            Flash::error('Inventarisproyek not found');

            return redirect(route('inventarisproyeks.index'));
        }
        $input = [
            'nama_proyek' => $request->nama_proyek,
            'volume' => $request->volume,
            'biaya' => preg_replace('~[\\\\/:*?"<>|,.]~', '',$request->biaya),
            'lokasi' => $request->lokasi,
            'keterangan' => $request->keterangan,
            'tahun' => $request->tahun
        ];
        $inventarisproyek = $this->inventarisproyekRepository->update($input, $id);

        Flash::success('Inventarisproyek updated successfully.');

        return redirect(route('inventarisproyeks.index'));
    }

    /**
     * Remove the specified inventarisproyek from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $inventarisproyek = $this->inventarisproyekRepository->findWithoutFail($id);

        if (empty($inventarisproyek)) {
            Flash::error('Inventarisproyek not found');

            return redirect(route('inventarisproyeks.index'));
        }

        $this->inventarisproyekRepository->delete($id);

        Flash::success('Inventarisproyek deleted successfully.');

        return redirect(route('inventarisproyeks.index'));
    }
}
