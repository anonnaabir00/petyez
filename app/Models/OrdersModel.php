<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdersModel extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $primaryKey = 'id';
    protected $fillable = ['product_id','variation_id','customer_id','product_qty','total_price','total_price','shipping_amount','shipping_address','razorpat_order_id','razorpay_payment_id','razorpay_signature','payment_status'];
}
