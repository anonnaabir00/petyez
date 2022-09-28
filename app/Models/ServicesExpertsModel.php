<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicesExpertsModel extends Model
{
    use HasFactory;
    protected $table = 'service_experts';
    protected $primaryKey = 'id';
    protected $fillable = ['full_name', 'short_description', 'expert_overview', 'expert_experience', 'expert_image', 'expert_address', 'expert_phone', 'expert_email', 'working_hours', 'total_reviews'];
}
