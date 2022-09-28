<?php

namespace App\Http\Controllers;
use App\Models\DoctorsModel;
use Illuminate\Http\Request;

class DoctorController extends Controller {
    // get all doctors
    public function get_doctors(){
        $doctors = DoctorsModel::all();
        return response()->json($doctors);
    }

    // insert doctors
    public function insert_doctors(Request $request){
        $body = $request->all();
        $doctors = DoctorsModel::create($body);
        return response()->json($doctors);
    }
}
