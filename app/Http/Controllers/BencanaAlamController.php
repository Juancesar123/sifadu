<?php

namespace App\Http\Controllers;

use App\DataTables\bencanaalamDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateBencanaAlamRequest;
use App\Http\Requests\UpdatebencanaalamRequest;
use App\Repositories\bencanaalamRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class BencanaAlamController extends AppBaseController
{
    /** @var  bencanaalamRepository */
    private $bencanaalamRepository;

    public function __construct(bencanaalamRepository $bencanaalamRepo)
    {
        $this->bencanaalamRepository = $bencanaalamRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the bencanaalam.
     *
     * @param bencanaalamDataTable $bencanaalamDataTable
     * @return Response
     */
    public function index(bencanaalamDataTable $bencanaalamDataTable)
    {
        return $bencanaalamDataTable->render('bencanaalam.index');
    }

    /**
     * Show the form for creating a new bencanaalam.
     *
     * @return Response
     */
    public function create()
    {
        return view('bencanaalam.create');
    }

    /**
     * Store a newly created bencanaalam in storage.
     *
     * @param CreatebencanaalamRequest $request
     *
     * @return Response
     */
    public function store(CreatebencanaalamRequest $request)
    {
        $input = $request->all();

        $bencanaalam = $this->bencanaalamRepository->create($input);

        $bencanaalam->input_koordinate($input);
        $bencanaalam->save();
        Flash::success('bencana alam saved successfully.');

        return redirect(route('bencanaalam.index'));
    }

    /**
     * Display the specified bencanaalam.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $bencanaalam = $this->bencanaalamRepository->findWithoutFail($id);

        if (empty($bencanaalam)) {
            Flash::error('bencana alam not found');

            return redirect(route('bencanaalam.index'));
        }

        return view('bencanaalam.show')->with('bencanaalam', $bencanaalam);
    }

    /**
     * Show the form for editing the specified bencanaalam.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $bencanaalam = $this->bencanaalamRepository->findWithoutFail($id);

        if (empty($bencanaalam)) {
            Flash::error('bencana alam not found');

            return redirect(route('bencanaalam.index'));
        }

        return view('bencanaalam.edit')->with('bencanaalam', $bencanaalam);
    }

    /**
     * Update the specified bencanaalam in storage.
     *
     * @param  int              $id
     * @param UpdatebencanaalamRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatebencanaalamRequest $request)
    {
        $bencanaalam = $this->bencanaalamRepository->findWithoutFail($id);

        if (empty($bencanaalam)) {
            Flash::error('bencana alam not found');

            return redirect(route('bencanaalam.index'));
        }

        $bencanaalam->input_koordinate($request->all());
        $bencanaalam->save();

        $bencanaalam = $this->bencanaalamRepository->update($request->all(), $id);

        Flash::success('bencana alam updated successfully.');

        return redirect(route('bencanaalam.index'));
    }

    /**
     * Remove the specified bencanaalam from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $bencanaalam = $this->bencanaalamRepository->findWithoutFail($id);

        if (empty($bencanaalam)) {
            Flash::error('bencana alam not found');

            return redirect(route('bencanaalam.index'));
        }

        $this->bencanaalamRepository->delete($id);

        Flash::success('bencana alam deleted successfully.');

        return redirect(route('bencanaalam.index'));
    }
}
