<?php

namespace App\Http\Controllers;

use App\DataTables\paketDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatepaketRequest;
use App\Http\Requests\UpdatepaketRequest;
use App\Repositories\paketRepository;
use Flash;
// use App\Models\datapenduduk as Datapenduduk;
use App\Http\Controllers\AppBaseController;
use Response;

class PaketController extends AppBaseController
{
    /** @var  paketRepository */
    private $paketRepository;

    public function __construct(paketRepository $paketRepo)
    {
        $this->paketRepository = $paketRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the paket.
     *
     * @param paketDataTable $paketDataTable
     * @return Response
     */
    public function index(paketDataTable $paketDataTable)
    {
        return $paketDataTable->render('paket.index');
    }

    /**
     * Show the form for creating a new paket.
     *
     * @return Response
     */
    public function create()
    {
        // $data = Datapenduduk::all();
        return view('paket.create');
    }

    /**
     * Store a newly created paket in storage.
     *
     * @param CreatepaketRequest $request
     *
     * @return Response
     */
    public function store(CreatepaketRequest $request)
    {
        $input = $request->all();

        $paket = $this->paketRepository->create($input);

        Flash::success('paket berhasil ditambahkan.');

        return redirect(route('paket.index'));
    }

    /**
     * Display the specified paket.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $paket = $this->paketRepository->findWithoutFail($id);

        if (empty($paket)) {
            Flash::error('paket not found');

            return redirect(route('paket.index'));
        }

        return view('paket.show')->with('paket', $paket);
    }

    /**
     * Show the form for editing the specified paket.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $paket = $this->paketRepository->findWithoutFail($id);

        if (empty($paket)) {
            Flash::error('paket not found');

            return redirect(route('paket.index'));
        }
        // $data = Datapenduduk::All();
        return view('paket.edit')->with('paket', $paket);
    }

    /**
     * Update the specified paket in storage.
     *
     * @param  int              $id
     * @param UpdatepaketRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatepaketRequest $request)
    {
        $paket = $this->paketRepository->findWithoutFail($id);

        if (empty($paket)) {
            Flash::error('paket not found');

            return redirect(route('paket.index'));
        }

        $paket = $this->paketRepository->update($request->all(), $id);

        Flash::success('paket berhasil diperbarui.');

        return redirect(route('paket.index'));
    }

    /**
     * Remove the specified paket from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $paket = $this->paketRepository->findWithoutFail($id);

        if (empty($paket)) {
            Flash::error('paket not found');

            return redirect(route('paket.index'));
        }

        $this->paketRepository->delete($id);

        Flash::success('paket deleted successfully.');

        return redirect(route('paket.index'));
    }
}
