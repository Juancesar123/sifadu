<?php

namespace App\Http\Controllers;

use App\DataTables\kaderpembangunanDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatekaderpembangunanRequest;
use App\Http\Requests\UpdatekaderpembangunanRequest;
use App\Repositories\kaderpembangunanRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class kaderpembangunanController extends AppBaseController
{
    /** @var  kaderpembangunanRepository */
    private $kaderpembangunanRepository;

    public function __construct(kaderpembangunanRepository $kaderpembangunanRepo)
    {
        $this->kaderpembangunanRepository = $kaderpembangunanRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the kaderpembangunan.
     *
     * @param kaderpembangunanDataTable $kaderpembangunanDataTable
     * @return Response
     */
    public function index(kaderpembangunanDataTable $kaderpembangunanDataTable)
    {
        return $kaderpembangunanDataTable->render('kaderpembangunans.index');
    }

    /**
     * Show the form for creating a new kaderpembangunan.
     *
     * @return Response
     */
    public function create()
    {
        return view('kaderpembangunans.create');
    }

    /**
     * Store a newly created kaderpembangunan in storage.
     *
     * @param CreatekaderpembangunanRequest $request
     *
     * @return Response
     */
    public function store(CreatekaderpembangunanRequest $request)
    {
        $input = $request->all();

        $kaderpembangunan = $this->kaderpembangunanRepository->create($input);

        Flash::success('Kaderpembangunan berhasil ditambahkan.');

        return redirect(route('kaderpembangunans.index'));
    }

    /**
     * Display the specified kaderpembangunan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $kaderpembangunan = $this->kaderpembangunanRepository->findWithoutFail($id);

        if (empty($kaderpembangunan)) {
            Flash::error('Kaderpembangunan not found');

            return redirect(route('kaderpembangunans.index'));
        }

        return view('kaderpembangunans.show')->with('kaderpembangunan', $kaderpembangunan);
    }

    /**
     * Show the form for editing the specified kaderpembangunan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $kaderpembangunan = $this->kaderpembangunanRepository->findWithoutFail($id);

        if (empty($kaderpembangunan)) {
            Flash::error('Kaderpembangunan not found');

            return redirect(route('kaderpembangunans.index'));
        }

        return view('kaderpembangunans.edit')->with('kaderpembangunan', $kaderpembangunan);
    }

    /**
     * Update the specified kaderpembangunan in storage.
     *
     * @param  int              $id
     * @param UpdatekaderpembangunanRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatekaderpembangunanRequest $request)
    {
        $kaderpembangunan = $this->kaderpembangunanRepository->findWithoutFail($id);

        if (empty($kaderpembangunan)) {
            Flash::error('Kaderpembangunan not found');

            return redirect(route('kaderpembangunans.index'));
        }

        $kaderpembangunan = $this->kaderpembangunanRepository->update($request->all(), $id);

        Flash::success('Kaderpembangunan berhasil diperbarui.');

        return redirect(route('kaderpembangunans.index'));
    }

    /**
     * Remove the specified kaderpembangunan from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $kaderpembangunan = $this->kaderpembangunanRepository->findWithoutFail($id);

        if (empty($kaderpembangunan)) {
            Flash::error('Kaderpembangunan not found');

            return redirect(route('kaderpembangunans.index'));
        }

        $this->kaderpembangunanRepository->delete($id);

        Flash::success('Kaderpembangunan deleted successfully.');

        return redirect(route('kaderpembangunans.index'));
    }
}
