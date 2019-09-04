<?php

namespace App\Http\Controllers;

use App\DataTables\masjidDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatemasjidRequest;
use App\Http\Requests\UpdatemasjidRequest;
use App\Repositories\masjidRepository;
use Flash;
// use App\Models\datapenduduk as Datapenduduk;
use App\Http\Controllers\AppBaseController;
use Response;

class MasjidController extends AppBaseController
{
    /** @var  masjidRepository */
    private $masjidRepository;

    public function __construct(masjidRepository $masjidRepo)
    {
        $this->masjidRepository = $masjidRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the masjid.
     *
     * @param masjidDataTable $masjidDataTable
     * @return Response
     */
    public function index(masjidDataTable $masjidDataTable)
    {
        return $masjidDataTable->render('masjid.index');
    }

    /**
     * Show the form for creating a new masjid.
     *
     * @return Response
     */
    public function create()
    {
        // $data = Datapenduduk::all();
        return view('masjid.create');
    }

    /**
     * Store a newly created masjid in storage.
     *
     * @param CreatemasjidRequest $request
     *
     * @return Response
     */
    public function store(CreatemasjidRequest $request)
    {
        $input = $request->all();

        $masjid = $this->masjidRepository->create($input);

        Flash::success('masjid saved successfully.');

        return redirect(route('masjid.index'));
    }

    /**
     * Display the specified masjid.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $masjid = $this->masjidRepository->findWithoutFail($id);

        if (empty($masjid)) {
            Flash::error('masjid not found');

            return redirect(route('masjid.index'));
        }

        return view('masjid.show')->with('masjid', $masjid);
    }

    /**
     * Show the form for editing the specified masjid.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $masjid = $this->masjidRepository->findWithoutFail($id);

        if (empty($masjid)) {
            Flash::error('masjid not found');

            return redirect(route('masjid.index'));
        }
        // $data = Datapenduduk::All();
        return view('masjid.edit')->with('masjid', $masjid);
    }

    /**
     * Update the specified masjid in storage.
     *
     * @param  int              $id
     * @param UpdatemasjidRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatemasjidRequest $request)
    {
        $masjid = $this->masjidRepository->findWithoutFail($id);

        if (empty($masjid)) {
            Flash::error('masjid not found');

            return redirect(route('masjid.index'));
        }

        $masjid = $this->masjidRepository->update($request->all(), $id);

        Flash::success('masjid updated successfully.');

        return redirect(route('masjid.index'));
    }

    /**
     * Remove the specified masjid from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $masjid = $this->masjidRepository->findWithoutFail($id);

        if (empty($masjid)) {
            Flash::error('masjid not found');

            return redirect(route('masjid.index'));
        }

        $this->masjidRepository->delete($id);

        Flash::success('masjid deleted successfully.');

        return redirect(route('masjid.index'));
    }
}
