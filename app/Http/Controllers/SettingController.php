<?php

namespace App\Http\Controllers;

use App\DataTables\SettingDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateSettingRequest;
use App\Http\Requests\UpdateSettingRequest;
use App\Repositories\SettingRepository;
use App\Models\Setting;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class SettingController extends AppBaseController
{
    public function __construct(SettingRepository $setRepo)
    {
        $this->SettingRepository = $setRepo;
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SettingDataTable $setDtb)
    {
        return $setDtb->render('settings.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('settings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateSettingRequest $request)
    {
        $input = $request->all();
        $settings = $this->SettingRepository->create($input);

        Flash::success('Setting berhasil ditambahkan.');

        return redirect()->route('setting.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $setting = $this->SettingRepository->findWithoutFail($id);

        if (empty($setting)) {
            Flash::error('Data Setting tidak ditemukan');
            return redirect()->route('setting.index');
        }
        return view('settings.edit', compact('setting'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSettingRequest $request, $id)
    {
        $setting = $this->SettingRepository->findWithoutFail($id);
        $setting = $this->SettingRepository->update($request->all(), $id);

        if (empty($setting)) {
            Flash::error('Data Setting tidak ditemukan');
            return redirect()->route('setting.index');
        }
        Flash::success('Data Setting berhasil di edit');
        return redirect()->route('setting.index');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Setting::where('id', $id)->delete();
        Flash::success('Data berhasil dihapus');
        return redirect()->route('setting.index');
    }
}
