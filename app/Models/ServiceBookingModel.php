<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceBookingModel extends Model
{
    use HasFactory;
    protected $table = 'service_booking';
    protected $primaryKey = 'order_id';
    protected $fillable = ['customer_id', 'service_id', 'start_date', 'start_time', 'duration', 'total_price'];
}
