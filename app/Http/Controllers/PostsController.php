<?php

namespace App\Http\Controllers;
use App\Models\PostsModel;
use Illuminate\Http\Request;

class PostsController extends Controller {
    // get all posts
    public function all_posts(){
        // get specific columns
        $posts = PostsModel::select(
            'uid',
            'street',
            'city',
            'state',
            'latitude',
            'longitude',
            'geohash',
            'animal_age',
            'animal_type',
            'animal_breed',
            'animal_gender',
            'animal_size',
            'animal_images',
            'animal_registered',
            'animal_vaccinated',
            'author_name',
            'author_uid',
            'author_phone',
            'author_image',
            'description',
            'price',
            'tag',
            'kci_documents' 
            )->get();
        return response()->json($posts);
    }
}
