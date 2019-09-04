<?php

namespace App\Http\Controllers;

use App\DataTables\CustomDataDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateCustomDataRequest;
use App\Http\Requests\UpdateCustomDataRequest;
use App\Repositories\CustomDataRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

// use Grimzy\LaravelMysqlSpatial\Types\Geometry;


use App\Models\GisMetadata;

class CustomDataController extends AppBaseController
{
    private $customDataRepository;

    public function __construct(CustomDataRepository $customDataRepo)
    {
        $this->customDataRepository = $customDataRepo;
    }

    public function index(CustomDataDataTable $customDataDataTable)
    {
        return $customDataDataTable->render('custom_datas.index');
    }

    public function indexs($request)
    {
        $requestArr = explode('_', $request);
        $redirect = $requestArr[0];
        $category = $requestArr[1];
        $subcategory = [$requestArr[2]];
        
        return view('custom_datas.create', compact('redirect', 'category', 'subcategory'));
    }

    public function store(CreateCustomDataRequest $request)
    {
        $input = $request->all();
        // dd($input);
        $customData = $this->customDataRepository->create($input);
        $customData->input_geom($input);
        $customData->save();

        Flash::success('Custom Data saved successfully.');
        
        $back = route($input['redirect'].'.index');
        return redirect($back);
    }

    public function show($id)
    {
        $customData = $this->customDataRepository->find($id);

        if (empty($customData)) {
            Flash::error('Custom Data not found');

            return redirect(route('customDatas.index'));
        }

        dd($customData);

        return view('custom_datas.show')->with('customData', $customData);
    }

    public function edit($id)
    {
        $customData = $this->customDataRepository->findWithoutFail($id);
        // dd($customData);
        if (empty($customData)) {
            Flash::error('Data not found');
            return redirect(route('customDatas.index'));
        }
        if ($customData['category'] == 'Data Sosial'){
            $redirect = 'msocials';
        } else {
            $redirect = 'mekonomis';
        }
        $category = $customData['category'];
        $subcategory = [$customData['subcategory']];
        return view('custom_datas.edit', compact('customData','redirect', 'category', 'subcategory'));
    }

    public function update($id, UpdateCustomDataRequest $request)
    {
        $customData = $this->customDataRepository->findWithoutFail($id);
        if (empty($customData)) {
            Flash::error('Custom Data not found');
            return redirect(route('customDatas.index'));
        }
        $customData->input_geom($request->all());
        // dd($customData);
        $customData->save();
        $customData = $this->customDataRepository->update($request->all(), $id);

        Flash::success('Custom Data updated successfully.');

        $back = route($request['redirect'].'.index');
        return redirect($back);
    }

    public function destroy($id)
    {
        $customData = $this->customDataRepository->findWithoutFail($id);
        if (empty($customData)) {
            Flash::error('Custom Data not found');

            return redirect(route('customDatas.index'));
        }
        $this->customDataRepository->delete($id);

        Flash::success('Custom Data deleted successfully.');

        return redirect(route('customDatas.index'));
    }

    public function select($request)
    {
        $option = GisMetadata::whereCategory($request)->pluck('subcategory');
        return response()->json($option);
    }

}
