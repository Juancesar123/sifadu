<?php

namespace App\Http\Controllers;

use App\DataTables\PerikananDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatePerikananRequest;
use App\Http\Requests\UpdatePerikananRequest;
use App\Repositories\PerikananRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class PerikananController extends AppBaseController
{
    /** @var  PerikananRepository */
    private $perikananRepository;

    public function __construct(PerikananRepository $perikananRepo)
    {
        $this->perikananRepository = $perikananRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the Perikanan.
     *
     * @param PerikananDataTable $perikananDataTable
     * @return Response
     */
    public function index(PerikananDataTable $perikananDataTable)
    {
        return $perikananDataTable->render('perikanans.index');
    }

    /**
     * Show the form for creating a new Perikanan.
     *
     * @return Response
     */
    public function create()
    {
        return view('perikanans.create');
    }

    /**
     * Store a newly created Perikanan in storage.
     *
     * @param CreatePerikananRequest $request
     *
     * @return Response
     */
    public function store(CreatePerikananRequest $request)
    {
        $input = $request->all();

        $perikanan = $this->perikananRepository->create($input);

        $perikanan->input_perikanan_koordinate($input);
        $perikanan->save();
        Flash::success('Perikanan saved successfully.');

        return redirect(route('perikanans.index'));
    }

    /**
     * Display the specified Perikanan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $perikanan = $this->perikananRepository->findWithoutFail($id);

        if (empty($perikanan)) {
            Flash::error('Perikanan not found');

            return redirect(route('perikanans.index'));
        }

        return view('perikanans.show')->with('perikanan', $perikanan);
    }

    /**
     * Show the form for editing the specified Perikanan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $perikanan = $this->perikananRepository->findWithoutFail($id);

        if (empty($perikanan)) {
            Flash::error('Perikanan not found');

            return redirect(route('perikanans.index'));
        }

        return view('perikanans.edit')->with('perikanan', $perikanan);
    }

    /**
     * Update the specified Perikanan in storage.
     *
     * @param  int              $id
     * @param UpdatePerikananRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePerikananRequest $request)
    {
        $perikanan = $this->perikananRepository->findWithoutFail($id);

        if (empty($perikanan)) {
            Flash::error('Perikanan not found');

            return redirect(route('perikanans.index'));
        }

        $perikanan->input_perikanan_koordinate($request->all());
        $perikanan->save();

        $perikanan = $this->perikananRepository->update($request->all(), $id);

        Flash::success('Perikanan updated successfully.');

        return redirect(route('perikanans.index'));
    }

    /**
     * Remove the specified Perikanan from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $perikanan = $this->perikananRepository->findWithoutFail($id);

        if (empty($perikanan)) {
            Flash::error('Perikanan not found');

            return redirect(route('perikanans.index'));
        }

        $this->perikananRepository->delete($id);

        Flash::success('Perikanan deleted successfully.');

        return redirect(route('perikanans.index'));
    }
}
