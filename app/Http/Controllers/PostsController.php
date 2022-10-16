<?php

namespace App\Http\Controllers;
use App\Models\PostsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostsController extends Controller {
    // get all posts
    public function all_posts(){
        // get specific columns
        // str replace is used to remove characters from the string        
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

    public function get_post($uid){
        $post = PostsModel::where('uid', $uid)->first();
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

    public function get_posts_by_author($author_uid){
        $posts = PostsModel::where('author_uid', $author_uid)->get();
        return response()->json($posts);
    }

    public function insert_post(Request $request) {
        $post = new PostsModel();
        $post->uid = Str::random(30);
        $post->street = $request->street;
        $post->city = $request->city;
        $post->state = $request->state;
        $post->latitude = $request->latitude;
        $post->longitude = $request->longitude;
        $post->geohash = $request->geohash;
        $post->animal_age = $request->animal_age;
        $post->animal_type = $request->animal_type;
        $post->animal_breed = $request->animal_breed;
        $post->animal_gender = $request->animal_gender;
        $post->animal_size = $request->animal_size;
        $post->animal_images = $request->animal_images;
        $post->animal_registered = $request->animal_registered;
        $post->animal_vaccinated = $request->animal_vaccinated;
        $post->author_name = $request->author_name;
        $post->author_uid = $request->author_uid;
        $post->author_phone = $request->author_phone;
        $post->author_image = $request->author_image;
        $post->description = $request->description;
        $post->author_image = $request->author_image;
        $post->price = $request->price;
        $post->tag = $request->tag;
        $post->kci_documents = $request->kci_documents;
        $post->save();

        $data = [
            'uid' => $post->uid,
            'messege' => 'Post added successfully',
            'status' => 200
        ];

        return response()->json($data);
    }

    public function delete_post($uid) {
        // delete post by uid
        $post = PostsModel::where('uid',$uid)->delete();
        $data = [
            'uid' => $uid,
            'messege' => 'Post deleted successfully',
            'status' => 200
        ];
        return response()->json($data);
    }

    // update post by uid
    public function update_post($uid, Request $request){
        $post = PostsModel::where('uid', $uid)->first();
        // update post image from json
        $post->all_images = $request->animal_images;
        $post->save();

        // create json array 
        return response()->json($post);
    }
}
