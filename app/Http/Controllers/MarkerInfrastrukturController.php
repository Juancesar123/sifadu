<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Support\Facades\Config;

use DataTables;
use App\Models\Marker;

class MarkerInfrastrukturController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {   
        list($lat, $lng) = explode("_", config('map.center'));
        $markers = Marker::whereCategory('Data Infrastruktur');
        return view('peta.infrastruktur.index', compact('markers', 'lat', 'lng'));
    }

    public function store(Request $request)
    {
        try {
            $input = $request->all();
            $input['icon'] = isset($input['icon']);
            if(!$input['icon']){
                $input['icon'] = 'blue_circle';
            }
            $input['geom'] = $input['line'];
            
            $marker = new Marker;
            $marker->input_geom($input);
            $marker['name'] = $input['name'];
            $marker['fitur'] =  $input['fitur'];
            $marker['description'] =  $input['description'];
            $marker['category'] =  $input['category'];
            $marker->save();

        } catch (\Exception $e) {
            throw new HttpException(500, $e->getMessage());
        }

        return response()->json($input); 
    }

    public function update(Request $request, $id)
    {
        $input = $request->message;
        // dd($input);
        $marker = Marker::find($id);
        $input['geom'] = $input['line'];
        $marker->input_geom($input);
        $marker->update([
            'name' => $input['name'],
            'fitur' => $input['fitur'],
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
        $markers = Marker::whereFitur('Data Infrastruktur');
        return DataTables::of($markers)
        ->addColumn('action', function($markers){
            $otag = 'input';
            $ctag = '';
            $href = '';
            return  '<'.$otag.' href="'.$href.'" type="submit" id="editMarker'.$markers->id.'"
                        editUrl="'.url('minfrastrukturs/'.$markers->id).'"
                        data-1="'.$markers->name.'"  
                        data-2="'.$markers->category.'" 
                        data-3='.json_encode($markers->geom).'
                        data-4="'.$markers->description.'" 
                        class="btn btn-sm btn-warning waves-effect" value="EDIT">'.$ctag.'
                    <form  method="POST" style="display: inline;">
                        <input deleteUrl="'.url('minfrastrukturs/'.$markers->id).'" type="submit" class="btn btn-sm btn-danger deleteMarker" value="HAPUS">
                    </form>';
        })
        ->make(true);
    }
}
