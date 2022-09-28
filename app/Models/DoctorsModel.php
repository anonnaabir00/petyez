<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorsModel extends Model
{
    use HasFactory;
    protected $table = 'doctors_list';
    protected $primaryKey = 'id';
    protected $fillable = ['full_name', 'doctor_type', 'doctor_degree', 'doctor_experience', 'doctor_image', 'clinic_address', 'online_fee', 'clinic_fee', 'total_reviews'];
}
