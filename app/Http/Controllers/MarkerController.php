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

class MarkerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {   
        list($lat, $lng) = explode("_", config('map.center'));
        $markers = Marker::all();
        return view('peta.marker.index', compact('markers', 'lat', 'lng'));
    }

    public function store(Request $request)
    {
        try {
            $input = $request->all();
            
            $option = GisMetadata::whereCategory($input['category'])->pluck('option')->first();
            
            Marker::create([
                'name' => $input['name'],
                'option' => $option,
                'lat' => $input['lat'],
                'lng' => $input['lng'],
                'fitur' => $input['fitur'],
                'category' => $input['category'],
                'description' => $input['description'],
                'subcategory' => $input['subcategory']
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
            
            $option = GisMetadata::whereCategory($input['category'])->pluck('option')->first();
            
            $marker->update([
            'option' => $option,
            'name' => $input['name'],
            'category' => $input['category'],
            'subcategory' => $input['subcategory'],
            'lat' => $input['lat'],
            'lng' => $input['lng'],
            'description' => $input['description'],
        ]);
        
        return response()->json($input);
    }

    public function destroy($id)
    {
        $marker = Marker::destroy($id);
    }

    public function anyData()
    {
        $markers = Marker::all();
        $markers = Marker::whereFitur('Sarana Prasarana');
        // dd($markers);
        return DataTables::of($markers)
        ->addColumn('action', function($markers){
        return  '<input type="submit" id="editMarker'.$markers->id.'"
                    editUrl="'.url('markers/'.$markers->id).'"
                    data-1="'.$markers->name.'"  
                    data-2="'.$markers->lat.'" 
                    data-3="'.$markers->lng.'" 
                    data-4="'.$markers->description.'" 
                    class="btn btn-sm btn-warning waves-effect" value="EDIT">
                <form  method="POST" style="display: inline;">
                    <input deleteUrl="'.url('markers/'.$markers->id).'" type="submit" class="btn btn-sm btn-danger deleteMarker" value="HAPUS">
                </form>';
        })
        ->make(true);
    }

    public function indexgis()
    {
        return view('peta.index');
    }

    public function select($request)
    {
        $option = GisMetadata::whereCategory($request)->pluck('subcategory');
        return response()->json($option);
    }

    
}
