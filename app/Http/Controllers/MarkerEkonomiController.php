<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Support\Facades\Config;
use File;
use App;

use DataTables;
use App\Models\Marker;
use App\Models\GisMetadata;

class MarkerEkonomiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {   
        list($lat, $lng) = explode("_", config('map.center'));
        $markers = Marker::all();
        return view('peta.ekonomi.index', compact('markers', 'lat', 'lng'));
    }

    public function store(Request $request)
    {
        try {
            $input = $request->all();
            $input['subcategory'] = isset($input['subcategory']);
            if(!$input['subcategory']){
                $input['subcategory'] = null;
            }
            
            $option = GisMetadata::whereCategory($input['category'])->pluck('option')->first();
            
            Marker::create([
                'name' => $input['name'],
                'option' => $option,
                'fitur' => $input['fitur'],
                'category' => $input['category'],
                'lat' => $input['lat'],
                'lng' => $input['lng'],
                'subcategory' => $input['subcategory'],
                'description' => $input['description']
            ]);
        } catch (\Exception $e) {
            throw new HttpException(500, $e->getMessage());
        }
        return response()->json($input); 
    }

    public function update(Request $request, $id)
    {
        $input = $request->message;
        $marker = Marker::find($id);
        // dd($input);

        $input['subcategory'] = isset($input['subcategory']);
        if(!$input['subcategory']){
            $input['subcategory'] = null;
        }

        $option = GisMetadata::whereCategory($input['category'])->pluck('option')->first();
            
        $marker->update([
            'name' => $input['name'],
            'option' => $option,
            'lat' => $input['lat'],
            'lng' => $input['lng'],
            'description' => $input['description'],
            'category' => $input['category'],
            'subcategory' => $input['subcategory']
        ]);
        
        return response()->json($input);
    }

    public function destroy($id)
    {
        $marker = Marker::destroy($id);
    }

    public function anyData()
    {
        $markers = Marker::whereFitur('Data Ekonomi');
        return DataTables::of($markers)
        ->addColumn('action', function($markers){
            $zonas = [
                "UKM dan IRT",
                "Warung dan Grosir"
            ];
            if (in_array("$markers->category", $zonas)) {
                $otag = 'input';
                $ctag = '';
                $href = '';
            } else {
                $otag = 'a';
                $ctag = 'EDIT</a>';
                $href = 'customDatas/'.$markers->id.'/edit';
            }
            return  '<'.$otag.' href="'.$href.'" type="submit" id="editMarker'.$markers->id.'"
                        editUrl="'.url('mekonomis/'.$markers->id).'"
                        data-1="'.$markers->name.'"  
                        data-2="'.$markers->category.'" 
                        data-3="'.$markers->lat.'" 
                        data-4="'.$markers->lng.'"
                        data-5="'.$markers->description.'" 
                        class="btn btn-sm btn-warning waves-effect" value="EDIT">'.$ctag.'
                    <form  method="POST" style="display: inline;">
                        <input deleteUrl="'.url('mekonomis/'.$markers->id).'" type="submit" class="btn btn-sm btn-danger deleteMarker" value="HAPUS">
                    </form>';
        })
        ->make(true);
    }

    public function select($request)
    {
        $option = GisMetadata::whereCategory($request)->pluck('subcategory');
        return response()->json($option);
    }
}
