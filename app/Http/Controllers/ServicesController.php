<?php

namespace App\Http\Controllers;
use App\Models\ServicesExpertsModel;
use Illuminate\Http\Request;

class ServicesController extends Controller {

    public function get_experts(){
        $experts = ServicesExpertsModel::all();
        return response()->json($experts);
    }

    public function insert_experts(Request $request){
        $body = $request->all();
        $experts = ServicesExpertsModel::create($body);
        return response()->json($experts);
    }
}
