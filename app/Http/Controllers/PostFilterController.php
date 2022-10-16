<?php

namespace App\Http\Controllers;
use App\Models\PostsModel;
use Illuminate\Http\Request;

class PostFilterController extends Controller {
    
    public function animal_type($animal_type){
        $posts = PostsModel::where('animal_type', $animal_type)->get();
        return response()->json($posts);
    }

    public function animal_age($animal_age){
        $posts = PostsModel::where('animal_age', $animal_age)->get();
        return response()->json($posts);
    }

}
