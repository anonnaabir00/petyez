<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceListModel extends Model
{
    use HasFactory;
    protected $table = 'service_list';
    protected $primaryKey = 'service_id';
    protected $fillable = ['service_type', 'plan_name', 'plan_price'];
}
