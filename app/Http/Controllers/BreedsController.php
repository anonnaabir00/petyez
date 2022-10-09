<?php

namespace App\Http\Controllers;
use App\Models\BreedsModel;
use Illuminate\Http\Request;

class BreedsController extends Controller {
    
    public function all_breeds(){
        $breeds = BreedsModel::all();
        return response()->json($breeds);
    }

    public function get_breeds_by_breed_type($type){
        $breeds = BreedsModel::where('breed_type', $type)->first();
        return response()->json($breeds);
    }

    public function insert_breeds(Request $request){
        // parse body from request
        $body = $request->all();
        // return response()->json($body);
        // return "Alhamdulillah";
        // insert breeds to breed table
        $breeds = BreedsModel::create($body);
        return response()->json($breeds);
    }
}
