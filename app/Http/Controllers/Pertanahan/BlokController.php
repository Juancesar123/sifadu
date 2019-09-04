<?php
/*
 * Created by Arif Budiman
 * Updated by Arif Budiman
 */

namespace App\Http\Controllers\Pertanahan;

use App\DataTables\Pertanahan\BlokDataTable;
use App\Http\Requests;
use App\Http\Requests\Pertanahan\CreateBlokRequest;
use App\Http\Requests\Pertanahan\UpdateBlokRequest;
use App\Repositories\Pertanahan\BlokRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class BlokController extends AppBaseController
{
    private $blokRepository;
    
    public function __construct(BlokRepository $blokRepository)
    {
        $this->blokRepository = $blokRepository;
    }

    public function index(BlokDataTable $blokDataTable)
    {
        return $blokDataTable->render('pertanahan.blok.index');
    }
    
    public function create()
    {
        return view('pertanahan.blok.create');
    }
    
    public function store(CreateBlokRequest $request)
    {
        $input = $request->all();

        $blok = $this->blokRepository->create($input);

        Flash::success('Blok berhasil ditambahkan.');

        return redirect(route('pertanahan.blok'));
    }
    
    public function show($id)
    {
        $blok = $this->blokRepository->findWithoutFail($id);

        if (empty($blok)) {
            Flash::error('Blok not found');

            return redirect(route('pertanahan.blok'));
        }

        return view('pertanahan.blok.show')->with('blok', $blok);
    }
    
    public function edit($id)
    {
        $blok = $this->blokRepository->findWithoutFail($id);

        if (empty($blok)) {
            Flash::error('Blok not found');

            return redirect(route('pertanahan.blok'));
        }

        return view('pertanahan.blok.edit')->with('blok', $blok);
    }
    
    public function update($id, UpdateBlokRequest $request)
    {
        $blok = $this->blokRepository->findWithoutFail($id);

        if (empty($blok)) {
            Flash::error('Blok not found');

            return redirect(route('pertanahan.blok'));
        }

        $blok = $this->blokRepository->update($request->all(), $id);

        Flash::success('Blok berhasil diperbarui.');

        return redirect(route('pertanahan.blok'));
    }
    
    public function destroy($id)
    {
        $blok = $this->blokRepository->findWithoutFail($id);

        if (empty($blok)) {
            Flash::error('Blok not found');

            return redirect(route('pertanahan.blok'));
        }

        $this->blokRepository->delete($id);

        Flash::success('Blok successfully.');

        return redirect(route('pertanahan.blok'));
    }
}
