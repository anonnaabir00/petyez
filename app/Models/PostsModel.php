<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostsModel extends Model
{
    use HasFactory;
    protected $table = 'posts';
    protected $primaryKey = 'id';
    protected $fillable = [
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
    ];
}
