<?php

namespace App\Http\Controllers;
use App\Models\ProductsModel;
use App\Models\OrdersModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Razorpay\Api\Api;

class EcommerceController extends Controller
{
    public function get_products(){
        $products = ProductsModel::all();
        return response()->json($products);
    }

    public function insert_products(Request $request){
        // parse body from request
        $body = $request->all();
        // return response()->json($body);
        // return "Alhamdulillah";
        // insert products to product table
        $products = ProductsModel::create($body);
        return response()->json($products);
    }

    public function create_order(Request $request){
        $api_key = "rzp_test_t9it7RBLljtGZy";
        $api_secret = 'hImmJ8sjhwsPmDOVGWL2uZbu';
        $api = new Api($api_key, $api_secret);

        $body = $request->all();
        $amount = ($body['total_price'] + $body['shipping_amount']) * 100;

        $orderData = [
            'amount'          => $amount,
            'currency'        => 'INR'
        ];
        
        $razorpayOrder = $api->order->create($orderData);
        $razorpayOrderId = $razorpayOrder['id'];

        $order = OrdersModel::create($body);
        // add razorpay order id to orders table
        $order->razorpay_order_id = $razorpayOrderId;
        $order->payment_status = 'Not Paid';
        $order->save();

        return response()->json($order);
    }

    public function confirm_payment(Request $request) {
        $body = $request->all();
        $order = OrdersModel::where('razorpay_order_id', $body['razorpay_order_id'])->first();
        $order->razorpay_payment_id = $body['razorpay_payment_id'];
        $order->razorpay_signature = $body['razorpay_signature'];
        $order->payment_status = 'Paid';
        $order->save();
        return response()->json($order);
    }
}
