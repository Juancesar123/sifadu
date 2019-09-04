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

class MarkerSocialController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {   
        list($lat, $lng) = explode("_", config('map.center'));
        $markers = Marker::all();
        return view('peta.sosial.index', compact('markers', 'lat', 'lng'));
    }

    public function store(Request $request)
    {
        try {
            $input = $request->all();
            // dd($input);
            $input['icon'] = isset($input['icon']);
            if(!$input['icon']){
                $input['icon'] = 'blue_circle';
            }
            Marker::create([
                'name' => $input['name'],
                'icon' => $input['icon'],
                'lat' => $input['lat'],
                'fitur' => 'Data Sosial',
                'lng' => $input['lng'],
                'description' => $input['description'],
                'category' => $input['category'],
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
        $marker->update([
            'name' => $input['name'],
            'lat' => $input['lat'],
            'lng' => $input['lng'],
            'description' => $input['description'],
            'category' => $input['category'],
        ]);
        
        return response()->json($input);
    }

    public function destroy($id)
    {
        $marker = Marker::destroy($id);
    }

    public function anyData()
    {
        $markers = Marker::whereFitur('Data Sosial');
        // $markers = Marker::all();
        // dd($markers);
        return DataTables::of($markers)
        ->addColumn('action', function($markers){
            if ($markers->subcategory !== 'Bencana Alam'){
                $otag = 'input';
                $ctag = '';
                $href = '';
            } else {
                $otag = 'a';
                $ctag = 'EDIT</a>';
                $href = 'customDatas/'.$markers->id.'/edit';
            }
            return  '<'.$otag.' href="'.$href.'" type="submit" id="editMarker'.$markers->id.'"
                        editUrl="'.url('msocials/'.$markers->id).'"
                        data-1="'.$markers->name.'"  
                        data-2="'.$markers->category.'" 
                        data-3="'.$markers->lat.'" 
                        data-4="'.$markers->lng.'"
                        data-5="'.$markers->description.'" 
                        class="btn btn-sm btn-warning waves-effect" value="EDIT">'.$ctag.'
                    <form  method="POST" style="display: inline;">
                        <input deleteUrl="'.url('msocials/'.$markers->id).'" type="submit" class="btn btn-sm btn-danger deleteMarker" value="HAPUS">
                    </form>';
        })
        ->make(true);
    }

    public function select($request)
    {
        $option = GisMetadata::whereCategory($request)->pluck('subcategory');
        // dd($option);
        return response()->json($option);
    }
}
