<?php

namespace App\Http\Controllers;
use App\Models\ServicesExpertsModel;
use App\Models\ServiceListModel;
use App\Models\ServiceBookingModel;
use Illuminate\Http\Request;
use Razorpay\Api\Api;

class ServicesController extends Controller {

    public function get_experts(){
        $experts = ServicesExpertsModel::all();
        return response()->json($experts);
    }

    public function insert_experts(Request $request){
        $body = $request->all();
        $experts = ServicesExpertsModel::create($body);
        return response()->json($experts);
    }

    public function get_services(){
        $services = ServiceListModel::all();
        return response()->json($services);
    }

    public function insert_services(Request $request){
        $body = $request->all();
        $services = ServiceListModel::create($body);
        return response()->json($services);
    }

    public function book_services(Request $request){
        $api_key = "rzp_test_t9it7RBLljtGZy";
        $api_secret = 'hImmJ8sjhwsPmDOVGWL2uZbu';
        $api = new Api($api_key, $api_secret);

        $body = $request->all();
        $amount = $body['total_price'] * 100;

        $orderData = [
            'amount'          => $amount,
            'currency'        => 'INR'
        ];
        
        $razorpayOrder = $api->order->create($orderData);
        $razorpayOrderId = $razorpayOrder['id'];

        $services = ServiceBookingModel::create($body);
        
        // add razorpay order id to service booking table
        $services->razorpay_order_id = $razorpayOrderId;
        $services->payment_status = 'Not Paid';
        $services->save();

        return response()->json($services);
    }

    public function confirm_payment(Request $request) {
        $body = $request->all();
        $services = ServiceBookingModel::where('razorpay_order_id', $body['razorpay_order_id'])->first();
        $services->razorpay_payment_id = $body['razorpay_payment_id'];
        $services->razorpay_signature = $body['razorpay_signature'];
        $services->payment_status = 'Paid';
        $services->save();
        return response()->json($services);
    }
}
