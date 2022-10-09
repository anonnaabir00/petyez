<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BreedsModel extends Model
{
    use HasFactory;
    protected $table = 'breed_list';
    protected $primaryKey = 'id';
    protected $fillable = ['breeds', 'breed_type'];
}
