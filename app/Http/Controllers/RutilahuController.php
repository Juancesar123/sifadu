<?php

namespace App\Http\Controllers;

use App\DataTables\RutilahuDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateRutilahuRequest;
use App\Http\Requests\UpdateRutilahuRequest;
use App\Repositories\RutilahuRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class RutilahuController extends AppBaseController
{
    /** @var  RutilahuRepository */
    private $rutilahuRepository;

    public function __construct(RutilahuRepository $rutilahuRepo)
    {
        $this->rutilahuRepository = $rutilahuRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the Rutilahu.
     *
     * @param RutilahuDataTable $rutilahuDataTable
     * @return Response
     */
    public function index(RutilahuDataTable $rutilahuDataTable)
    {
        return $rutilahuDataTable->render('rutilahus.index');
    }

    /**
     * Show the form for creating a new Rutilahu.
     *
     * @return Response
     */
    public function create()
    {
        return view('rutilahus.create');
    }

    /**
     * Store a newly created Rutilahu in storage.
     *
     * @param CreateRutilahuRequest $request
     *
     * @return Response
     */
    public function store(CreateRutilahuRequest $request)
    {
        $input = $request->all();

        $rutilahu = $this->rutilahuRepository->create($input);

        Flash::success('Rutilahu saved successfully.');

        return redirect(route('rutilahus.index'));
    }

    /**
     * Display the specified Rutilahu.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $rutilahu = $this->rutilahuRepository->findWithoutFail($id);

        if (empty($rutilahu)) {
            Flash::error('Rutilahu not found');

            return redirect(route('rutilahus.index'));
        }

        return view('rutilahus.show')->with('rutilahu', $rutilahu);
    }

    /**
     * Show the form for editing the specified Rutilahu.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $rutilahu = $this->rutilahuRepository->findWithoutFail($id);

        if (empty($rutilahu)) {
            Flash::error('Rutilahu not found');

            return redirect(route('rutilahus.index'));
        }

        return view('rutilahus.edit')->with('rutilahu', $rutilahu);
    }

    /**
     * Update the specified Rutilahu in storage.
     *
     * @param  int              $id
     * @param UpdateRutilahuRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRutilahuRequest $request)
    {
        $rutilahu = $this->rutilahuRepository->findWithoutFail($id);

        if (empty($rutilahu)) {
            Flash::error('Rutilahu not found');

            return redirect(route('rutilahus.index'));
        }

        $rutilahu = $this->rutilahuRepository->update($request->all(), $id);

        Flash::success('Rutilahu updated successfully.');

        return redirect(route('rutilahus.index'));
    }

    /**
     * Remove the specified Rutilahu from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $rutilahu = $this->rutilahuRepository->findWithoutFail($id);

        if (empty($rutilahu)) {
            Flash::error('Rutilahu not found');

            return redirect(route('rutilahus.index'));
        }

        $this->rutilahuRepository->delete($id);

        Flash::success('Rutilahu deleted successfully.');

        return redirect(route('rutilahus.index'));
    }
}
