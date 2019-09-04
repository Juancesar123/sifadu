<?php

namespace App\Http\Controllers;

use App\DataTables\sdDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatesdRequest;
use App\Http\Requests\UpdatesdRequest;
use App\Repositories\sdRepository;
use Flash;
// use App\Models\datapenduduk as Datapenduduk;
use App\Http\Controllers\AppBaseController;
use Response;

class SDMIController extends AppBaseController
{
    /** @var  sdRepository */
    private $sdRepository;

    public function __construct(sdRepository $sdRepo)
    {
        $this->sdRepository = $sdRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the sd.
     *
     * @param sdDataTable $sdDataTable
     * @return Response
     */
    public function index(sdDataTable $sdDataTable)
    {
        return $sdDataTable->render('sd.index');
    }

    /**
     * Show the form for creating a new sd.
     *
     * @return Response
     */
    public function create()
    {
        // $data = Datapenduduk::all();
        return view('sd.create');
    }

    /**
     * Store a newly created sd in storage.
     *
     * @param CreatesdRequest $request
     *
     * @return Response
     */
    public function store(CreatesdRequest $request)
    {
        $input = $request->all();

        $sd = $this->sdRepository->create($input);

        Flash::success('SD/MI berhasil ditambahkan.');

        return redirect(route('sd.index'));
    }

    /**
     * Display the specified sd.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $sd = $this->sdRepository->findWithoutFail($id);

        if (empty($sd)) {
            Flash::error('SD/MI not found');

            return redirect(route('sd.index'));
        }

        return view('sd.show')->with('sd', $sd);
    }

    /**
     * Show the form for editing the specified sd.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $sd = $this->sdRepository->findWithoutFail($id);

        if (empty($sd)) {
            Flash::error('SD/MI not found');

            return redirect(route('sd.index'));
        }
        // $data = Datapenduduk::All();
        return view('sd.edit')->with('sd', $sd);
    }

    /**
     * Update the specified sd in storage.
     *
     * @param  int              $id
     * @param UpdatesdRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatesdRequest $request)
    {
        $sd = $this->sdRepository->findWithoutFail($id);

        if (empty($sd)) {
            Flash::error('SD/MI not found');

            return redirect(route('sd.index'));
        }

        $sd = $this->sdRepository->update($request->all(), $id);

        Flash::success('SD/MI berhasil diperbarui.');

        return redirect(route('sd.index'));
    }

    /**
     * Remove the specified sd from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $sd = $this->sdRepository->findWithoutFail($id);

        if (empty($sd)) {
            Flash::error('SD/MI not found');

            return redirect(route('sd.index'));
        }

        $this->sdRepository->delete($id);

        Flash::success('SD/MI deleted successfully.');

        return redirect(route('sd.index'));
    }
}
