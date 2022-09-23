<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GetData extends Controller
{
    public function index(Request $request) {
        // dd($request);
        $id = $_GET['id'];
        $result = $test->getData($id);
        dd($result);
        return $request->all();
        // return response()->json(['success'=>'Ajax request submitted successfully']);
    }
}
